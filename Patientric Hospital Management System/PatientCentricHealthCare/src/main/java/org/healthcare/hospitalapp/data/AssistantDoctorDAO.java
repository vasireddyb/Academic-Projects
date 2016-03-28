package org.healthcare.hospitalapp.data;

import java.util.List;

import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.hibernate.Criteria;
import org.hibernate.criterion.Restrictions;
import org.springframework.stereotype.Repository;

@Repository
public class AssistantDoctorDAO extends DAO{

	public List<UserAccount> getAssistantDoctorUserAccounts(){
		Criteria criteria = getSession().createCriteria(UserAccount.class);
		criteria.add(Restrictions.eq("role", "ASSISTANTDOCTOR"));
		criteria.add(Restrictions.eq("status", "true"));
		List<UserAccount> userAccounts = criteria.list();
		return userAccounts;
	}
}
