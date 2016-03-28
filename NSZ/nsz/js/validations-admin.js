$(document).ready(function() {
	// validate signup form on keyup and submit
	var validator = $("#reg").validate({
		rules: {
			name: "required",			
			password: {
				required: true,
				minlength: 5
			},
			password_confirm: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			
			email: {
				required: true,
				email: true
				
			},
			homephone: {
				required: true,
				number: true,
				maxlength: 12,
				minlength: 8
			},		
			mobile: {
					required: true,
						number: true, 
						maxlength: 10,
						minlength: 10
				},
			addr1: {
					required: true
			},
			city: {
					required: true
			},
			state: {
					required: true
			},
			country: {
					required: true
			},
			pincode: {
					required: true,
						number: true, 
						maxlength: 6,
						minlength: 5
			},
			dob: {
					required: true
			}	

		},


		messages: {
			name: "Enter a Name",			
		
			password: {
				required: "Provide a password",
				rangelength: jQuery.format("Enter at least {0} characters")
			},
			password_confirm: {
				required: "Repeat your password",
				minlength: jQuery.format("Enter at least {0} characters"),
				equalTo: "Enter the same password as above"
			},
			email: {
				required: "Please enter a valid email address",
				minlength: "Please enter a valid email address",
				remote: jQuery.format("Entered email is already in use")
			},
			homephone: {
				required: "Please enter a number"
			},
			
			mobile: {
				required: "Please enter a number"
			},
			addr1: {
			    required: "Please enter address"
			},
			city: {
			    required: "Please enter a city"
			},
			state: {
			    required: "Please enter a state"
			},
			country: {
			    required: "Please enter a country"
			},
			pincode: {
			    required: "Please enter pincode"
			},
			dob: {
			    required: "Please enter your date of birth"
			}
			


		},
		// the errorPlacement has to take the table layout into account
		
		// specifying a submitHandler prevents the default submit, good for the demo
		
		// set this class to error-labels to indicate valid fields
		
	});
	
	// propose username by combining first- and lastname
	

});


$(document).ready(function() {	
	// validate signup form on keyup and submit
	var validator = $("#postquestion").validate({
		rules: {			
			subject: {
					required: true				
				},
			title: {
					required: true
			},
			question: {
					required: true
			},
			price: {
			    required: true,
				number: true,
				range: [1, 99999]

			},
			datepicker: {
			    required: true
			}
		},


		messages: {
			
			subject: {
				required: "*"
			},
			
			title: {
				required: "*"
			},
			question: {
			    required: "*"
			},
			price: {
			    required: "*"
			},
			datepicker: {
			    required: "*"
			}
		}
	
	});
});



$(document).ready(function() {	
	// validate signup form on keyup and submit
	var validator = $("#postcomment").validate({
		rules: {			
			subject: {
					required: true				
				}
		},


		messages: {
			
			subject: {
				required: "Enter subject"
			}
		}
	
	});
});