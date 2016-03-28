function getSubCategories(catid) { 

	if (catid !=0)
	{ 
		$.ajax(
            { type: "POST",
                url: "getsubcats.php",
                data: 
                { 
                        catid: catid
                    
                },
                success: onSuccess,
                error: function() 
                       {
                           alert("Error in reaching server.");
                           
                       }
            }
       );
	}	
	else
	{
		$("#subcategories").html('');	
	}
	


}

function onSuccess(data, status)
	{
//window.location.reload(true);
var response = $.parseJSON(data);
if(response.status == 'success')
{ 	

	var str = '<select name="subject" size="4" style="width:200px;">';	

	if(response.value.length != 0  && response.value != null)
		{


			for(var i=0;i<response.value.length;i++)
			{
				str += '<option value="'+response.value[i]+'">'+response.value[i]+'</option>';
			}
			str+='</select>';
			$("#subcategories").html(str);

			}
			else
			{
				$("#subcategories").html('');	
			}

		}
		else if( response.status == 'error')
	{
	
	}

}