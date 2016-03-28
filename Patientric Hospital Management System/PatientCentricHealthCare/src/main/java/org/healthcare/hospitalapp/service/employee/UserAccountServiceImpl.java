package org.healthcare.hospitalapp.service.employee;

import java.util.List;

import org.healthcare.hospitalapp.data.UserAccountDAO;
import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class UserAccountServiceImpl implements IUserAccountService {

	@Autowired
	private UserAccountDAO userAccountDAO;
	
	@Override
	public List<UserAccount> getUserAccountList() {
		return userAccountDAO.getUserAccountList();
	}

	@Override
	public UserAccount queryUserByNameAndPassword(String name, String password)
			throws Exception {
		UserAccount userAccount = userAccountDAO.queryUserByNameAndPassword(name, password);
		return userAccount;
	}
	@Override
	public List<UserAccount> getAllUserAccountList(){
		return userAccountDAO.getAllUserAccountList();
	}

}
