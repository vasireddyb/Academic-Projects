package org.healthcare.hospitalapp.service.employee;

import java.util.List;

import org.healthcare.hospitalapp.model.employee.UserAccount;

public interface IUserAccountService {

	public List<UserAccount> getUserAccountList();
	public UserAccount queryUserByNameAndPassword(String name, String password) throws Exception;
	public List<UserAccount> getAllUserAccountList();
}
