package org.healthcare.hospitalapp.model.encounter;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

import org.healthcare.hospitalapp.model.employee.PersistentObject;
import org.hibernate.validator.constraints.NotEmpty;

@Entity
@Table(name="MEDICATION_GUIDE")
public class MedicationGuide implements PersistentObject {

	@Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "MEDICATION_GUIDE_ID", unique = true, nullable = false)
	private int medicationGuideId;
	@NotEmpty(message="Dos could not be left blank/ Invalid Characters")
	@Column(name = "DOS", nullable = false)
    private String dos;
	@NotEmpty(message="Donts could not be left blank/ Invalid Characters")
	@Column(name = "DONTS", nullable = false)
    private String donts;
	@NotEmpty(message="Side Effects could not be left blank/ Invalid Characters")
	@Column(name = "SIDE_EFFECTS", nullable = false)
    private String sideEffects;
    
    
    public MedicationGuide() {
	}

    public String getDos() {
        return dos;
    }

    public void setDos(String dos) {
        this.dos = dos;
    }

    public String getDonts() {
        return donts;
    }

    public void setDonts(String donts) {
        this.donts = donts;
    }

    /**
     * @return the sideEffects
     */
    public String getSideEffects() {
        return sideEffects;
    }

    /**
     * @param sideEffects the sideEffects to set
     */
    public void setSideEffects(String sideEffects) {
        this.sideEffects = sideEffects;
    }

	public int getMedicationGuideId() {
		return medicationGuideId;
	}

	public void setMedicationGuideId(int medicationGuideId) {
		this.medicationGuideId = medicationGuideId;
	}
}
