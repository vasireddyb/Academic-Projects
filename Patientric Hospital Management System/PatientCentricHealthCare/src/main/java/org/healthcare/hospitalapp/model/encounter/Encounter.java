package org.healthcare.hospitalapp.model.encounter;

import java.util.Date;

import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToOne;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

import org.healthcare.hospitalapp.model.employee.Doctor;
import org.healthcare.hospitalapp.model.employee.PersistentObject;
import org.healthcare.hospitalapp.model.person.Patient;

@Entity
@Table(name="ENCOUNTER")
public class Encounter implements PersistentObject {

	@Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "ENC_ID", unique = true, nullable = false)
    private int encounterId;
	@OneToOne(fetch = FetchType.LAZY, cascade = CascadeType.ALL)
	private VitalSign vitalSign;
	@OneToOne(fetch = FetchType.LAZY, cascade = CascadeType.ALL)
    private MedicationDetails medDetails;
	@OneToOne(fetch = FetchType.LAZY, cascade = CascadeType.ALL)
    private Assessment assessment;
	@OneToOne(fetch = FetchType.LAZY, cascade = CascadeType.ALL)
    private Patient patient;
	@OneToOne(fetch = FetchType.LAZY, cascade = CascadeType.ALL)
    private Doctor doctor;
	@Temporal(TemporalType.DATE)
	@Column(name = "ENC_DATE", length=10)
    private Date date;
	@Column(name = "CHIEF_COMPLAINT")
    private String chiefComplaint;
	@Column(name = "ASSISTANT_DOCTOR_NOTES")
    private String assistantDoctorNotes;
	@Column(name = "DOCTOR_NOTES")
    private String doctorNotes;
    
    public Encounter(){
    }

    /**
     * @return the vitalSign
     */
    public VitalSign getVitalSign() {
        return vitalSign;
    }

    /**
     * @param vitalSign the vitalSign to set
     */
    public void setVitalSign(VitalSign vitalSign) {
        this.vitalSign = vitalSign;
    }

    /**
     * @return the medDetails
     */
    public MedicationDetails getMedDetails() {
        return medDetails;
    }

    /**
     * @param medDetails the medDetails to set
     */
    public void setMedDetails(MedicationDetails medDetails) {
        this.medDetails = medDetails;
    }
    
    public Patient getPatient() {
        return patient;
    }

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


    /**
     * @return the date
     */
    public Date getDate() {
        return date;
    }

    /**
     * @param date the date to set
     */
    public void setDate(Date date) {
        this.date = date;
    }

    /**
     * @return the assistantDoctorNotes
     */
    public String getAssistantDoctorNotes() {
        return assistantDoctorNotes;
    }

    /**
     * @param assistantDoctorNotes the assistantDoctorNotes to set
     */
    public void setAssistantDoctorNotes(String assistantDoctorNotes) {
        this.assistantDoctorNotes = assistantDoctorNotes;
    }

    /**
     * @return the doctorNotes
     */
    public String getDoctorNotes() {
        return doctorNotes;
    }

    /**
     * @param doctorNotes the doctorNotes to set
     */
    public void setDoctorNotes(String doctorNotes) {
        this.doctorNotes = doctorNotes;
    }

    /**
     * @return the assessment
     */
    public Assessment getAssessment() {
        return assessment;
    }

    /**
     * @return the chiefComplaint
     */
    public String getChiefComplaint() {
        return chiefComplaint;
    }

    /**
     * @param chiefComplaint the chiefComplaint to set
     */
    public void setChiefComplaint(String chiefComplaint) {
        this.chiefComplaint = chiefComplaint;
    }

    /**
     * @param assessment the assessment to set
     */
    public void setAssessment(Assessment assessment) {
        this.assessment = assessment;
    }

    @Override
    public String toString() {
        return chiefComplaint;
    }

	public int getEncounterId() {
		return encounterId;
	}

	public void setEncounterId(int encounterId) {
		this.encounterId = encounterId;
	}
    
}
