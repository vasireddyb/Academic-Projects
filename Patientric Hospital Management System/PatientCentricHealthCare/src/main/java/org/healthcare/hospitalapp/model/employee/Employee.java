package org.healthcare.hospitalapp.model.employee;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Inheritance;
import javax.persistence.InheritanceType;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.validation.constraints.Size;

import org.hibernate.validator.constraints.NotEmpty;

@Entity
@NamedQueries({
    @NamedQuery(name = "getAllEmployees",query = "from Employee"),
})
@Inheritance(strategy=InheritanceType.JOINED)
public class Employee implements PersistentObject {

		@Id
	    @GeneratedValue(strategy = GenerationType.IDENTITY)
		@Column(name = "EMPLOYEE_ID", unique = true, nullable = false)
	    private int employeeId;
		
		@NotEmpty(message="First Name could not be left blank/ Invalid Characters")
		@Size(min=2, max=15, message="Your First Name should be between 2 - 15 characters.")
		@Column(name = "FIRST_NAME", nullable = false)
	    private String firstName;
		
		@NotEmpty(message="Last Name could not be left blank/ Invalid Characters")
		@Size(min=2, max=15, message="Your Last Name should be between 2 - 15 characters.")		
		@Column(name = "LAST_NAME", nullable = false)
	    private String lastName;

	    public Employee() {
	    }

	    
	    public String getLastName() {
	        return lastName;
	    }

	    public void setLastName(String lastName) {
	        this.lastName = lastName;
	    }

	    public int getEmployeeId() {
	        return employeeId;
	    }

	    public void setFirstName(String firstName) {
	        this.firstName = firstName;
	    }

	    
	    public String getFirstName() {
	        return firstName;
	    }

	    @Override
	    public String toString() {
	        return firstName+" "+lastName;
	    }
}
