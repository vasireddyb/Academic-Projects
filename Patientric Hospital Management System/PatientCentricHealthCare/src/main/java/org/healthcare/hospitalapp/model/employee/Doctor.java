package org.healthcare.hospitalapp.model.employee;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.PrimaryKeyJoinColumn;
import javax.validation.constraints.Size;

import org.hibernate.validator.constraints.Email;
import org.hibernate.validator.constraints.NotEmpty;

@Entity
@PrimaryKeyJoinColumn(name="EMPLOYEE_ID")
public class Doctor extends Employee implements PersistentObject {
    
   @Column(name = "SPECIALIZATION", nullable = false)
   private String specialization;
   @NotEmpty(message="Phone Number could not be left blank/ Invalid Characters")
   @Size(min=4, max=12, message="Your Phone Number should be between 4 - 12 characters.")
   @Column(name = "PHONE_NUMBER", nullable = false)
   private String phoneNumber;
   @NotEmpty(message="Email could not be left blank/ Invalid Characters")
   @Email(message="Please enter valid Email Id")
   @Column(name = "EMAIL", nullable = false)
   private String eMail;
    
   public Doctor(){}
   
   public enum Specialization{
       
       ALLERGIST("Allergist"),
       CARDIO("Cardiologist"),
       DENTIST("Dentist"),
       EMERGENCY("Emergency Doctors"),
       GENPHYSICIAN("General Physician"),
       NEURO("Neurologist"),
       OPTHO("Ophthalmologist"),
       ORTHO("Orthopedist"),
       PEDIA("Pediatrician"),
       ENT("ENT Specialist");
       private String value;
        
        private Specialization(String value){
            this.value = value;
        }
        
        public String getValue(){
        return value;
        }

        @Override
        public String toString() {
            return  value;
        }
   }
   
    public String getSpecialization() {
        return specialization;
    }

    public void setSpecialization(String specialization) {
        this.specialization = specialization;
    }

    /**
     * @return the phoneNumber
     */
    public String getPhoneNumber() {
        return phoneNumber;
    }

    /**
     * @param phoneNumber the phoneNumber to set
     */
    public void setPhoneNumber(String phoneNumber) {
        this.phoneNumber = phoneNumber;
    }

    /**
     * @return the eMail
     */
    public String geteMail() {
        return eMail;
    }

    /**
     * @param eMail the eMail to set
     */
    public void seteMail(String eMail) {
        this.eMail = eMail;
    }
    
}