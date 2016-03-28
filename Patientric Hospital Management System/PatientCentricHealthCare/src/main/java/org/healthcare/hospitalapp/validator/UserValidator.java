package org.healthcare.hospitalapp.validator;

import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.springframework.stereotype.Component;
import org.springframework.validation.Errors;
import org.springframework.validation.ValidationUtils;
import org.springframework.validation.Validator;

@Component
public class UserValidator implements Validator {

	@Override
	public boolean supports(Class<?> clazz) {
		// TODO Auto-generated method stub
		return UserAccount.class.equals(clazz);
	}

	@Override
	public void validate(Object target, Errors errors) {
		// TODO Auto-generated method stub
		UserAccount user = (UserAccount)target;
		if(user.getStatus().equals("false")){
            errors.rejectValue("status", "disabled", new Object[]{"'status'"}, "User Account is disabled");
        }
		ValidationUtils.rejectIfEmptyOrWhitespace(errors, "username", "validate.username", "Please enter UserName");
		ValidationUtils.rejectIfEmptyOrWhitespace(errors, "password", "validate.password", "Please enter Password");
	}

}
