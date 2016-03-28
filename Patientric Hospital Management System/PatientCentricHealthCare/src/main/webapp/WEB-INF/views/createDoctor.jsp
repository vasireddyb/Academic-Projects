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
	<!-- end header -->
	<section id="featured">
	<!-- start slider -->
	<div class="container">
		<div class="row">
			<div class=".col-lg-offset-2 col-lg-10">
	<h1 class="text-muted">Hello ${sessionScope.userAccount.username}:</h1>
	<h3>Create Doctor</h3>
	<hr/>
	
	<c:url var="addAction" value="/newDoctor" ></c:url>
 
<form:form action="${addAction}" commandName="combinedCommand" method="POST">

	<div class="row">
    <div class="form-group">
            <form:label path="userAccount.employee.firstName" class="col-md-2">
                <spring:message text="First Name"/>
            </form:label>
            <div class="col-md-10">
            <form:input path="userAccount.employee.firstName" class="form-control" required="true" placeholder="First Name"/>
            <form:errors path="userAccount.employee.firstName"></form:errors>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
            <form:label path="userAccount.employee.lastName" class="col-md-2">
                <spring:message text="Last Name"/>
            </form:label>
            <div class="col-md-10">
            <form:input path="userAccount.employee.lastName" class="form-control" required="true" placeholder="Last Name"/>
            <form:errors path="userAccount.employee.lastName"></form:errors>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
            <form:label path="doctor.eMail" class="col-md-2">
                <spring:message text="Email ID"/>
            </form:label>
            <div class="col-md-10">
            <form:input path="doctor.eMail" class="form-control" required="true" placeholder="Email address"/>
            <form:errors path="doctor.eMail"></form:errors>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
            <form:label path="doctor.phoneNumber" class="col-md-2">
                <spring:message text="Phone Number"/>
            </form:label>
            <div class="col-md-10">
            <form:input path="doctor.phoneNumber" class="form-control" required="true" placeholder="Phone Number"/>
            <form:errors path="doctor.phoneNumber"></form:errors>
            </div>
    </div>
    </div>

	 <div class="row">
   	<div class="form-group">
            <form:label path="doctor.specialization" class="col-md-2">
                <spring:message text="Specialization"/>
            </form:label>
            <div class="col-md-10">
            <form:select path="doctor.specialization">
			    <form:option value="ALLERGIST">Allergist</form:option>
			    <form:option value="CARDIO" >Cardiologist</form:option>
			    <form:option value="DENTIST" >Dentist</form:option>
				<form:option value="EMERGENCY" >Emergency Doctors</form:option>
				<form:option value="GENPHYSICIAN" >General Physician</form:option>
				<form:option value="NEURO" >Neurologist</form:option>
				<form:option value="OPTHO" >Ophthalmologist</form:option>
				<form:option value="ORTHO" >Orthopedist</form:option>
			</form:select>
            </div>
  	</div>
    </div>
    
    <div class="row">
    <div class="form-group">
            <form:label path="userAccount.username" class="col-md-2">
                <spring:message text="User Name"/>
            </form:label>
            <div class="col-md-10">
            <form:input path="userAccount.username" class="form-control" required="true" placeholder="User Name"/>
            <form:errors path="userAccount.username"></form:errors>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
            <form:label path="userAccount.password" class="col-md-2">
                <spring:message text="Password"/>
            </form:label>
            <div class="col-md-10">
            <form:input path="userAccount.password" class="form-control" required="true" placeholder="password"/>
            <form:errors path="userAccount.password"></form:errors>
            </div>
    </div>
    </div>
                <input type="submit"
                    value="<spring:message text="Add Doctor"/>" /> 
</form:form>
</div>
</div>

</div>
</div>

</section>

	<footer>
	<div class="container">
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
	</div>
	<div id="sub-footer">
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
</body>
</html>