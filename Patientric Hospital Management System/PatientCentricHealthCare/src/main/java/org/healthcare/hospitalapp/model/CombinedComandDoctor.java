package org.healthcare.hospitalapp.model;

import javax.validation.Valid;

import org.healthcare.hospitalapp.model.employee.Doctor;
import org.healthcare.hospitalapp.model.employee.UserAccount;

public class CombinedComandDoctor {

	
	private Doctor doctor;
	@Valid
	private UserAccount userAccount;
	
	public CombinedComandDoctor(){}
	
	public Doctor getDoctor() {
		return doctor;
	}
	public void setDoctor(Doctor doctor) {
		this.doctor = doctor;
	}
	public UserAccount getUserAccount() {
		return userAccount;
	}
	public void setUserAccount(UserAccount userAccount) {
		this.userAccount = userAccount;
	}
	
	
}
