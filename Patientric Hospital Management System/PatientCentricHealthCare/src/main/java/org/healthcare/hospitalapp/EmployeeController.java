package org.healthcare.hospitalapp;

import java.util.Locale;

import javax.validation.Valid;

import org.healthcare.hospitalapp.model.CombinedComandDoctor;
import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.healthcare.hospitalapp.service.employee.EmployeeServiceImpl;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

@Controller
public class EmployeeController {

	
	@Autowired
	private EmployeeServiceImpl employeeService;
	
	@RequestMapping(value = "/createEmployee", method = RequestMethod.GET)
	public String createEmployee(Locale locale, Model model) {
		model.addAttribute("userAccount",new UserAccount());
		return "createEmployee";
	}
	
	@RequestMapping(value = "/viewEmployee", method = RequestMethod.GET)
	public String viewEmployee(Locale locale, Model model) {
		model.addAttribute("employeeList", employeeService.getEmployeeList());
		return "viewEmployee";
	}
	
	@RequestMapping(value = "/createDoctor", method = RequestMethod.GET)
	public String createDoctor(Locale locale, Model model) {
		model.addAttribute("combinedCommand", new CombinedComandDoctor());
		return "createDoctor";
	}
	
	@RequestMapping(value = "/newEmployee", method = RequestMethod.POST)
	public String newEmployee(@Valid @ModelAttribute("userAccount") UserAccount userAccount, BindingResult result, Model model) {
		if(result.hasErrors()){
			model.addAttribute("employeeList", employeeService.getEmployeeList());
			return "createEmployee";
		}
		boolean flag = employeeService.addEmployeeUserAccount(userAccount);
		if(!flag){
			return "adminUserExists";
		}
		return "success";
	}
	
	@RequestMapping(value = "/newDoctor", method = RequestMethod.POST)
	public String newDoctor(@Valid @ModelAttribute("combinedCommand") CombinedComandDoctor combinedCommand, BindingResult result, Model model) {
		if(result.hasErrors()){
			return "createDoctor";
		}
		combinedCommand.getUserAccount().setRole("DOCTOR");
		boolean flag = employeeService.addDoctorUserAccount(combinedCommand.getUserAccount(),combinedCommand.getDoctor());
		if(!flag){
			return "adminUserExists";
		}
		return "success";
	}
}
