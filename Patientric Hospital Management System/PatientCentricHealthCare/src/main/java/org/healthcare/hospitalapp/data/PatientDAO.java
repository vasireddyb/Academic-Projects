package org.healthcare.hospitalapp.data;

import java.util.Date;
import java.util.List;

import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.healthcare.hospitalapp.model.encounter.Encounter;
import org.healthcare.hospitalapp.model.person.Patient;
import org.healthcare.hospitalapp.model.workrequest.ConsultationWorkRequest;
import org.hibernate.Criteria;
import org.hibernate.Session;
import org.hibernate.Transaction;
import org.hibernate.criterion.Restrictions;
import org.springframework.stereotype.Repository;

@Repository
public class PatientDAO extends DAO{
	public void addPatient(UserAccount ua){
		Session session = getSession();
		Transaction transaction = session.beginTransaction();
		session.persist(ua);
		transaction.commit();
		session.close();
	}


	public void sendComplaint(ConsultationWorkRequest consult, int userId, UserAccount patient) {
		Session session = getSession();
		Transaction transaction = session.beginTransaction();
		Criteria criteria = session.createCriteria(UserAccount.class);
		criteria.add(Restrictions.eq("username", patient.getUsername()));
		UserAccount patientAcc = (UserAccount) criteria.uniqueResult();
		UserAccount user = (UserAccount)session.get(UserAccount.class, userId);
		consult.getEncounter().setPatient(patientAcc.getPatient());
		consult.getEncounter().setDate(new Date());
		consult.setPatient(patientAcc.getPatient().getFirstName());
		consult.setReceiver(user.getUsername());
		consult.setStatus("prePro");
		consult.setMessage("I need help");
		consult.setRole("ASSISTANTDOCTOR");
		consult.setUserAccount(user);
		consult.setSender(patientAcc.getUsername());
		session.save(consult);
		transaction.commit();
		session.close();
	}


	public List<Encounter> checkReport(UserAccount patient) {
		Session session = getSession();
		session.beginTransaction();
		Criteria criteria = session.createCriteria(UserAccount.class);
		criteria.add(Restrictions.eq("username", patient.getUsername()));
		UserAccount patientAcc = (UserAccount) criteria.uniqueResult();
		Patient pat = patientAcc.getPatient();
		Criteria criteriaEnc = session.createCriteria(Encounter.class);
		criteriaEnc.add(Restrictions.eq("patient", pat));
		List<Encounter> encList = criteriaEnc.list();
		return encList;
	}
}
