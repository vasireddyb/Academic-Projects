package org.healthcare.hospitalapp.model.workrequest;

import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.OneToOne;
import javax.persistence.PrimaryKeyJoinColumn;
import javax.persistence.Table;

import org.healthcare.hospitalapp.model.employee.PersistentObject;
import org.healthcare.hospitalapp.model.encounter.Encounter;
import org.healthcare.hospitalapp.model.person.Patient;

@Entity
@Table(name="CONSULTATION_WORK_REQUEST")
@PrimaryKeyJoinColumn(name="REQUEST_ID")
public class ConsultationWorkRequest extends WorkRequest implements PersistentObject {
	
	private String patient;
	@OneToOne(fetch = FetchType.LAZY, cascade = CascadeType.ALL)
    private Encounter encounter;
	@Column(name = "ASS_DOC_MSG", length=50)
    private String assDocMsg;

    public ConsultationWorkRequest(){}
    
    /**
     * @return the patient
     */
    public String getPatient() {
        return patient;
    }

    /**
     * @param patient the patient to set
     */
    public void setPatient(String patient) {
        this.patient = patient;
    }

    /**
     * @return the encounter
     */
    public Encounter getEncounter() {
        return encounter;
    }

    /**
     * @param encounter the encounter to set
     */
    public void setEncounter(Encounter encounter) {
        this.encounter = encounter;
    }

    /**
     * @return the assDocMsg
     */
    public String getAssDocMsg() {
        return assDocMsg;
    }

    /**
     * @param assDocMsg the assDocMsg to set
     */
    public void setAssDocMsg(String assDocMsg) {
        this.assDocMsg = assDocMsg;
    }
    
    }
