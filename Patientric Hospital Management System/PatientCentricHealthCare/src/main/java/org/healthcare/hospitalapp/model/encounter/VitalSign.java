package org.healthcare.hospitalapp.model.encounter;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.validation.constraints.Max;
import javax.validation.constraints.Min;
import javax.validation.constraints.NotNull;

import java.util.Date;

import org.healthcare.hospitalapp.model.employee.PersistentObject;

@Entity
@Table(name="VITAL_SIGN")
public class VitalSign implements PersistentObject {

	@Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "VITAL_SIGN_ID", unique = true, nullable = false)
	private int vitalSignId;
	@NotNull(message="Body Temperature could not be left blank/ Invalid")
	@Min(value=92, message="Minimum Body Temperature reading is 92c")
	@Max(value=110, message="Maximum Body Temperature reading is 110c")
	@Column(name = "BODY_TEMPERATURE", nullable = false)
	private float bodyTemperature;
	@NotNull(message="BloodPressure could not be left blank/ Invalid")
	@Min(value=60, message="Minimum Blood Pressure reading is 60")
	@Max(value=210, message="Maximum Blood Pressure reading is 210")
	@Column(name = "BLOOD_PRESSURE", nullable = false)
    private float bloodPressure;
	@NotNull(message="Pulse could not be left blank/ Invalid")
	@Min(value=40, message="Minimum Pulse reading is 40")
	@Max(value=220, message="Maximum Pulse reading is 220")
	@Column(name = "PULSE", nullable = false)
    private int pulse;
	@Column(name = "RESPIRATORY_RATE", nullable = false)
    private int repiratoryRate;
	@Temporal(TemporalType.DATE)
	@Column(name = "DATE", nullable = false, length=10)
    private Date Date;
    
    public VitalSign(){}
    /**
     * @return the bodyTemperature
     */
    public float getBodyTemperature() {
        return bodyTemperature;
    }

    /**
     * @param bodyTemperature the bodyTemperature to set
     */
    public void setBodyTemperature(float bodyTemperature) {
        this.bodyTemperature = bodyTemperature;
    }

    /**
     * @return the bloodPressure
     */
    public float getBloodPressure() {
        return bloodPressure;
    }

    /**
     * @param bloodPressure the bloodPressure to set
     */
    public void setBloodPressure(float bloodPressure) {
        this.bloodPressure = bloodPressure;
    }

    /**
     * @return the pulse
     */
    public int getPulse() {
        return pulse;
    }

    /**
     * @param pulse the pulse to set
     */
    public void setPulse(int pulse) {
        this.pulse = pulse;
    }

    /**
     * @return the repiratoryRate
     */
    public int getRepiratoryRate() {
        return repiratoryRate;
    }

    /**
     * @param repiratoryRate the repiratoryRate to set
     */
    public void setRepiratoryRate(int repiratoryRate) {
        this.repiratoryRate = repiratoryRate;
    }

    /**
     * @return the Date
     */
    public Date getDate() {
        return Date;
    }

    public void setDate(Date Date) {
        this.Date = Date;
    }
    
}
