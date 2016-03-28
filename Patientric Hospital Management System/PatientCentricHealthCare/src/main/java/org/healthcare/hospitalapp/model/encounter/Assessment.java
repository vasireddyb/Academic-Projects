package org.healthcare.hospitalapp.model.encounter;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

import org.healthcare.hospitalapp.model.employee.PersistentObject;
import org.hibernate.validator.constraints.NotEmpty;

@Entity
public class Assessment implements PersistentObject {

	@Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "ASSESSMENT_ID", unique = true, nullable = false)
	private int assessId;
	@NotEmpty(message="Assisstant Doctor Notes could not be left blank/ Invalid Characters")
	@Column(name = "ASS_NOTES", nullable = false)
	private String assNotes;
	@NotEmpty(message="Pregnancy could not be left blank/ Invalid Characters")
	@Column(name = "PREGNANCY", nullable = false)
    private String pregnancy;
	@NotEmpty(message="Symptoms could not be left blank/ Invalid Characters")
	@Column(name = "SYMPTOMS", nullable = false)
    private String symptoms;
	@NotEmpty(message="Occurence could not be left blank/ Invalid Characters")
	@Column(name = "OCCURENCE", nullable = false)
    private String occurence;
	@NotEmpty(message="Std could not be left blank/ Invalid Characters")
	@Column(name = "STD", nullable = false)
    private String std;

    public Assessment(){}
    
    /**
     * @return the assNotes
     */
    public String getAssNotes() {
        return assNotes;
    }

    /**
     * @param assNotes the assNotes to set
     */
    public void setAssNotes(String assNotes) {
        this.assNotes = assNotes;
    }

    /**
     * @return the pregnancy
     */
    public String getPregnancy() {
        return pregnancy;
    }

    /**
     * @param pregnancy the pregnancy to set
     */
    public void setPregnancy(String pregnancy) {
        this.pregnancy = pregnancy;
    }

    /**
     * @return the symptoms
     */
    public String getSymptoms() {
        return symptoms;
    }

    /**
     * @param symptoms the symptoms to set
     */
    public void setSymptoms(String symptoms) {
        this.symptoms = symptoms;
    }

    /**
     * @return the occurence
     */
    public String getOccurence() {
        return occurence;
    }

    /**
     * @param occurence the occurence to set
     */
    public void setOccurence(String occurence) {
        this.occurence = occurence;
    }

    /**
     * @return the std
     */
    public String getStd() {
        return std;
    }

    /**
     * @param std the std to set
     */
    public void setStd(String std) {
        this.std = std;
    }

	public int getAssessId() {
		return assessId;
	}

	public void setAssessId(int assessId) {
		this.assessId = assessId;
	}

}
