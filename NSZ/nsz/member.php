<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php require('register.php'); ?>
<?php
if(isset($_POST['tz'])) {
	// store the selected value for future use in DateTimeZone
	//$_SESSION['tz'] = $_POST['tz'];
}
// create an array listing the time zones
$zonelist = array('Kwajalein' => '(GMT-12:00) International Date Line West',
		'Pacific/Midway' => '(GMT-11:00) Midway Island',
		'Pacific/Samoa' => '(GMT-11:00) Samoa',
		'Pacific/Honolulu' => '(GMT-10:00) Hawaii',
		'America/Anchorage' => '(GMT-09:00) Alaska',
		'America/Los_Angeles' => '(GMT-08:00) Pacific Time (US &amp; Canada)',
		'America/Tijuana' => '(GMT-08:00) Tijuana, Baja California',
		'America/Denver' => '(GMT-07:00) Mountain Time (US &amp; Canada)',
		'America/Chihuahua' => '(GMT-07:00) Chihuahua',
		'America/Mazatlan' => '(GMT-07:00) Mazatlan',
		'America/Phoenix' => '(GMT-07:00) Arizona',
		'America/Regina' => '(GMT-06:00) Saskatchewan',
		'America/Tegucigalpa' => '(GMT-06:00) Central America',
		'America/Chicago' => '(GMT-06:00) Central Time (US &amp; Canada)',
		'America/Mexico_City' => '(GMT-06:00) Mexico City',
		'America/Monterrey' => '(GMT-06:00) Monterrey',
		'America/New_York' => '(GMT-05:00) Eastern Time (US &amp; Canada)',
		'America/Bogota' => '(GMT-05:00) Bogota',
		'America/Lima' => '(GMT-05:00) Lima',
		'America/Rio_Branco' => '(GMT-05:00) Rio Branco',
		'America/Indiana/Indianapolis' => '(GMT-05:00) Indiana (East)',
		'America/Caracas' => '(GMT-04:30) Caracas',
		'America/Halifax' => '(GMT-04:00) Atlantic Time (Canada)',
		'America/Manaus' => '(GMT-04:00) Manaus',
		'America/Santiago' => '(GMT-04:00) Santiago',
		'America/La_Paz' => '(GMT-04:00) La Paz',
		'America/St_Johns' => '(GMT-03:30) Newfoundland',
		'America/Argentina/Buenos_Aires' => '(GMT-03:00) Georgetown',
		'America/Sao_Paulo' => '(GMT-03:00) Brasilia',
		'America/Godthab' => '(GMT-03:00) Greenland',
		'America/Montevideo' => '(GMT-03:00) Montevideo',
		'Atlantic/South_Georgia' => '(GMT-02:00) Mid-Atlantic',
		'Atlantic/Azores' => '(GMT-01:00) Azores',
		'Atlantic/Cape_Verde' => '(GMT-01:00) Cape Verde Is.',
		'Europe/Dublin' => '(GMT) Dublin',
		'Europe/Lisbon' => '(GMT) Lisbon',
		'Europe/London' => '(GMT) London',
		'Africa/Monrovia' => '(GMT) Monrovia',
		'Atlantic/Reykjavik' => '(GMT) Reykjavik',
		'Africa/Casablanca' => '(GMT) Casablanca',
		'Europe/Belgrade' => '(GMT+01:00) Belgrade',
		'Europe/Bratislava' => '(GMT+01:00) Bratislava',
		'Europe/Budapest' => '(GMT+01:00) Budapest',
		'Europe/Ljubljana' => '(GMT+01:00) Ljubljana',
		'Europe/Prague' => '(GMT+01:00) Prague',
		'Europe/Sarajevo' => '(GMT+01:00) Sarajevo',
		'Europe/Skopje' => '(GMT+01:00) Skopje',
		'Europe/Warsaw' => '(GMT+01:00) Warsaw',
		'Europe/Zagreb' => '(GMT+01:00) Zagreb',
		'Europe/Brussels' => '(GMT+01:00) Brussels',
		'Europe/Copenhagen' => '(GMT+01:00) Copenhagen',
		'Europe/Madrid' => '(GMT+01:00) Madrid',
		'Europe/Paris' => '(GMT+01:00) Paris',
		'Africa/Algiers' => '(GMT+01:00) West Central Africa',
		'Europe/Amsterdam' => '(GMT+01:00) Amsterdam',
		'Europe/Berlin' => '(GMT+01:00) Berlin',
		'Europe/Rome' => '(GMT+01:00) Rome',
		'Europe/Stockholm' => '(GMT+01:00) Stockholm',
		'Europe/Vienna' => '(GMT+01:00) Vienna',
		'Europe/Minsk' => '(GMT+02:00) Minsk',
		'Africa/Cairo' => '(GMT+02:00) Cairo',
		'Europe/Helsinki' => '(GMT+02:00) Helsinki',
		'Europe/Riga' => '(GMT+02:00) Riga',
		'Europe/Sofia' => '(GMT+02:00) Sofia',
		'Europe/Tallinn' => '(GMT+02:00) Tallinn',
		'Europe/Vilnius' => '(GMT+02:00) Vilnius',
		'Europe/Athens' => '(GMT+02:00) Athens',
		'Europe/Bucharest' => '(GMT+02:00) Bucharest',
		'Europe/Istanbul' => '(GMT+02:00) Istanbul',
		'Asia/Jerusalem' => '(GMT+02:00) Jerusalem',
		'Asia/Amman' => '(GMT+02:00) Amman',
		'Asia/Beirut' => '(GMT+02:00) Beirut',
		'Africa/Windhoek' => '(GMT+02:00) Windhoek',
		'Africa/Harare' => '(GMT+02:00) Harare',
		'Asia/Kuwait' => '(GMT+03:00) Kuwait',
		'Asia/Riyadh' => '(GMT+03:00) Riyadh',
		'Asia/Baghdad' => '(GMT+03:00) Baghdad',
		'Africa/Nairobi' => '(GMT+03:00) Nairobi',
		'Asia/Tbilisi' => '(GMT+03:00) Tbilisi',
		'Europe/Moscow' => '(GMT+03:00) Moscow',
		'Europe/Volgograd' => '(GMT+03:00) Volgograd',
		'Asia/Tehran' => '(GMT+03:30) Tehran',
		'Asia/Muscat' => '(GMT+04:00) Muscat',
		'Asia/Baku' => '(GMT+04:00) Baku',
		'Asia/Yerevan' => '(GMT+04:00) Yerevan',
		'Asia/Yekaterinburg' => '(GMT+05:00) Ekaterinburg',
		'Asia/Karachi' => '(GMT+05:00) Karachi',
		'Asia/Tashkent' => '(GMT+05:00) Tashkent',
		'Asia/Kolkata' => '(GMT+05:30) Calcutta',
		'Asia/Colombo' => '(GMT+05:30) Sri Jayawardenepura',
		'Asia/Katmandu' => '(GMT+05:45) Kathmandu',
		'Asia/Dhaka' => '(GMT+06:00) Dhaka',
		'Asia/Almaty' => '(GMT+06:00) Almaty',
		'Asia/Novosibirsk' => '(GMT+06:00) Novosibirsk',
		'Asia/Rangoon' => '(GMT+06:30) Yangon (Rangoon)',
		'Asia/Krasnoyarsk' => '(GMT+07:00) Krasnoyarsk',
		'Asia/Bangkok' => '(GMT+07:00) Bangkok',
		'Asia/Jakarta' => '(GMT+07:00) Jakarta',
		'Asia/Brunei' => '(GMT+08:00) Beijing',
		'Asia/Chongqing' => '(GMT+08:00) Chongqing',
		'Asia/Hong_Kong' => '(GMT+08:00) Hong Kong',
		'Asia/Urumqi' => '(GMT+08:00) Urumqi',
		'Asia/Irkutsk' => '(GMT+08:00) Irkutsk',
		'Asia/Ulaanbaatar' => '(GMT+08:00) Ulaan Bataar',
		'Asia/Kuala_Lumpur' => '(GMT+08:00) Kuala Lumpur',
		'Asia/Singapore' => '(GMT+08:00) Singapore',
		'Asia/Taipei' => '(GMT+08:00) Taipei',
		'Australia/Perth' => '(GMT+08:00) Perth',
		'Asia/Seoul' => '(GMT+09:00) Seoul',
		'Asia/Tokyo' => '(GMT+09:00) Tokyo',
		'Asia/Yakutsk' => '(GMT+09:00) Yakutsk',
		'Australia/Darwin' => '(GMT+09:30) Darwin',
		'Australia/Adelaide' => '(GMT+09:30) Adelaide',
		'Australia/Canberra' => '(GMT+10:00) Canberra',
		'Australia/Melbourne' => '(GMT+10:00) Melbourne',
		'Australia/Sydney' => '(GMT+10:00) Sydney',
		'Australia/Brisbane' => '(GMT+10:00) Brisbane',
		'Australia/Hobart' => '(GMT+10:00) Hobart',
		'Asia/Vladivostok' => '(GMT+10:00) Vladivostok',
		'Pacific/Guam' => '(GMT+10:00) Guam',
		'Pacific/Port_Moresby' => '(GMT+10:00) Port Moresby',
		'Asia/Magadan' => '(GMT+11:00) Magadan',
		'Pacific/Fiji' => '(GMT+12:00) Fiji',
		'Asia/Kamchatka' => '(GMT+12:00) Kamchatka',
		'Pacific/Auckland' => '(GMT+12:00) Auckland',
		'Pacific/Tongatapu' => '(GMT+13:00) Nukualofa');
?>
<div id="content">
<noscript>Please Enable Javascript to register</noscript>
<style>
	.field { width:355px; }
	.label { width:140px; }

</style>
<form id="reg" action="register.php" method="POST">

<fieldset>
<legend> Registration </legend>

	<div class="field"><div class="label"><label>Name:</label></div><input id="name" class="required form" type="text" name="name" /></div>
	<div class="field"><div class="label"><label>Email ID:</label></div><input id="email" class="form required email" type="text" name="email" /></div>
	<div class="field"><div class="label"><label>Username:</label></div><input id="username" class="required form" type="text" name="username" /></div>	
	<div class="field"><div class="label"><label>Password:</label></div><input id="password1" class="required form" type="password" name="password" /></div>
	<div class="field"><div class="label"><label>Confirm Password:</label></div><input id="password_confirm1" class="required form" type="password" name="password_confirm" /></div>	
	<div class="field"><div class="label"><label>Mobile</label></div><input id="mobile" class="required form" type="text" name="mobile" /></div>

<div class="field"><div class="label"><label>TimeZone</label></div>
<select name="tz" style="width:210px;">
	<option value="Pacific/Honolulu">(GMT-10:00) Hawaii</option>
	<option value="America/Anchorage">(GMT-09:00) Alaska</option>
	<option value="America/Los_Angeles">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
	<option value="America/Phoenix">(GMT-07:00) Arizona</option>
	<option value="America/Denver">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
	<option value="America/Chicago">(GMT-06:00) Central Time (US &amp; Canada)</option>
	<option value="America/New_York">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
	<option value="America/Indiana/Indianapolis">(GMT-05:00) Indiana (East)</option>
	<option disabled="disabled">&#8212;&#8212;&#8212;&#8212;&#8212;&#8212;&#8211;</option>

<?php
foreach($zonelist as $key => $value) {
	echo '		<option value="' . $key . '">' . $value . '</option>
' . "\n";
}
?>
	</select>
</div>	

	<input type="hidden" name="usertype" value="2" />
</fieldset><br/>
<fieldset>
<legend>Terms and conditions:</legend>
<textarea id="terms" readonly="readonly"> a). Terms of Use 

NetSchoolZone is committed in delivering the highest quality solutions to you and we have taken considerable steps to engage the services of several highly qualified experts in achieving that objective. Please take a minute to go through the User Agreement to help us serve you better. By accessing and using the NetSchoolZone website, you agree to be bound by the terms and conditions listed under Terms of Use, including those listed under Posted Content and Usage Policy. Please use NetSchoolZone website only after you have read all the terms and conditions and have agreed to comply with them. NetSchoolZone reserves the right to terminate your access to the website if you do not comply with the terms and conditions. NetSchoolZone reserves the right, at its sole discretion, to change, modify, update, add, or remove portions of the Terms of Use at any time, with or without prior notice to you. Please check the terms and conditions listed under Terms of Use periodically for changes. Your continued use of website after the changes have been posted means that you are aware of the changes and have accepted those changes. NetSchoolZone reserves the right to decline to answer any question posted by the users. NetSchoolZone is not liable for not delivering the solutions or answers even after a promise has been made verbally or in writing. NetSchoolZone does not provide any warranties of any kind to users or any other parties to the accuracy, timeliness, and completeness, of solutions or answers that are delivered to users or third parties. Solutions or answers delivered by NetSchoolZone to the users are provided by sources that are deemed to be accurate and reliable. NetSchoolZone is not responsible or liable for any errors, inaccuracies, untimeliness, or incompleteness, in the solutions or answers provided to users or third parties. You remain solely responsible for the content of the materials you post on the website, and for the usage of content or information that is made available to you by NetSchoolZone without violating any law, rule, or regulation that is in effect at the place of your study or employment. NetSchoolZone cannot be held responsible for any third party claims, liability, damages, or costs that arise from your failure to comply with these terms and conditions. 

b). Posted Content 

You agree not to upload, post, transmit, or otherwise make available any content that is abusive, defamatory, discriminatory, offensive, harassing, harmful, hateful, threatening, or tortuous. The posted content should not bear any false, disguised, or misleading origin. The person who has uploaded, posted, transmitted, or otherwise made available any information on the website is solely responsible for the information thus made available on the website. NetSchoolZone reserves the right to, but has no obligation to, monitor or screen the content posted and/or displayed in the website and to remove any content in its sole discretion. By making content available on NetSchoolZone website, you automatically grant, and you represent and warrant that you have the right to grant, to NetSchoolZone an irrevocable, perpetual, non-exclusive fully-paid world-wide license to use, copy, publicly perform, publicly display and distribute such information and content and to prepare derivative works of, or incorporate into other works, such information and content, and to grant and authorize sub-licenses of the fore-going. 

c). Usage Policy 
You may not use NetSchoolZone website in any manner that could damage, disable, disrupt or impair the website or any of NetSchoolZone servers, or interfere with any other party’s use and enjoyment of the websites. You cannot modify, translate, adapt, or reverse engineer the website. You cannot create user accounts using any automated means. You cannot use the content and information provided by NetSchoolZone that is publicly posted on the website and is available to everyone, or that is delivered to you personally through the website, fax or email, in a manner that violates any law, rule, or regulation that is in effect at the place of your study or employment. 

d). Privacy & Cookies Policy 
NetSchoolZone collects personal information from you during registration, which enables NetSchoolZone to provide a full range of services. Also, our server creates cookies, which are downloaded to your computer. This Privacy & Cookies Policy covers NetSchoolZone’s use of your personal information, and provides information about cookies and how NetSchoolZone uses them. In order to use NetSchoolZone, you will be asked for your name and email address during registration. NetSchoolZone does not give or sell this information to any third parties. We use your email address to send information on regular site updates or offers that you can benefit from. Access to your name and email address is restricted to our employees and affiliates, who are bound by confidentiality obligations. Cookies are small text files that are transferred by NetSchoolZone server to the cookie file of your browser. Cookies maintain your session information and can also be used to organize the content based on the information stored in them. Our servers automatically record information that your browser sends us when you visit NetSchoolZone. This includes information that identifies your browser and computer. Information thus obtained can be used by NetSchoolZone to understand the audience who visit NetSchoolZone. This information can also be used with third-party advertisers for targeted advertising. We take utmost care that no personal information is stored in the cookie but if any personal information is stored in the cookie, it will not be shared with outside companies for any purpose without your permission. </textarea><br/>
<div class="radios"><input type="checkbox" value="I Accept" name="acceptance" id="accept"> I Accept</input></div>

<div class="radios"></div>
<div class="field" style="text-align:center;"><input type="submit" value="Register Now" class="button"/></div>

</form>
</div>
<?php include('footer.php'); ?>
	
	