package org.healthcare.hospitalapp;

import java.util.List;
import java.util.Locale;

import javax.servlet.http.HttpServletRequest;
import javax.validation.Valid;

import org.healthcare.hospitalapp.data.DrugDAO;
import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.healthcare.hospitalapp.model.encounter.Drug;
import org.healthcare.hospitalapp.service.employee.DrugService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

@Controller
public class PharmacistController {

	@Autowired
	DrugService drugService;
	
	
	@RequestMapping(value = "/viewDrugs", method = RequestMethod.GET)
	public String viewDrugs(Locale locale, Model model, HttpServletRequest request) {
		List<Drug> drugList = drugService.getDrugList();
		model.addAttribute("drugList", drugList);
		return "viewDrugs";
	}
	
	
	@RequestMapping(value = "/addDrugs", method = RequestMethod.GET)
	public String addDrugs(Locale locale, Model model) {
		model.addAttribute("drug",new Drug());
		return "addDrugs";
	}
	
	@RequestMapping(value="/removeDrug")
	public String disableUser(Model model, HttpServletRequest request){

		String[] drugId = request.getParameterValues("deleteDrug");
		
		drugService.deleteDrugs(drugId);
		 
		return "removeDrugsSuccess";
		
	}
	
	@RequestMapping(value = "/pharmHome")
	public String pharmHome(Model model) {
		return "pharmacistLogin";
	}
	
	@RequestMapping(value = "/insertDrugs", method = RequestMethod.POST)
	public String insertDrugs(@Valid @ModelAttribute("drug") Drug drug, BindingResult result, Model model) {
		if(result.hasErrors()) {
            return "addDrugs";
        }

		drugService.addDrug(drug);
		return "addDrugSuccess";
	}
}
