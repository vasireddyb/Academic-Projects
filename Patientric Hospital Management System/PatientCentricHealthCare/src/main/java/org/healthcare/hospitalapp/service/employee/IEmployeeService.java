package org.healthcare.hospitalapp.service.employee;

import java.util.List;

import org.healthcare.hospitalapp.model.employee.Doctor;
import org.healthcare.hospitalapp.model.employee.Employee;
import org.healthcare.hospitalapp.model.employee.UserAccount;

public interface IEmployeeService {

	public  boolean addEmployeeUserAccount(UserAccount userAccount);
	public boolean addDoctorUserAccount(UserAccount userAccount,Doctor doctor);
	public List<UserAccount> getEmployeeList();
	public void deleteemployees(String[] empID) throws Exception;
}
