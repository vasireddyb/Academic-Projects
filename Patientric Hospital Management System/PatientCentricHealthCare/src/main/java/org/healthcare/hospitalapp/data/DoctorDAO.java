package org.healthcare.hospitalapp.data;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import org.healthcare.hospitalapp.model.employee.Doctor;
import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.healthcare.hospitalapp.model.encounter.Drug;
import org.healthcare.hospitalapp.model.encounter.Encounter;
import org.healthcare.hospitalapp.model.encounter.MedicationDetails;
import org.healthcare.hospitalapp.model.workrequest.ConsultationWorkRequest;
import org.hibernate.Criteria;
import org.hibernate.Session;
import org.hibernate.Transaction;
import org.hibernate.criterion.Restrictions;
import org.springframework.stereotype.Repository;

@Repository
public class DoctorDAO extends DAO{

	public void addDoctorUserAccount(UserAccount ua){
		Session session = getSession();
		Transaction transaction = session.beginTransaction();
		session.persist(ua);
		transaction.commit();
		session.close();
	}
	
	public List<UserAccount> getDoctorUserAccounts(){
		Criteria criteria = getSession().createCriteria(UserAccount.class);
		criteria.add(Restrictions.eq("role", "DOCTOR"));
		criteria.add(Restrictions.eq("status", "true"));
		List<UserAccount> userAccounts = criteria.list();
		return userAccounts;
	}

	public void medicatePatient(int enc, int work, String[] drugId,
			MedicationDetails medicationDetails) {
		Session session = getSession();
		Transaction tx = session.beginTransaction();
		ConsultationWorkRequest consWorkReq = (ConsultationWorkRequest)session.get(ConsultationWorkRequest.class, work);
		Encounter encounter = (Encounter)session.get(Encounter.class, enc);
		medicationDetails.setDrugList(new ArrayList<Drug>());
		for(String dID : drugId) {
			int druId  = Integer.parseInt(dID);
			Drug drug = (Drug) session.get(Drug.class, druId);
			medicationDetails.getDrugList().add(drug);
		}
		encounter.setMedDetails(medicationDetails);
		encounter.setDoctorNotes("Patient Treated");
		consWorkReq.setEncounter(encounter);
		consWorkReq.setStatus("completed");
		consWorkReq.setRole("DOCTOR");
		consWorkReq.setSender(encounter.getPatient().getPrimaryDoctor());
		session.saveOrUpdate(consWorkReq);
		tx.commit();
		session.close();
	}
}
