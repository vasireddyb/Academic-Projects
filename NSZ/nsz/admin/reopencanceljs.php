<script type="text/javascript">

      $(document).ready(function() {
          jQuery(".green").show();
		  jQuery(".red").show();
      });



function reopenQuestion() {	
    var qno = "<?php echo $qno; ?>";
	 if(qno != null) {		
	 $.ajax(
            { type: "GET",
                url: "reopen-question.php",
                data: 
                { 
                        qno: qno                     
                },
                success: onreopenQuestionSuccess,
                error: function() 
                       {
                           alert("Error in reaching server.");
                           
                       }
            }
       );
	 }
}
function onreopenQuestionSuccess(data, status)	{
var response = $.parseJSON(data);
if(response.status == 'success')
{ 	
	//alert("success");
    //window.location.reload(true);
	//var welcomestr = "<a class=\"bluebutton\" style=\"padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;\" href=\"#info\" rel=\"facebox\">Message Admin</a><a onclick=\"cancelQuestion(); return false;\" style=\"padding-top: 4px; padding-bottom: 4px; color: rgb(255, 255, 255); margin-right: 10px;\" class=\"redbutton\">Cancel Question</a><br/><br/>";	
	//jQuery(".questionutils").html(welcomestr);
	jQuery(".infomessage").show();
	jQuery(".infomessage").html('The question has been reopened successfully');
	
}
else if( response.status == 'error') {
	var welcomestr = "Login Failed";
	jQuery(".error").html(welcomestr);
	//alert("failed"); 
	
	}
}




function cancelQuestion() {	
var qno = "<?php echo $qno; ?>";
if(qno != null) {
		
	 $.ajax(
            { type: "GET",
                url: "cancel-question.php",
                data: 
                { 
                        qno: qno                     
                },
                success: oncancelQuestionSuccess,
                error: function() 
                       {
                           alert("Error in reaching server.");
                           
                       }
            }
       );


	 }


}


function oncancelQuestionSuccess(data, status)
	{
//window.location.reload(true);
var cancelresponse = $.parseJSON(data);
if(cancelresponse.status == 'success')
{ 	
	alert("success");
	//var welcomestr = "<a class=\"bluebutton\" style=\"padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;\" href=\"#info\" rel=\"facebox\">Message Admin</a><a class=\"greenbutton\" onclick=\"reopenQuestion(); return false;\" style=\"padding-top: 4px; padding-bottom: 4px; color: rgb(255, 255, 255); margin-right: 10px;\" class=\"redbutton\">Reopen Question</a><br/><br/>";	
	//jQuery(".questionutils").html(welcomestr);
	jQuery(".infomessage").show();
	jQuery(".infomessage").html('The question has been cancelled sucessfully');
}
else if( cancelresponse.status == 'error') {
	var welcomestr = "Login Failed";
	jQuery(".error").html(welcomestr);
	//alert("failed"); 
	
	}
}

</script>