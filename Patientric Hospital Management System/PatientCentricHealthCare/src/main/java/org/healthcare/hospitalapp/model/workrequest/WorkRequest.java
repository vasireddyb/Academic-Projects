package org.healthcare.hospitalapp.model.workrequest;

import java.util.Date;

import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Inheritance;
import javax.persistence.InheritanceType;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

import org.healthcare.hospitalapp.model.employee.PersistentObject;
import org.healthcare.hospitalapp.model.employee.UserAccount;

@Entity
@Table(name="WORK_REQUEST")
@Inheritance(strategy=InheritanceType.JOINED)
public class WorkRequest implements PersistentObject {

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "REQUEST_ID", unique = true, nullable = false)
	private int requestId;
    @Column(name="MESSAGE")
	private String message;
    private String sender;
    private String receiver;
    @Column(name="STATUS", nullable=false)
    private String status;
    @Column(name="ROLE", nullable=false)
    private String role;
    @ManyToOne(fetch = FetchType.LAZY)
	@JoinColumn(name = "USER_ID")
    private UserAccount userAccount;
    
    public WorkRequest(){
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public String getSender() {
        return sender;
    }

    public void setSender(String sender) {
        this.sender = sender;
    }

    public String getReceiver() {
        return receiver;
    }

    public void setReceiver(String receiver) {
        this.receiver = receiver;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

	public String getRole() {
		return role;
	}

	public void setRole(String role) {
		this.role = role;
	}
	
    @Override
    public String toString() {
        return status;
    }

	public int getRequestId() {
		return requestId;
	}

	public void setRequestId(int requestId) {
		this.requestId = requestId;
	}

	public UserAccount getUserAccount() {
		return userAccount;
	}

	public void setUserAccount(UserAccount userAccount) {
		this.userAccount = userAccount;
	}
}
