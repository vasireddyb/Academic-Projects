package org.healthcare.hospitalapp.data;

import java.util.List;

import org.healthcare.hospitalapp.model.encounter.Drug;
import org.hibernate.Criteria;
import org.hibernate.Session;
import org.springframework.stereotype.Repository;

@Repository
public class DrugDAO extends DAO{

	public List<Drug> getDrugList(){
		Criteria criteria = getSession().createCriteria(Drug.class);
		List<Drug> drug = criteria.list();
		return drug;
	}

	public void deleteDrugs(String[] drugId) {
		Session session = getSession();
		for(String dID : drugId) {
			session.beginTransaction();
			int druId  = Integer.parseInt(dID);
			Drug drug = (Drug) session.get(Drug.class, druId);
			session.delete(drug);
		    session.getTransaction().commit();
		}
		session.close();
	}

	public void addDrug(Drug drug) {
		Session session = getSession();
		session.beginTransaction();
		session.save(drug);
		session.getTransaction().commit();
		session.close();
	} 
}
