package org.healthcare.hospitalapp.model.person;


import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.PrimaryKeyJoinColumn;
import javax.validation.constraints.Size;
import org.healthcare.hospitalapp.model.employee.PersistentObject;
import org.hibernate.validator.constraints.NotEmpty;

@Entity
@PrimaryKeyJoinColumn(name="PERSON_ID")
public class Patient extends Person implements PersistentObject {

	@NotEmpty(message="Father Name could not be left blank/ Invalid Characters")
	@Column(name = "FATHER_NAME", nullable = false)
	private String fatherName;
	@Column(name = "PRIMARY_DOCTOR", nullable = false)
    private String primaryDoctor;
	@NotEmpty(message="Family History could not be left blank/ Invalid Characters")
    @Column(name = "FAMILY_HISTORY", nullable = false)
    private String familyHistory;
    
    public Patient(){
    }

    /**
     * @return the fatherName
     */
    public String getFatherName() {
        return fatherName;
    }

    /**
     * @param fatherName the fatherName to set
     */
    public void setFatherName(String fatherName) {
        this.fatherName = fatherName;
    }


    /**
     * @return the primaryDoctor
     */
    public String getPrimaryDoctor() {
        return primaryDoctor;
    }

    /**
     * @param primaryDoctor the primaryDoctor to set
     */
    public void setPrimaryDoctor(String primaryDoctor) {
        this.primaryDoctor = primaryDoctor;
    }

    /**
     * @return the familyHistory
     */
    public String getFamilyHistory() {
        return familyHistory;
    }

    /**
     * @param familyHistory the familyHistory to set
     */
    public void setFamilyHistory(String familyHistory) {
        this.familyHistory = familyHistory;
    }

}
