package org.healthcare.hospitalapp.service.employee;

import java.util.List;

import org.healthcare.hospitalapp.data.WorkRequestDAO;
import org.healthcare.hospitalapp.model.CombinedAnalysis;
import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.healthcare.hospitalapp.model.workrequest.ConsultationWorkRequest;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class WorkRequestService implements IWorkRequestService {

	@Autowired
	WorkRequestDAO workRequestDAO;

	@Override
	public List<ConsultationWorkRequest> getConsultantionWorkRequests(
			UserAccount assistantDoctor) {
		
		return workRequestDAO.getConsultantionWorkRequests(assistantDoctor);
	}

	@Override
	public List<ConsultationWorkRequest> getDoctorWorkRequests(
			UserAccount doctor) {
		// TODO Auto-generated method stub
		return workRequestDAO.getDoctorWorkRequests(doctor);
	}

	@Override
	public void sendToDoctor(CombinedAnalysis combinedAnalysis, int enc,
			int work, String assis) {
		// TODO Auto-generated method stub
		workRequestDAO.sendToDoctor(combinedAnalysis, enc, work, assis);
	}
}
