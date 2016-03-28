package org.healthcare.hospitalapp.model.encounter;

import java.util.Date;

import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.OneToOne;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.validation.Valid;
import javax.validation.constraints.Future;
import javax.validation.constraints.NotNull;

import org.healthcare.hospitalapp.model.employee.PersistentObject;
import org.hibernate.validator.constraints.NotEmpty;
import org.springframework.format.annotation.DateTimeFormat;

@Entity
@Table(name="DRUG")
public class Drug implements PersistentObject {

	@Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "DRUG_ID", unique = true, nullable = false)
    private int drugId;
	@NotEmpty(message="Drug Name could not be left blank/ Invalid Characters")
	@Column(name = "DRUG_NAME")
	private String drugName;
	@NotNull(message="Expiry Date could not be left blank/ Invalid Characters")
	@Future(message="Expiry Date can not be a past date")
	@Temporal(TemporalType.DATE)
	@Column(name = "EXP_DATE")	
    private Date expDate;
	@NotEmpty(message="Dosage could not be left blank/ Invalid Characters")
	@Column(name = "DOSAGE")
    private String dosage;
	@NotEmpty(message="Composition could not be left blank/ Invalid Characters")
	@Column(name = "COMPOSITION")
    private String composition;
	@Valid
	@OneToOne(fetch = FetchType.LAZY, cascade = CascadeType.ALL)
    private MedicationGuide medicationGuide;
	@Valid
	@OneToOne(fetch = FetchType.LAZY, cascade = CascadeType.ALL)
    private CommunicationPlan communicationPlan;
	@ManyToOne(fetch = FetchType.LAZY, cascade = CascadeType.ALL)  
	private MedicationDetails medicationDetails;
    
    public Drug(){
    }
    /**
     * @return the drugName
     */
    public String getDrugName() {
        return drugName;
    }

    /**
     * @param drugName the drugName to set
     */
    public void setDrugName(String drugName) {
        this.drugName = drugName;
    }

    /**
     * @return the expDate
     */
    public Date getExpDate() {
        return expDate;
    }

    /**
     * @param expDate the expDate to set
     */
    public void setExpDate(Date expDate) {
        this.expDate = expDate;
    }

    /**
     * @return the dosage
     */
    public String getDosage() {
        return dosage;
    }

    /**
     * @param dosage the dosage to set
     */
    public void setDosage(String dosage) {
        this.dosage = dosage;
    }

    /**
     * @return the composition
     */
    public String getComposition() {
        return composition;
    }

    /**
     * @param composition the composition to set
     */
    public void setComposition(String composition) {
        this.composition = composition;
    }

    @Override
    public String toString() {
        return drugName;
    }

    /**
     * @return the drugId
     */
    public int getDrugId() {
        return drugId;
    }

    /**
     * @return the medicationGuide
     */
    public MedicationGuide getMedicationGuide() {
        return medicationGuide;
    }

    /**
     * @param medicationGuide the medicationGuide to set
     */
    public void setMedicationGuide(MedicationGuide medicationGuide) {
        this.medicationGuide = medicationGuide;
    }

    /**
     * @return the communicationPlan
     */
    public CommunicationPlan getCommunicationPlan() {
        return communicationPlan;
    }

    /**
     * @param communicationPlan the communicationPlan to set
     */
    public void setCommunicationPlan(CommunicationPlan communicationPlan) {
        this.communicationPlan = communicationPlan;
    }

	public void setDrugId(int drugId) {
		this.drugId = drugId;
	}
	public MedicationDetails getMedicationDetails() {
		return medicationDetails;
	}
	public void setMedicationDetails(MedicationDetails medicationDetails) {
		this.medicationDetails = medicationDetails;
	}
    
    
}
