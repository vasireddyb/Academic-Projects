function validateLogin() {
	var username = $("#username").val();
    var password = $("#password").val();

	 if(username != null && password != null) {
		
	 $.ajax(
            { type: "POST",
                url: "loginservice.php",
                data: 
                { 
                        username: username,
                        password: password                        
                },
                success: onLoginSuccess,
                error: function() 
                       {
                           alert("Error in reaching server.");
                           
                       }
            }
       );


	 }


}


function onLoginSuccess(data, status)
	{
//window.location.reload(true);
var response = $.parseJSON(data);
if(response.status == 'success')
{ 	
	window.location = 'admin/index.php';
}
else if( response.status == 'error') {
	var welcomestr = "Login Failed";
	jQuery(".error").html(welcomestr);
	//alert("failed"); 
	
	}
}


function changeExpertPrice() {
	var expertprice = $("#expertprice").val();
    var qno = $("#qno").val();

	 if(expertprice != null && qno != null) {
		
	 $.ajax(
            { type: "POST",
                url: "expert-price.php",
                data: 
                { 
                        expertprice: expertprice,
						qno: qno                     
                },
                success: onchangeExpertPriceSuccess,
                error: function() 
                       {
                           alert("Error in reaching server.");
                           
                       }
            }
       );


	 }


}


function onchangeExpertPriceSuccess(data, status)
	{
//window.location.reload(true);
var response = $.parseJSON(data);
var changedexpertprice = response.changedexpertprice;
if(response.status == 'success')
{ 	var welcomestr = "<div style=\"color:green;\">changed successfully</div>";
	jQuery(".changedexpertprice").html(changedexpertprice + welcomestr);
	jQuery(".message").html();
	
}
else if( response.status == 'error') {
	var welcomestr = "Login Failed";
	jQuery(".error").html(welcomestr);
	//alert("failed"); 
	
	}
}

