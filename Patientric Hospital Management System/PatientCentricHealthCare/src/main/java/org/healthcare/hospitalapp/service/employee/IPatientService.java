package org.healthcare.hospitalapp.service.employee;

import java.util.List;

import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.healthcare.hospitalapp.model.encounter.Encounter;
import org.healthcare.hospitalapp.model.workrequest.ConsultationWorkRequest;

public interface IPatientService {
	public  boolean addPatient(UserAccount userAccount);
	public void sendComplaint(ConsultationWorkRequest consult, int userId, UserAccount patient);
	public List<Encounter> checkReport(UserAccount patient);
}
