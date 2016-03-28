package org.healthcare.hospitalapp.service.employee;

import java.util.Iterator;
import java.util.List;

import org.healthcare.hospitalapp.data.DoctorDAO;
import org.healthcare.hospitalapp.data.EmployeeDAO;
import org.healthcare.hospitalapp.data.UserAccountDAO;
import org.healthcare.hospitalapp.model.employee.Doctor;
import org.healthcare.hospitalapp.model.employee.Employee;
import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class EmployeeServiceImpl implements IEmployeeService {

	@Autowired
	EmployeeDAO employeeDAO;
	@Autowired
	DoctorDAO doctorDAO;

	@Autowired
	UserAccountDAO userAccountDAO;
	
	@Override
	public boolean addEmployeeUserAccount(UserAccount userAccount) {
		List<UserAccount> users = userAccountDAO.getAllUserAccountList();
		for (Iterator iterator = users.iterator(); iterator.hasNext();) {
			UserAccount userAcc = (UserAccount) iterator.next();
			if(userAcc.getUsername().equals(userAccount.getUsername()))
			{
				return false;
			}
		}
		employeeDAO.addEmployeeUserAccount(userAccount);
		return true;
	}
	
	@Override
	public boolean addDoctorUserAccount(UserAccount userAccount,Doctor doctor) {
		List<UserAccount> users = userAccountDAO.getAllUserAccountList();
		for (Iterator iterator = users.iterator(); iterator.hasNext();) {
			UserAccount userAcc = (UserAccount) iterator.next();
			if(userAcc.getUsername().equals(userAccount.getUsername()))
			{
				return false;
			}
		}
			doctor.setFirstName(userAccount.getEmployee().getFirstName());
			doctor.setLastName(userAccount.getEmployee().getLastName());
			userAccount.setEmployee(doctor);
			doctorDAO.addDoctorUserAccount(userAccount);
			return true;
	}

	@Override
	public List<UserAccount> getEmployeeList() {
		return userAccountDAO.getUserAccountList();
	}

	@Override
	public void deleteemployees(String[] empID) throws Exception {
		employeeDAO.deleteemployees(empID);
		
	}

}
