package org.healthcare.hospitalapp.model.employee;

import java.util.List;

import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.OneToMany;
import javax.persistence.OneToOne;
import javax.persistence.Table;
import javax.validation.Valid;
import javax.validation.constraints.Size;

import org.healthcare.hospitalapp.model.person.Patient;
import org.healthcare.hospitalapp.model.workrequest.WorkRequest;
import org.hibernate.validator.constraints.NotEmpty;

@Entity
@Table(name="USER_ACCOUNT")
public class UserAccount implements PersistentObject {

	@Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "USER_ID", unique = true, nullable = false)
	private int userId;
	@NotEmpty(message="User Name could not be left blank/ Invalid Characters")
	@Size(min=5, max=10, message="Your User name should be between 5 - 10 characters.")
	@Column(name = "USER_NAME", nullable = false)
	private String username;
	@NotEmpty(message="Password could not be left blank/ Invalid Characters")
	@Size(min=5, max=10, message="Your Password should be between 5 - 10 characters.")
	@Column(name = "PASSWORD", nullable = false)
    private String password;
	@Column(name = "STATUS", nullable = false)
    private String status = "true";
	@Valid
	@OneToOne(fetch = FetchType.LAZY,  cascade = CascadeType.ALL)
    private Employee employee;
	@Valid
	@OneToOne(fetch = FetchType.LAZY,  cascade = CascadeType.ALL)
    private Patient patient;
	@Column(name = "ROLE", nullable = false)    
    private String role;
	@OneToMany(fetch = FetchType.LAZY, mappedBy = "userAccount", cascade = CascadeType.ALL)
    private List<WorkRequest> workQueue;

    public UserAccount() {
        
    }
    
    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getRole() {
        return role;
    }

    public void setEmployee(Employee employee) {
        this.employee = employee;
    }

    public void setRole(String role) {
        this.role = role;
    }

    public Employee getEmployee() {
        return employee;
    }

    public List<WorkRequest> getWorkQueue() {
        return workQueue;
    }

    
    
    @Override
    public String toString() {
        return username;
    }

    /**
     * @return the status
     */
    public String getStatus() {
        return status;
    }

    /**
     * @param status the status to set
     */
    public void setStatus(String status) {
        this.status = status;
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

	public int getUserId() {
		return userId;
	}

	public void setUserId(int userId) {
		this.userId = userId;
	}

	public void setWorkQueue(List<WorkRequest> workQueue) {
		this.workQueue = workQueue;
	}
}
