<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    <%@ taglib uri="http://www.springframework.org/tags" prefix="spring" %>
<%@ taglib uri="http://www.springframework.org/tags/form" prefix="form" %>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<title>People's Welfare Hospital</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://bootstraptaste.com" />

<link href="<c:url value="/resources/bootstrap.min.css"/>" rel="stylesheet" />
<link href="<c:url value="/resources/flexslider.css"/>" rel="stylesheet" />
<link href="<c:url value="/resources/style.css"/>" rel="stylesheet" />
<link href="<c:url value="/resources/default.css"/>" rel="stylesheet" />


<!-- Theme skin -->
<link href="skins/default.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">
	<!-- start header -->
	<header>
			<div id="header">
		<div class="row"></div>
		<div class="row">
	   				<div class="col-lg-4">
	   				</div>
	   				<div class="col-lg-4" style="color:#fff; font-family: Zapf Chancery, cursive; font-style: italic; font-weight: 800; font-size: 30px;">
	   				People's Welfare
	   				</div>
	   				<div class="col-lg-4">
	   				</div>
	   				</div>
	   				</div>
	 <div class="container">
                
                </div>
                
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="adminLogin">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="createEmployee"><span class="glyphicon glyphicon-user"></span> Create Employee</a></li>
        <li><a href="createDoctor"><span class="glyphicon glyphicon-log-in"></span> Create Doctor</a></li>
      	<li><a href="viewEmployee"><span class="glyphicon glyphicon-log-in"></span> View Employee</a></li>
      	      	<li><a href="logout"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
      	
      </ul>
    </div>
  </div>
</nav>

	</header>
	<section id="featured">
	<!-- start slider -->
	<div class="container">
		<div class="row">
			<div class=".col-lg-offset-2 col-lg-10">
	<h1 class="text-muted">Hello ${sessionScope.userAccount.username}: </h1>
	<h3>Admin Dashboard</h3>
	<hr/>

<img src="<c:url value="/resources/img/admin.jpg"/>" class="img-responsive" alt="Cinque Terre" width="904" height="336"> 
 
<h1>Instructions</h1>
 
 <pre>
 Customer Support is available 7x24x365 via email, phone, and Web access.
Depending on the Support option chosen by a particular client (Standard, Plus, or Premium), the
times that certain services are delivered may be restricted. Severity 1 (Critical) issues are
addressed on a 7x24 basis and receive continuous attention until resolved, for all clients on active
maintenance. Retek customers on active maintenance agreements may contact a global Customer
Support representative in accordance with contract terms in one of the following ways.
Contact Method Contact Information
E-mail support@retek.com
Internet (ROCS) rocs.retek.com
 Retek’s secure client Web site to update and view issues
Phone +1 612 587 5800
Toll free alternatives are also available in various regions of the world:
Australia +1 800 555 923 (AU-Telstra) or +1 800 000 562 (AU-Optus)
France 0800 90 91 66
Hong Kong 800 96 4262
Korea 00 308 13 1342
United Kingdom 0800 917 2863
United States +1 800 61 RETEK or 800 617 3835
Mail Retek Customer Support
 Retek on the Mall
 950 Nicollet Mall
 Minneapolis, MN 55403
When contacting Customer Support, please provide:
• Product version and program/module name.
• Functional and technical description of the problem (include business impact).
• Detailed step-by-step instructions to recreate.
• Exact error message received.
• Screen shots of each step you take. 
 </pre>
 
    </div>
</div>

</div>
		</div>
	</section>

	<footer>
		<div class="row">
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Get in touch with us</h5>
					<address>
					<strong>Moderna company Inc</strong><br>
					 Modernbuilding suite V124, AB 01<br>
					 Someplace 16425 Earth </address>
					<p>
						<i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891 <br>
						<i class="icon-envelope-alt"></i> email@domainname.com
					</p>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Pages</h5>
					<ul class="link-list">
						<li><a href="#">Press release</a></li>
						<li><a href="#">Terms and conditions</a></li>
						<li><a href="#">Privacy policy</a></li>
						<li><a href="#">Career center</a></li>
						<li><a href="#">Contact us</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Latest posts</h5>
					<ul class="link-list">
						<li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
						<li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
						<li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Flickr photostream</h5>
					<div class="flickr_badge">
						<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=8&amp;display=random&amp;size=s&amp;layout=x&amp;source=user&amp;user=34178660@N03"></script>
					</div>
					<div class="clear">
					</div>
				</div>
			</div>
		</div>
	</footer>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
</body>
</html>