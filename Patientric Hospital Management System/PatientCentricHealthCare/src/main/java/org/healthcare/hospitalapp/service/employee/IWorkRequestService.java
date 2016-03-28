package org.healthcare.hospitalapp.service.employee;

import java.util.List;

import org.healthcare.hospitalapp.model.CombinedAnalysis;
import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.healthcare.hospitalapp.model.workrequest.ConsultationWorkRequest;

public interface IWorkRequestService {

	public List<ConsultationWorkRequest> getConsultantionWorkRequests(UserAccount assistantDoctor);
	public List<ConsultationWorkRequest> getDoctorWorkRequests(UserAccount doctor);
	public void sendToDoctor(CombinedAnalysis combinedAnalysis, int enc,int work,String assis);
}
