package org.healthcare.hospitalapp.data;

import java.util.Date;
import java.util.List;

import org.healthcare.hospitalapp.model.CombinedAnalysis;
import org.healthcare.hospitalapp.model.employee.Doctor;
import org.healthcare.hospitalapp.model.employee.Employee;
import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.healthcare.hospitalapp.model.encounter.Encounter;
import org.healthcare.hospitalapp.model.workrequest.ConsultationWorkRequest;
import org.hibernate.Criteria;
import org.hibernate.Session;
import org.hibernate.Transaction;
import org.hibernate.criterion.Restrictions;
import org.springframework.stereotype.Repository;

@Repository
public class WorkRequestDAO extends DAO{

	public List<ConsultationWorkRequest> getConsultantionWorkRequests(UserAccount assistantDoctor){
		Criteria criteria = getSession().createCriteria(ConsultationWorkRequest.class);
		criteria.add(Restrictions.eq("role", "ASSISTANTDOCTOR"));
		criteria.add(Restrictions.eq("status", "prePro"));
		criteria.add(Restrictions.eq("receiver",assistantDoctor.getUsername()));
		List<ConsultationWorkRequest> workReq = criteria.list();
		return workReq;
	}
	
	public List<ConsultationWorkRequest> getDoctorWorkRequests(UserAccount doctor){
		Criteria criteria = getSession().createCriteria(ConsultationWorkRequest.class);
		criteria.add(Restrictions.eq("role", "DOCTOR"));
		criteria.add(Restrictions.eq("status", "pro"));
		criteria.add(Restrictions.eq("receiver",doctor.getUsername()));
		List<ConsultationWorkRequest> workReq = criteria.list();
		return workReq;
	}

	public void sendToDoctor(CombinedAnalysis combinedAnalysis, int enc,
			int work,String assis) {
		Session session = getSession();
		Transaction tx = session.beginTransaction();
		ConsultationWorkRequest consWorkReq = (ConsultationWorkRequest)session.get(ConsultationWorkRequest.class, work);
		Encounter encounter = (Encounter)session.get(Encounter.class, enc);
		Criteria criteria = session.createCriteria(UserAccount.class);
		criteria.add(Restrictions.eq("username", encounter.getPatient().getPrimaryDoctor()));
		UserAccount docUser = (UserAccount) criteria.uniqueResult();
		Criteria criteria1 = session.createCriteria(Doctor.class);
		criteria1.add(Restrictions.eq("employeeId", docUser.getEmployee().getEmployeeId()));
		Doctor doc = (Doctor) criteria1.uniqueResult();
		combinedAnalysis.getVitalSign().setDate(new Date());
		encounter.setAssessment(combinedAnalysis.getAssessment());
		encounter.setVitalSign(combinedAnalysis.getVitalSign());
		encounter.setAssistantDoctorNotes(combinedAnalysis.getAssessment().getAssNotes());
		encounter.setDoctor(doc);
		consWorkReq.setEncounter(encounter);
		consWorkReq.setStatus("pro");
		consWorkReq.setRole("DOCTOR");
		consWorkReq.setSender(assis);
		consWorkReq.setReceiver(encounter.getPatient().getPrimaryDoctor());
		consWorkReq.setAssDocMsg(combinedAnalysis.getAssessment().getAssNotes());
		session.saveOrUpdate(consWorkReq);
		tx.commit();
		session.close();
	}
}
