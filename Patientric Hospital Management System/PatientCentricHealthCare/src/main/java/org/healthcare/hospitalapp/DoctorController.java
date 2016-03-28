package org.healthcare.hospitalapp;

import java.util.Locale;

import javax.servlet.http.HttpServletRequest;

import org.healthcare.hospitalapp.data.DoctorDAO;
import org.healthcare.hospitalapp.data.DrugDAO;
import org.healthcare.hospitalapp.data.WorkRequestDAO;
import org.healthcare.hospitalapp.model.CombinedAnalysis;
import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.healthcare.hospitalapp.model.encounter.Drug;
import org.healthcare.hospitalapp.model.encounter.MedicationDetails;
import org.healthcare.hospitalapp.service.employee.DoctorService;
import org.healthcare.hospitalapp.service.employee.DrugService;
import org.healthcare.hospitalapp.service.employee.WorkRequestService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class DoctorController {

	
	@Autowired
	WorkRequestService workRequestService;
	
	@Autowired
	DoctorService doctorService;
		
	@Autowired
	DrugService drugService;
	
	
	@RequestMapping(value = "/doctorLogin", method = RequestMethod.GET)
	public String doctorLogin(Locale locale, Model model) {
		return "doctorLogin";
	}
	
	@RequestMapping(value = "/viewAssistantRequests")
	public String viewAssistantRequests(Locale locale, Model model,HttpServletRequest request) {
		UserAccount doctor = (UserAccount) request.getSession().getAttribute("userAccount");
		model.addAttribute("patientDetails", workRequestService.getDoctorWorkRequests(doctor));
		return "viewAssistantRequests";
	}
	
	@RequestMapping(value = "/medicate", method = RequestMethod.GET)
	public String preAnalysis(Locale locale,@RequestParam String encId,@RequestParam String workId,Model model, HttpServletRequest request) {
		model.addAttribute("encId", encId);
		model.addAttribute("workId", workId);
		model.addAttribute("drugList", drugService.getDrugList());
		return "doctorMedication";
	}
	
	@RequestMapping(value = "/medication", method = RequestMethod.POST)
	public String analysis(Locale locale,@ModelAttribute MedicationDetails medicationDetails,Model model, HttpServletRequest request) {
		int enc = Integer.parseInt(request.getParameter("encId"));
		int work = Integer.parseInt(request.getParameter("workId"));
		String[] drugId = request.getParameterValues("addMedicationDrugs");
		doctorService.medicatePatient(enc,work,drugId,medicationDetails);
		return "medicationSuccess";
	}
}
