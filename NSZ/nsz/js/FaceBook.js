window.fbAsyncInit = function()
{
	FB.init({ appId: '174257169299225', status: true, cookie: true, xfbml: true });
    FB.Event.subscribe('auth.login', function(response) 
        {
            login();
			
        }
    );
    
    FB.Event.subscribe('auth.logout', function(response)
        {
            logout();
        }
    );

    FB.getLoginStatus(function(response)
    {
        if (response.session)
        { 
            login();
			//
        }
    });
};
(function() {
    var e = document.createElement('script');
    e.type = 'text/javascript';
    e.src = document.location.protocol +
                    '//connect.facebook.net/en_US/all.js';
    e.async = true;
    document.getElementById('fb-root').appendChild(e);
} ());

function login() 
{
   
    FB.api('/me', function(response) 
    {
                document.getElementById('loginutils').style.display = "none";
				//window.location('admin/index.php');
				//window.location = 'admin/index.php';
        //        document.getElementById('login').innerHTML = response.name + " succsessfully logged in!";
    });
    fqlQuery();

    
}
function logout() 
{
  location.href = 'logout.php';
}


//stream publish method
function streamPublish(name, description, hrefTitle, hrefLink, userPrompt) {
    FB.ui(
                {
                    method: 'stream.publish',
                    message: '',
                    attachment: {
                        name: name,
                        caption: '',
                        description: (description),
                        href: hrefLink
                    },
                    action_links: [
                        { text: hrefTitle, href: hrefLink }
                    ],
                    user_prompt_message: userPrompt
                },
                function(response) {

                });

}
function showStream() 
{
    FB.api('/me', function(response) 
    {
        //console.log(response.id);
        streamPublish(response.name, 'Thinkdiff.net contains geeky stuff', 'hrefTitle', 'http://thinkdiff.net', "Share thinkdiff.net");
    });
}

function share()
{
    var share = {
                    method: 'stream.share',
                    u: 'http://thinkdiff.net/'
                };
    FB.ui(share, function(response) { console.log(response); });
}

function graphStreamPublish()
{
    var body = 'Reading New Graph api & Javascript Base FBConnect Tutorial from Thinkdiff.net';
    FB.api('/me/feed', 'post', { message: body }, function(response) {
        if (!response || response.error) {
            alert('Error occured');
        } else {
            alert('Post ID: ' + response.id);
        }
    });
}

function fqlQuery()
{
    FB.api('/me', function(response)
    {
        var query = FB.Data.query('select name, hometown_location, sex, pic_square, email,first_name,last_name,birthday from user where uid={0}', response.id);
        query.wait(function(rows) 
        {
            //document.getElementById('name').innerHTML ='Your name: ' + rows[0].email + "<br />" +'<img src="' + rows[0].pic_square + '" alt="" />' + "<br />";
			$.ajax(
            { type: "POST",
                url: "facebookloginservice.php",
                data: 
                { 
                        username: rows[0].email                   
                },
                success: onLoginSuccess,
                error: function() 
                       {
                           alert("Error in reaching server.");
                           
                       }
            }
       );
          
   
        });
    });
}


function onLoginSuccess(data, status)
	{

var response = $.parseJSON(data);
if(response.status == 'success')
{ 	
	//location.href  = 'admin/index.php';
}
else if( response.status == 'error') {
	var welcomestr = "Login Failed";
	jQuery(".error").html(welcomestr);
}
}




function setStatus()
{
    status1 = document.getElementById('status').value;
    FB.api({
        method: 'status.set',
        status: status1
            },
          function(response)
          {
              if (response == 0) {
                  alert('Your facebook status not updated. Give Status Update Permission.');
              }
              else {
                  alert('Your facebook status updated');
              }
          }
    );
}