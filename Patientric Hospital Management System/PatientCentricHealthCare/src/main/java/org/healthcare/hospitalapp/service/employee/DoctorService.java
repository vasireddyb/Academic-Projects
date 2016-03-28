package org.healthcare.hospitalapp.service.employee;

import java.util.List;

import org.healthcare.hospitalapp.data.DoctorDAO;
import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.healthcare.hospitalapp.model.encounter.MedicationDetails;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class DoctorService implements IDoctorService {

	@Autowired
	DoctorDAO doctorDAO;
	
	@Override
	public void addDoctorUserAccount(UserAccount ua) {
		// TODO Auto-generated method stub
		doctorDAO.addDoctorUserAccount(ua);
	}

	@Override
	public List<UserAccount> getDoctorUserAccounts() {
		// TODO Auto-generated method stub
		return doctorDAO.getDoctorUserAccounts();
	}

	@Override
	public void medicatePatient(int enc, int work, String[] drugId,
			MedicationDetails medicationDetails) {
		// TODO Auto-generated method stub
		doctorDAO.medicatePatient(enc, work, drugId, medicationDetails);
	}

}
