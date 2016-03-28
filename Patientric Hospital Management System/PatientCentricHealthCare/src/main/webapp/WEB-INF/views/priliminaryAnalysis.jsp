<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    <%@ taglib uri="http://www.springframework.org/tags" prefix="spring" %>
<%@ taglib uri="http://www.springframework.org/tags/form" prefix="form" %>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>

<!DOCTYPE>
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
        <li class="active"><a href="assistantDoctorLogin">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="viewPatientsRequests"><span class="glyphicon glyphicon-user"></span> Back</a></li>
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
	<h3>Assistant Doctor: Analyze Patients</h3>
<form:form action="/hospitalapp/analysis" commandName="combinedAnalysis"  method="POST">
	<h4>Preliminary Analysis</h4>
	<div class="row">
    <div class="form-group">
            <label class="col-md-2">
                <spring:message text="Occurence"/>
            </label>
            <div class="col-md-10">
            <form:input path="assessment.occurence" class="form-control" required="true" placeholder = "Enter Occurence"/>
            <form:errors path="assessment.occurence"></form:errors>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
            <label class="col-md-2">
                <spring:message text="Symptoms"/>
            </label>
            <div class="col-md-10">
            <form:input path="assessment.symptoms" class="form-control" required="true" placeholder="Enter Symptoms"/>
            <form:errors path="assessment.symptoms"></form:errors>
            </div>
    </div>
    </div>
   <div class="row">
    <div class="form-group">
            <label class="col-md-2">
                <spring:message text="Pregnancy"/>
            </label>
            <div class="col-md-10">
            <form:input path="assessment.pregnancy" class="form-control" required="true" placeholder="Enter Pregnancy"/>
            <form:errors path="assessment.pregnancy"></form:errors>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
            <label class="col-md-2">
                <spring:message text="Std Details"/>
            </label>
            <div class="col-md-10">
            <form:input path="assessment.std" class="form-control" required="true" placeholder="Any Sexually Transmitting diseases?"/>
            <form:errors path="assessment.std"></form:errors>
            </div>
    </div>
    </div>
    
    <div class="row">
    <div class="form-group">
            <label class="col-md-2">
                <spring:message text="Assistant Doctor Notes"/>
            </label>
            <div class="col-md-10">
            <form:input path="assessment.assNotes" class="form-control" required="true" placeholder="Assistant Doctor Notes"/>
            <form:errors path="assessment.assNotes"></form:errors>
            </div>
    </div>
    </div>
    <h4>Vital Sign Details</h4>
    <div class="row">
    <div class="form-group">
            <label class="col-md-2">
                <spring:message text="Body Temperature"/>
            </label>
            <div class="col-md-10">
            <form:input path="vitalSign.bodyTemperature" class="form-control" required="true" placeholder="Body Temperature"/>
            <form:errors path="vitalSign.bodyTemperature"></form:errors>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
            <label class="col-md-2">
                <spring:message text="Blood Pressure"/>
            </label>
            <div class="col-md-10">
            <form:input path="vitalSign.bloodPressure" class="form-control" required="true" placeholder="Blood Pressure"/>
            <form:errors path="vitalSign.bloodPressure"></form:errors>
            </div>
    </div>
    </div>
        <div class="row">
    <div class="form-group">
            <label class="col-md-2">
                <spring:message text="Respiratory Rate"/>
            </label>
            <div class="col-md-10">
            <form:input path="vitalSign.repiratoryRate" class="form-control" required="true" placeholder="Respiratory Rate"/>
            <form:errors path="vitalSign.repiratoryRate"></form:errors>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
            <label class="col-md-2">
                <spring:message text="Pulse"/>
            </label>
            <div class="col-md-10">
            <form:input path="vitalSign.pulse" class="form-control" required="true" placeholder="Pulse"/>
            <form:errors path="vitalSign.pulse"></form:errors>
            </div>
    </div>
    </div>
    <input type="hidden" name="encId" value="${encId}">
    <input type="hidden" name="workId" value="${workId}">
                        <input type="submit" value="<spring:message text="Analyse and Send to Doctor"/>" /> 
</form:form>
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