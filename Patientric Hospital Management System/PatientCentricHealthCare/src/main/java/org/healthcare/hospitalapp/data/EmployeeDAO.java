package org.healthcare.hospitalapp.data;

import java.util.Iterator;
import java.util.List;

import org.healthcare.hospitalapp.model.employee.Employee;
import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.hibernate.Criteria;
import org.hibernate.Query;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.Transaction;
import org.hibernate.criterion.Restrictions;
import org.springframework.stereotype.Repository;

@Repository
public class EmployeeDAO extends DAO{
	
	
	public void addEmployeeUserAccount(UserAccount ua){
		Session session = getSession();
		Transaction transaction = session.beginTransaction();
		Employee e = ua.getEmployee();
		session.persist(ua);
		ua.setEmployee(e);
		session.persist(e);
		transaction.commit();
		session.close();
	}
	
	public List<Employee> getEmployeeList(){
		Query query = getSession().getNamedQuery("getAllEmployees");
		List<Employee> employees = query.list();
		return employees;
	}
	
	public void deleteemployees(String[] empID) throws Exception{
			Session session = getSession();
			for(String eID : empID) {
				session.beginTransaction();
				//Transaction transaction = getSession().beginTransaction();
			
//				Criteria criteria = getSession().createCriteria(UserAccount.class);
//				int empId  = Integer.parseInt(eID);
//				criteria.add(Restrictions.eq("employee.employeeId", empId));
//				List<UserAccount> userAccounts = criteria.list();
				int empId  = Integer.parseInt(eID);
				String hql = "update UserAccount SET status = 'false' where employee.employeeId = :eID";
				Query query = session.createQuery(hql);
				query.setInteger("eID", empId);
				query.executeUpdate();
				
			    session.getTransaction().commit();
			}
			session.close();
		
		
	}
	
}
