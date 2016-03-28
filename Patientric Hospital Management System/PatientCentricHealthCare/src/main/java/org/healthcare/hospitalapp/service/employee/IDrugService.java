package org.healthcare.hospitalapp.service.employee;

import java.util.List;

import org.healthcare.hospitalapp.model.encounter.Drug;

public interface IDrugService {

	public List<Drug> getDrugList();
	public void deleteDrugs(String[] drugId);
	public void addDrug(Drug drug);
}
