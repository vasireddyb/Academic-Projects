package org.healthcare.hospitalapp.data;

import org.hibernate.Session;

public class DAO {

	public Session getSession(){
		   return HibernateUtil.getSessionFactory().openSession();
	}
}
