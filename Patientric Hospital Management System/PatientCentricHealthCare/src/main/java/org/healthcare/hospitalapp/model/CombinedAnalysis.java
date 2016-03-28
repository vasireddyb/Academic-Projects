package org.healthcare.hospitalapp.model;

import javax.validation.Valid;

import org.healthcare.hospitalapp.model.encounter.Assessment;
import org.healthcare.hospitalapp.model.encounter.VitalSign;

public class CombinedAnalysis {

	@Valid
	private VitalSign vitalSign;
	@Valid
	private Assessment assessment;
	public CombinedAnalysis(){}
	public VitalSign getVitalSign() {
		return vitalSign;
	}
	public void setVitalSign(VitalSign vitalSign) {
		this.vitalSign = vitalSign;
	}
	public Assessment getAssessment() {
		return assessment;
	}
	public void setAssessment(Assessment assessment) {
		this.assessment = assessment;
	}
}
