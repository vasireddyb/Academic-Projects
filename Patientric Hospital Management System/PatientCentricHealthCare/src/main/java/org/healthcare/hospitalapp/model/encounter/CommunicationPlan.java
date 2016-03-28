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
@Table(name="COMMUNICATION_PLAN")
public class CommunicationPlan implements PersistentObject {

	@Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "COMMUNICATION_ID", unique = true, nullable = false)
	private int commId;
	@NotEmpty(message="Communication Plan could not be left blank/ Invalid Characters")
	@Column(name = "COMMUNICATION_PLAN", nullable = false)
	private String communicationPlan;

	public CommunicationPlan(){}
    /**
     * @return the communicationPlan
     */
    public String getCommunicationPlan() {
        return communicationPlan;
    }

    /**
     * @param communicationPlan the communicationPlan to set
     */
    public void setCommunicationPlan(String communicationPlan) {
        this.communicationPlan = communicationPlan;
    }
	public int getCommId() {
		return commId;
	}
	public void setCommId(int commId) {
		this.commId = commId;
	}
}
