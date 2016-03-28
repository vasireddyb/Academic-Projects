package org.healthcare.hospitalapp;

import java.util.Locale;

import javax.servlet.http.HttpServletRequest;
import javax.validation.Valid;

import org.healthcare.hospitalapp.data.WorkRequestDAO;
import org.healthcare.hospitalapp.model.CombinedAnalysis;
import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.healthcare.hospitalapp.model.encounter.Assessment;
import org.healthcare.hospitalapp.service.employee.WorkRequestService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class AssistantDoctorController {
	
	@Autowired
	WorkRequestService workRequestService;
	
	@RequestMapping(value = "/viewPatientsRequests", method = RequestMethod.GET)
	public String postComp(Locale locale, Model model, HttpServletRequest request) {
		UserAccount assisstantDoctor = (UserAccount) request.getSession().getAttribute("userAccount");
		model.addAttribute("patientDetails", workRequestService.getConsultantionWorkRequests(assisstantDoctor));
		return "viewPatientsRequests";
	}
	
	
	@RequestMapping(value = "/assistantDoctorLogin", method = RequestMethod.GET)
	public String assistantDoctorLogin(Locale locale, Model model) {
		return "assistantDoctorLogin";
	}
	
	
	@RequestMapping(value = "/preAnalysis", method = RequestMethod.GET)
	public String preAnalysis(Locale locale,@RequestParam String encId,@RequestParam String workId,Model model, HttpServletRequest request) {
		System.out.println("************"+encId);
		model.addAttribute("encId", encId);
		model.addAttribute("workId", workId);
		model.addAttribute("combinedAnalysis", new CombinedAnalysis());
		return "priliminaryAnalysis";
	}
	
	@RequestMapping(value = "/analysis", method = RequestMethod.POST)
	public String analysis(Locale locale,@Valid @ModelAttribute("combinedAnalysis") CombinedAnalysis combinedAnalysis, BindingResult result,Model model, HttpServletRequest request) {
		if(result.hasErrors()){
			System.out.println("@@@@@@@@@@@@@@@@"+request.getParameter("encId"));
			model.addAttribute("encId", request.getParameter("encId"));
			model.addAttribute("workId", request.getParameter("workId"));
			return "priliminaryAnalysis";
		}
		int enc = Integer.parseInt(request.getParameter("encId"));
		int work = Integer.parseInt(request.getParameter("workId"));
		UserAccount assistant = (UserAccount) request.getSession().getAttribute("userAccount");
		workRequestService.sendToDoctor(combinedAnalysis,enc,work,assistant.getUsername());
		return "analysisSuccess";
	}
}
