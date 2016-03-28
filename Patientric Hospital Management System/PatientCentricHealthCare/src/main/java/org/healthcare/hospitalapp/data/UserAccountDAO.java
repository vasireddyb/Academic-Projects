package org.healthcare.hospitalapp.data;

import java.util.List;

import org.healthcare.hospitalapp.model.employee.Employee;
import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.hibernate.Criteria;
import org.hibernate.HibernateException;
import org.hibernate.Query;
import org.hibernate.Session;
import org.hibernate.criterion.Restrictions;
import org.springframework.stereotype.Repository;

@Repository
public class UserAccountDAO extends DAO{

	public UserAccount queryUserByNameAndPassword(String name, String password) throws Exception{
		
		try{
			//begin();
			
			Query q = getSession().createQuery("from UserAccount where username = :username and password = :password");
			q.setString("username", name);
			q.setString("password", password);
			
			UserAccount user = (UserAccount)q.uniqueResult();
			//commit();
			return user;
			
		}
		catch(HibernateException e){
			//rollback();
			throw new Exception("Could not find userr!!!!!!!!!!!!"+e);
		}
		
	}
	
	public List<UserAccount> getUserAccountList(){
		Criteria criteria = getSession().createCriteria(UserAccount.class);
		criteria.add(Restrictions.ne("role", "PATIENT"));
		criteria.add(Restrictions.ne("role", "ADMIN"));
		criteria.add(Restrictions.eq("status", "true"));
		List<UserAccount> userAccounts = criteria.list();
		return userAccounts;
	}
	
	public List<UserAccount> getAllUserAccountList(){
		Criteria criteria = getSession().createCriteria(UserAccount.class);
		criteria.add(Restrictions.eq("status", "true"));
		List<UserAccount> userAccounts = criteria.list();
		return userAccounts;
	}
}
