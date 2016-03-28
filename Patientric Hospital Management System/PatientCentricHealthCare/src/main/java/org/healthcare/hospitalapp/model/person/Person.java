package org.healthcare.hospitalapp.model.person;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Inheritance;
import javax.persistence.InheritanceType;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.validation.constraints.Future;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Past;
import javax.validation.constraints.Size;

import org.healthcare.hospitalapp.model.employee.PersistentObject;
import org.hibernate.validator.constraints.Email;
import org.hibernate.validator.constraints.NotEmpty;
import org.springframework.format.annotation.DateTimeFormat;

@Entity
@Inheritance(strategy=InheritanceType.JOINED)
public class Person implements PersistentObject {

	@Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "PERSON_ID", unique = true, nullable = false)
    private int personId;
	@NotEmpty(message="First Name could not be left blank/ Invalid Characters")
	@Size(min=2, max=15, message="First name should be between 2 - 15 characters.")
	@Column(name = "FIRST_NAME", nullable = false)
	private String firstName;
	@NotEmpty(message="Last Name could not be left blank/ Invalid Characters")
	@Size(min=2, max=15, message="Your Last name should be between 2 - 15 characters.")
	@Column(name = "LAST_NAME", nullable = false)
    private String lastName;
	@NotNull(message="Birth Date could not be left blank/ Invalid Characters")
	@Past(message="Birth Date can not be a future date")
	@Temporal(TemporalType.DATE)
	@Column(name = "DATE_OF_BIRTH", nullable = false, length=10)
    private Date dateOfBirth;
	@NotEmpty(message="Gender could not be left blank/ Invalid Characters")
	@Size(min=4, max=6, message="Please enter a proper gender.")
    @Column(name = "GENDER", nullable = false)
    private String gender;
	@NotEmpty(message="SSN could not be left blank/ Invalid Characters")
	@Size(min=10, max=10, message="Please enter a proper SSN.")
    @Column(name = "SSN", nullable = false)
    private String ssn;
	@NotEmpty(message="Address could not be left blank/ Invalid Characters")
    @Column(name = "ADDRESS", nullable = false)
    private String address;
    @NotEmpty(message="Phone Number could not be left blank/ Invalid Characters")
    @Size(min=4, max=12, message="Your Phone Number should be between 4 - 12 characters.")
    @Column(name = "PHONE", nullable = false)
    private String phone;
    @NotEmpty(message="Email could not be left blank/ Invalid Characters")
    @Email(message="Please enter valid Email Id")
    @Column(name = "EMAIL", nullable = false)
    private String email;

    public Person(){}
    
    /**
     * @return the firstName
     */
    public String getFirstName() {
        return firstName;
    }

    /**
     * @param firstName the firstName to set
     */
    public void setFirstName(String firstName) {
        this.firstName = firstName;
    }

    /**
     * @return the lastName
     */
    public String getLastName() {
        return lastName;
    }

    /**
     * @param lastName the lastName to set
     */
    public void setLastName(String lastName) {
        this.lastName = lastName;
    }

    /**
     * @return the dateOfBith
     */
    public Date getDateOfBirth() {
        return dateOfBirth;
    }

    /**
     * @param dateOfBith the dateOfBith to set
     */
    public void setDateOfBirth(Date dateOfBirth) {
        this.dateOfBirth = dateOfBirth;
    }

    /**
     * @return the gender
     */
    public String getGender() {
        return gender;
    }

    /**
     * @param gender the gender to set
     */
    public void setGender(String gender) {
        this.gender = gender;
    }

    /**
     * @return the ssn
     */
    public String getSsn() {
        return ssn;
    }

    /**
     * @param ssn the ssn to set
     */
    public void setSsn(String ssn) {
        this.ssn = ssn;
    }

    /**
     * @return the address
     */
    public String getAddress() {
        return address;
    }

    /**
     * @param address the address to set
     */
    public void setAddress(String address) {
        this.address = address;
    }

    /**
     * @return the phone
     */
    public String getPhone() {
        return phone;
    }

    /**
     * @param phone the phone to set
     */
    public void setPhone(String phone) {
        this.phone = phone;
    }

    @Override
    public String toString() {
        return firstName+" "+lastName;
    }

    /**
     * @return the email
     */
    public String getEmail() {
        return email;
    }

    /**
     * @param email the email to set
     */
    public void setEmail(String email) {
        this.email = email;
    }
   
    
}
