package org.healthcare.hospitalapp.service.employee;

import java.util.List;

import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.healthcare.hospitalapp.model.encounter.MedicationDetails;

public interface IDoctorService {

	public void addDoctorUserAccount(UserAccount ua);
	public List<UserAccount> getDoctorUserAccounts();
	public void medicatePatient(int enc, int work, String[] drugId,
			MedicationDetails medicationDetails);
}
