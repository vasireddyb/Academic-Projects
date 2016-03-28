$(document).ready(function() {	
	// validate signup form on keyup and submit
	var validator = $("#reg").validate({
errorPlacement: function(error, placement) {
		$(placement).qtip({
			content: error.text(),
			show: { when: { event: 'none'}, ready: true },
			hide: { when: { event: 'keydown' } },
			position: {
		      corner: {
				 target: 'rightTop',
		         tooltip: 'leftTop'
		      }
		   },
		   style: {
			  border: {
				 width: 0				 
			  },
			  tip: true,
		      name: 'blue'
		   }
		});
	},



		rules: {
			name: "required",			
			username: {
				required: true,
				minlength: 2,
				maxlength: 15,
				remote: {
                  url: "includes/checkusers.php",
                    type: "post"} 
			},
			password1: {
				required: true,
				minlength: 5
			},
			password_confirm1: {
				required: true,
				minlength: 5,
				equalTo: "#password1"
			},			
			email: {
				required: true,
				email: true,
				maxlength: 50,
				remote: {
                  url: "includes/checkemails.php",
                    type: "post"} 
				
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
					number: true,
					required: true,
					maxlength: 6,
					minlength: 5
			},
			dob: {
					required: true
			},
			
			acceptance: {
					required: true
			}	

		},


		messages: {
			name: "Enter a Name",			
			username: {
				required: "Enter a username",
				minlength: jQuery.format("Enter at least {0} characters"),
				remote: jQuery.format("Username already exists")
			},
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
			},
			acceptance: {
			    required: "You need to accept the terms and conditions to be able register yourself"
			}


		},
		// the errorPlacement has to take the table layout into account
		
		// specifying a submitHandler prevents the default submit, good for the demo
		
		// set this class to error-labels to indicate valid fields
		
	});
	
	// propose username by combining first- and lastname
	$("#username").focus(function() {
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		if(firstname && lastname && !this.value) {
			this.value = firstname + "." + lastname;
		}
	});

});