package org.healthcare.hospitalapp;

import java.util.List;
import java.util.Locale;

import javax.servlet.http.HttpServletRequest;
import javax.validation.Valid;

import org.healthcare.hospitalapp.data.AssistantDoctorDAO;
import org.healthcare.hospitalapp.data.DoctorDAO;
import org.healthcare.hospitalapp.data.PatientDAO;
import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.healthcare.hospitalapp.model.encounter.Encounter;
import org.healthcare.hospitalapp.model.person.Patient;
import org.healthcare.hospitalapp.model.workrequest.ConsultationWorkRequest;
import org.healthcare.hospitalapp.service.employee.AssisstantDoctorService;
import org.healthcare.hospitalapp.service.employee.DoctorService;
import org.healthcare.hospitalapp.service.employee.EmployeeServiceImpl;
import org.healthcare.hospitalapp.service.employee.PatientServiceImpl;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class PatientController {
	
	@Autowired
	private PatientServiceImpl patientServiceImpl;
	
	@Autowired
	DoctorService doctorService;
	
	
	@Autowired
	AssisstantDoctorService assisstantDoctorService;
	

	@RequestMapping(value = "/patientLogin", method = RequestMethod.GET)
	public String patientLogin(Locale locale, Model model) {
		return "patientLogin";
	}
	
	@RequestMapping(value = "/newPatient", method = RequestMethod.GET)
	public String newPatient(@ModelAttribute("useraccount") UserAccount useraccount, Locale locale, Model model) {
		model.addAttribute("doctorList", doctorService.getDoctorUserAccounts());
		return "createPatient";
	}
	
	@RequestMapping(value = "/createpatient", method = RequestMethod.POST)
	public String createPatient(@Valid @ModelAttribute("useraccount") UserAccount useraccount,BindingResult result, Locale locale, Model model) {
		if(result.hasErrors()){
			model.addAttribute("doctorList", doctorService.getDoctorUserAccounts());
			return "createPatient";
		}
		boolean flag = patientServiceImpl.addPatient(useraccount);
		if(!flag){
			return "userExists";
		}
		return "addPatientSuccess";
	}
	
	@RequestMapping(value = "/sendComplaint", method = RequestMethod.GET)
	public String sendComplaint(Locale locale, Model model) {
		model.addAttribute("assDoctorList", assisstantDoctorService.getAssistantDoctorUserAccounts());
		return "sendComplaint";
	}
	@RequestMapping(value = "/postComp", method = RequestMethod.POST)
	public String postComp(@ModelAttribute ConsultationWorkRequest consult,@RequestParam int userId, Locale locale, Model model, HttpServletRequest request) {
		UserAccount patient = (UserAccount) request.getSession().getAttribute("userAccount");
		patientServiceImpl.sendComplaint(consult,userId,patient);
		return "complaintSuccess";
	}
	
	@RequestMapping(value = "/checkReport", method = RequestMethod.GET)
	public String checkReport(Locale locale, Model model, HttpServletRequest request) {
		UserAccount patient = (UserAccount) request.getSession().getAttribute("userAccount");
		List<Encounter> encounterList = patientServiceImpl.checkReport(patient);
		model.addAttribute("encounterList", encounterList);
		return "checkReport";
	}
}
