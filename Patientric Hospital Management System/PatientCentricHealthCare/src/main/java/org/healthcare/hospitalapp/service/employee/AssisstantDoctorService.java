package org.healthcare.hospitalapp.service.employee;

import java.util.List;

import org.healthcare.hospitalapp.data.AssistantDoctorDAO;
import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class AssisstantDoctorService implements IAssisstantDoctorService {

	@Autowired
	AssistantDoctorDAO assisstantDoctorDAO;
	
	@Override
	public List<UserAccount> getAssistantDoctorUserAccounts() {
		// TODO Auto-generated method stub
		return assisstantDoctorDAO.getAssistantDoctorUserAccounts();
	}

}
