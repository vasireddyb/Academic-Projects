$(document).ready(function() {
	// validate signup form on keyup and submit
	var validator = $("#reg").validate({
		rules: {
			name: "required",			
		
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
		success: function(label) {
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("checked");
		}
		// specifying a submitHandler prevents the default submit, good for the demo
		
		// set this class to error-labels to indicate valid fields
		
	});
	
	// propose username by combining first- and lastname
	
});