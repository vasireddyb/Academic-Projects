package org.healthcare.hospitalapp.model.encounter;

import java.util.List;

import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.OneToMany;
import javax.persistence.Table;

import org.healthcare.hospitalapp.model.employee.PersistentObject;

@Entity
@Table(name="MEDICATION_DETAILS")
public class MedicationDetails implements PersistentObject {

	@Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "MEDICATION_DETAILS_ID", unique = true, nullable = false)
	private int mediactionDetailsId;
	@OneToMany(fetch = FetchType.LAZY, cascade = CascadeType.ALL)
	private List<Drug> drugList;
	@Column(name = "INSTRUCTIONS",nullable = false)
    private String instructions;

    public MedicationDetails(){
    }
    /**
     * @return the drugList
     */
    public List<Drug> getDrugList() {
        return drugList;
    }
    
    public void addDrug(Drug drug){
        drugList.add(drug);
    }

    public void removeDrug(Drug drug){
        drugList.remove(drug);
    }
    
    /**
     * @return the instructions
     */
    public String getInstructions() {
        return instructions;
    }

    /**
     * @param instructions the instructions to set
     */
    public void setInstructions(String instructions) {
        this.instructions = instructions;
    }
	public int getMediactionDetailsId() {
		return mediactionDetailsId;
	}
	public void setMediactionDetailsId(int mediactionDetailsId) {
		this.mediactionDetailsId = mediactionDetailsId;
	}
	public void setDrugList(List<Drug> drugList) {
		this.drugList = drugList;
	}
}
