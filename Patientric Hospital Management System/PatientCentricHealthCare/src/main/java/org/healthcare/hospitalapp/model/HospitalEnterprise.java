package org.healthcare.hospitalapp.model;

import java.util.List;
import java.util.Set;






import org.healthcare.hospitalapp.model.employee.PersistentObject;
import org.healthcare.hospitalapp.model.encounter.Drug;
import org.healthcare.hospitalapp.model.encounter.Encounter;
import org.healthcare.hospitalapp.model.person.Patient;

public class HospitalEnterprise implements PersistentObject {

	private Set<Patient> patientList;
	private List<Encounter> encounterHistory;
	private List<Drug> drugList;
    
    public HospitalEnterprise(){
    }
    
    public Set<Patient> getPatientList() {
		return patientList;
	}

	public List<Encounter> getEncounterHistory() {
		return encounterHistory;
	}

	public List<Drug> getDrugList() {
		return drugList;
	}
    
}
