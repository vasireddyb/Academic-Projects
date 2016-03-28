<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    <%@ taglib uri="http://www.springframework.org/tags" prefix="spring" %>
<%@ taglib uri="http://www.springframework.org/tags/form" prefix="form" %>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>

<!DOCTYPE">
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
        <li class="active"><a href="backLogin">Home</a></li>
      </ul>
            </div>
        </div>
	</header>
	<!-- end header -->
	<section id="featured">
	<!-- start slider -->
	<div class="container">
		<div class="row">
			<div class=".col-lg-offset-2 col-lg-10">
	<h1 class="text-muted">Patient Sign-up</h1>
	<hr/>
	
	<c:url var="addAction" value="/createpatient" ></c:url>
 
<form:form action="${addAction}" commandName="useraccount" method="POST">
	<div class="row">
    <div class="form-group">
            <form:label path="patient.firstName" class="col-md-2">
                <spring:message text="FirstName"/>
            </form:label>
            <div class="col-md-10">
            <form:input path="patient.firstName" class="form-control" required="true" placeholder="Enter First Name"/>
            <form:errors path="patient.firstName"></form:errors>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
            <form:label path="patient.lastName" class="col-md-2">
                <spring:message text="LastName"/>
            </form:label>
            <div class="col-md-10">
            <form:input path="patient.lastName" class="form-control" required="true" placeholder="Enter Last Name"/>
            <form:errors path="patient.lastName"></form:errors>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
            <form:label path="patient.email" class="col-md-2">
                <spring:message text="EmailID"/>
            </form:label>
            <div class="col-md-10">
            <form:input path="patient.email" class="form-control" required="true" placeholder="Enter email address"/>
            <form:errors path="patient.email"></form:errors>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
            <form:label path="patient.phone" class="col-md-2">
                <spring:message text="phoneNumber"/>
            </form:label>
            <div class="col-md-10">
            <form:input path="patient.phone" class="form-control" required="true" placeholder="Enter Phone Number"/>
            <form:errors path="patient.phone"></form:errors>
            </div>
    </div>
    </div>
    
        <div class="row">
    <div class="form-group">
            <form:label path="patient.fatherName" class="col-md-2">
                <spring:message text="fatherName"/>
            </form:label>
            <div class="col-md-10">
            <form:input path="patient.fatherName" class="form-control" required="true" placeholder="Enter Fathers Name"/>
            <form:errors path="patient.fatherName"></form:errors>
            </div>
    </div>
    </div>
            
        <div class="row">
    <div class="form-group">
            <form:label path="patient.gender" class="col-md-2">
                <spring:message text="sex"/>
            </form:label>
            <div class="col-md-4">
            <form:input path="patient.gender" class="form-control" required="true" placeholder="Enter Gender"/>
            <form:errors path="patient.gender"></form:errors>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
            <form:label path="patient.dateOfBirth" class="col-md-2">
                <spring:message text="dateOfBirth"/>
            </form:label>
            <div class="col-md-4">
            <form:input path="patient.dateOfBirth" class="form-control" required="true" placeholder="Enter Date of Birth"/>
            <form:errors path="patient.dateOfBirth"></form:errors>
            </div>
        </div></div>

        <div class="row">
    <div class="form-group">
            <form:label path="patient.ssn" class="col-md-2">
                <spring:message text="ssn"/>
            </form:label>
            <div class="col-md-10">
            <form:input path="patient.ssn" class="form-control" required="true" placeholder="Enter SSN"/>
            <form:errors path="patient.ssn"></form:errors>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
            <form:label path="patient.address" class="col-md-2">
                <spring:message text="address"/>
            </form:label>
            <div class="col-md-10">
            <form:input path="patient.address" class="form-control" required="true" placeholder="Enter Address"/>
            <form:errors path="patient.address"></form:errors>
            </div>
    </div>
    </div>
        <div class="row">
    <div class="form-group">
            <form:label path="patient.familyHistory" class="col-md-2">
                <spring:message text="familyHistory"/>
            </form:label>
            <div class="col-md-10">
            <form:input path="patient.familyHistory" class="form-control" required="true" placeholder="Enter Medical History"/>
            <form:errors path="patient.familyHistory"></form:errors>
            </div>
    </div>
    </div>
        <div class="row">
    <div class="form-group">
            <form:label path="username" class="col-md-2">
                <spring:message text="username"/>
            </form:label>
            <div class="col-md-10">
            <form:input path="username" class="form-control" required="true" placeholder="Enter User Name"/>
            <form:errors path="username"></form:errors>
            </div>
    </div>
    </div>

    <div class="row">
    <div class="form-group">
            <form:label path="password" class="col-md-2">
                <spring:message text="password"/>
            </form:label>
            <div class="col-md-10">
            <form:input path="password" class="form-control" required="true" placeholder="Enter Password"/>
            <form:errors path="password"></form:errors>
            </div>
    </div>
    </div>
    
<div class="row">
   <div class="form-group">
            <form:label path="patient.primaryDoctor" class="col-md-2">
                <spring:message text="Primary Doctor"/>
            </form:label>
            <div class="col-md-10">
            <form:select path="patient.primaryDoctor">
            <c:forEach items="${doctorList}" var="doc" varStatus="count">
			    <form:option value="${doc.username}">${doc.employee.firstName}</form:option>
			</c:forEach>
			</form:select>
            </div>
  	</div>
    </div>
                <input type="submit" value="<spring:message text="Add Patient"/>" /> 
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