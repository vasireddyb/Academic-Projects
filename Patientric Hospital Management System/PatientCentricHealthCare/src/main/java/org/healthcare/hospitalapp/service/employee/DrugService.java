package org.healthcare.hospitalapp.service.employee;

import java.util.List;

import org.healthcare.hospitalapp.data.DrugDAO;
import org.healthcare.hospitalapp.model.encounter.Drug;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class DrugService implements IDrugService {

	@Autowired
	DrugDAO drugDAO;
	
	@Override
	public List<Drug> getDrugList() {
		// TODO Auto-generated method stub
		return drugDAO.getDrugList();
	}

	@Override
	public void deleteDrugs(String[] drugId) {
		// TODO Auto-generated method stub
		drugDAO.deleteDrugs(drugId);
	}

	@Override
	public void addDrug(Drug drug) {
		// TODO Auto-generated method stub
		drugDAO.addDrug(drug);
	}

}
