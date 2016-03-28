package org.healthcare.hospitalapp.model.workrequest;

import org.healthcare.hospitalapp.model.employee.Doctor;
import org.healthcare.hospitalapp.model.employee.PersistentObject;
import org.healthcare.hospitalapp.model.encounter.MedicationDetails;
import org.healthcare.hospitalapp.model.person.Patient;


public class MedicationWorkRequest extends WorkRequest implements PersistentObject {

	private MedicationDetails medicationDetails;
    private Patient patient;
    private Doctor doctor;

    public MedicationWorkRequest(){}
    
    /**
     * @return the medicationDetails
     */
    public MedicationDetails getMedicationDetails() {
        return medicationDetails;
    }

    /**
     * @param medicationDetails the medicationDetails to set
     */
    public void setMedicationDetails(MedicationDetails medicationDetails) {
        this.medicationDetails = medicationDetails;
    }

    /**
     * @return the patient
     */
    public Patient getPatient() {
        return patient;
    }

    /**
     * @param patient the patient to set
     */
    public void setPatient(Patient patient) {
        this.patient = patient;
    }

    /**
     * @return the doctor
     */
    public Doctor getDoctor() {
        return doctor;
    }

    /**
     * @param doctor the doctor to set
     */
    public void setDoctor(Doctor doctor) {
        this.doctor = doctor;
    }
}
