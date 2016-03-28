package org.healthcare.hospitalapp;

import org.healthcare.hospitalapp.data.HibernateUtil;
import org.healthcare.hospitalapp.model.employee.Employee;
import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.hibernate.Session;

public class SetUsers {

	public static void main(String[] args) {
		System.out.println("Hibernate one to one (Annotation)");
		Session session = HibernateUtil.getSessionFactory().openSession();
 
		session.beginTransaction();
 
		Employee employee = new Employee();
		Employee employee1 = new Employee();
		Employee employee2= new Employee();
		Employee employee3 = new Employee();
 
//		employee.setFirstName("Rishi");
//		employee.setLastName("Bokka");
//		employee.setAge(23);
//		employee.setCity("Boston");
//		employee.setEmail("brishi19791@gmail.com");
//		employee.setPhNum(123456789);
//		
//		employee1.setFirstName("Vikas");
//		employee1.setLastName("Vellanki");
//		employee1.setAge(25);
//		employee1.setCity("Boston");
//		employee1.setEmail("vellanki.v@gmail.com");
//		employee1.setPhNum(987545653);
//		
//		employee2.setFirstName("Bhavya");
//		employee2.setLastName("Vasireddy");
//		employee2.setAge(25);
//		employee2.setCity("Boston");
//		employee2.setEmail("vasireddy.b.v@gmail.com");
//		employee2.setPhNum(634832489);
//		
//		employee3.setFirstName("Praneeth");
//		employee3.setLastName("Vellaboyana");
//		employee3.setAge(25);
//		employee3.setCity("Boston");
//		employee3.setEmail("vellaboyana.p@gmail.com");
//		employee3.setPhNum(623497324);
 
		UserAccount userAccount = new UserAccount();
		userAccount.setUsername("admin");
		userAccount.setPassword("admin");
		userAccount.setRole("ADMIN");
		userAccount.setStatus("true");
		
		UserAccount userAccount1 = new UserAccount();
		userAccount1.setUsername("vikas");
		userAccount1.setPassword("vikas");
		userAccount1.setRole("DOCTOR");
		userAccount1.setStatus("true");
		
		UserAccount userAccount2 = new UserAccount();
		userAccount2.setUsername("bhav");
		userAccount2.setPassword("bhav");
		userAccount2.setRole("ASSISTANTDOCTOR");
		userAccount2.setStatus("true");
		
		UserAccount userAccount3 = new UserAccount();
		userAccount3.setUsername("praneeth");
		userAccount3.setPassword("praneeth");
		userAccount3.setRole("LABASSISTANT");
		userAccount3.setStatus("true");


 
		//employee.setUserAccount(userAccount);
		userAccount.setEmployee(employee);
		userAccount1.setEmployee(employee1);
		userAccount2.setEmployee(employee2);
		userAccount3.setEmployee(employee3);
 
		session.save(userAccount);
		session.save(userAccount1);
		session.save(userAccount2);
		session.save(userAccount3);
		session.getTransaction().commit();
 
		System.out.println("Done");
	}
}
