package org.healthcare.hospitalapp;

import java.util.Locale;

import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.healthcare.hospitalapp.service.employee.EmployeeServiceImpl;
import org.healthcare.hospitalapp.service.employee.UserAccountServiceImpl;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.validation.Validator;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.WebDataBinder;
import org.springframework.web.bind.annotation.CookieValue;
import org.springframework.web.bind.annotation.InitBinder;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;

/**
 * Handles requests for the application home page.
 */
@Controller
public class HomeController {
	
	private static final Logger logger = LoggerFactory.getLogger(HomeController.class);
	@Autowired
	private UserAccountServiceImpl userAccountService;
	
	@Autowired
	private EmployeeServiceImpl employeeService;

	@Autowired
	@Qualifier("userValidator")
	private Validator validator;
	
	/*
	 * This is to initialize webDataBinder,set its
	 * validator as we specify.
	 */
	@InitBinder
	private void initBinder (WebDataBinder binder){
		binder.setValidator(validator);
	}
	
	/**
	 * Simply selects the home view to render by returning its name.
	 */
	@RequestMapping(value = "/", method = RequestMethod.GET)
	public String home(Locale locale, Model model, HttpServletRequest request, @CookieValue(value="userName",required=false)String userName,@CookieValue(value="password",required=false)String password) {
		
		String adminLogin = "adminLogin";
		String doctorLogin = "doctorLogin";
		String assistantDoctorLogin = "assistantDoctorLogin";
		String pharmacistLogin = "pharmacistLogin";
		String patientLogin = "patientLogin";
		if(userName!=null & password!=null){
			try{
			HttpSession session = request.getSession();
			UserAccount u = userAccountService.queryUserByNameAndPassword(userName, password);
			if(u!=null && u.getStatus().equals("false")){
				return "failure";
			}
			if(u!=null && u.getStatus().equals("true")){
				model.addAttribute("user", u);
				session.setAttribute("userAccount", u);

				if(u.getRole().equals("ADMIN")){
				model.addAttribute("user", u);
				return adminLogin;
				}
				else if(u.getRole().equals("DOCTOR")){
				model.addAttribute("user", u);
				return doctorLogin;
				}
				else if(u.getRole().equals("ASSISTANTDOCTOR")){
				model.addAttribute("user", u);
				return assistantDoctorLogin;
				}
				else if(u.getRole().equals("PATIENT")){
				model.addAttribute("user", u);
				return patientLogin;
				}
				else if(u.getRole().equals("PHARMACIST")){
				model.addAttribute("user", u);
				return pharmacistLogin;
				}
			}
			}
			catch(Exception e){
				System.out.println("No user");
			}
		}
		return "home";
	}
	
	@RequestMapping(value = "/backLogin", method = RequestMethod.GET)
	public String returnLogin(Locale locale, Model model) {
		
		return "home";
	}
	
	@RequestMapping(value = "/adminLogin", method = RequestMethod.GET)
	public String adminLogin(Locale locale, Model model) {
		
		return "adminLogin";
	}
	
	
	@RequestMapping(value = "/login", method = RequestMethod.POST)
	public String login(Model model,@Validated UserAccount userAccount, BindingResult result,@RequestParam(required=false) String rememberMe, HttpServletRequest request,HttpServletResponse response) {
		model.addAttribute("user", userAccount);
		String adminLogin = "adminLogin";
		String doctorLogin = "doctorLogin";
		String assistantDoctorLogin = "assistantDoctorLogin";
		String pharmacistLogin = "pharmacistLogin";
		String patientLogin = "patientLogin";
		if(result.hasErrors()){
			return "home";
		}
		else{
			try{
				HttpSession session = request.getSession();
				UserAccount u = userAccountService.queryUserByNameAndPassword(userAccount.getUsername(), userAccount.getPassword());
				if(u!=null && u.getStatus().equals("false")){
					return "failure";
				}
				if(u!=null && u.getStatus().equals("true")){
					session.setAttribute("userAccount", userAccount);
					if(rememberMe!=null){
						Cookie userName = new Cookie("userName", userAccount.getUsername());
						Cookie password = new Cookie("password", userAccount.getPassword());
						response.addCookie(userName);
						response.addCookie(password);
					}
					if(u.getRole().equals("ADMIN")){
					model.addAttribute("user", userAccount);
					return adminLogin;
					}
					else if(u.getRole().equals("DOCTOR")){
					model.addAttribute("user", userAccount);
					return doctorLogin;
					}
					else if(u.getRole().equals("ASSISTANTDOCTOR")){
					model.addAttribute("user", userAccount);
					return assistantDoctorLogin;
					}
					else if(u.getRole().equals("PATIENT")){
					model.addAttribute("user", userAccount);
					return patientLogin;
					}
					else if(u.getRole().equals("PHARMACIST")){
					model.addAttribute("user", userAccount);
					return pharmacistLogin;
					}
				}
			}
			catch(Exception e){
				System.out.println("No user");
			}
		}
		return "failure";
	}
	
	@RequestMapping(value="/disableUser")
	public String disableUser(Model model, HttpServletRequest request){

		String[] empID = request.getParameterValues("deleteemployees");
		for(String str: empID)
			System.out.println("empID is "+str);
		
		 try {
			 employeeService.deleteemployees(empID);
		 } catch (Exception e1) {
			 e1.printStackTrace();
		 }
		return "success";
		
	}
	
	@RequestMapping(value="/logout")
	public String showLogout(Model model, HttpServletRequest request,HttpServletResponse response){
		HttpSession session = request.getSession();
		session.invalidate();
		Cookie userName = new Cookie("userName", "pass");
		Cookie password = new Cookie("password", "pass");
		userName.setMaxAge(0);
		password.setMaxAge(0);
		response.addCookie(userName);
		response.addCookie(password);
		return "logout";
		
	}
	
	
	@RequestMapping(value="/contactUs")
	public String contactUs(Model model, HttpServletRequest request){
		return "contactUs";
		
	}
	
}
