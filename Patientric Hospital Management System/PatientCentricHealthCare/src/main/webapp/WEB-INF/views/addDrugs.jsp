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

</head>
<body>
<div id="wrapper">
	<!-- start header -->
	<header>
	<div id="header">
		<div class="row"></div>
		<div class="row"></div>
	   				<div class="col-lg-4">
	   				</div>
	   				<div class="col-lg-4" style="color:#fff; font-family: Zapf Chancery, cursive; font-style: italic; font-weight: 800; font-size: 30px;">
	   				People's Welfare
	   				</div>
	   				<div class="col-lg-4">
	   				</div>
	   				</div>
	 <div class="container">
                </div>
                
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="pharmHome">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="viewDrugs"><span class="glyphicon glyphicon-user"></span> View/Manage Drugs</a></li>
        <li><a href="addDrugs"><span class="glyphicon glyphicon-user"></span> Add Drugs</a></li>
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
	<h3>Pharmacist: Add Drugs</h3>
<form:form action="/hospitalapp/insertDrugs" commandName="drug" method="POST">
	<h4>Drug Details</h4>
	<div class="row">
    <div class="form-group">
            <label class="col-md-2">
                <spring:message text="Drug Name"/>
            </label>
            <div class="col-md-10">
            <form:input path="drugName" class="form-control" required="true" placeholder = "Enter Drug Name"/>
            <form:errors path="drugName"></form:errors>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
            <label class="col-md-2">
                <spring:message text="Dosage"/>
            </label>
            <div class="col-md-10">
            <form:input path="dosage" class="form-control" required="true" placeholder="Enter Dosage"/>
            <form:errors path="dosage"></form:errors>
            </div>
    </div>
    </div>
   <div class="row">
    <div class="form-group">
            <label class="col-md-2">
                <spring:message text="Composition"/>
            </label>
            <div class="col-md-10">
            <form:input path="composition" class="form-control" required="true" placeholder="Enter Composition"/>
            <form:errors path="composition"></form:errors>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
            <label class="col-md-2">
                <spring:message text="Expiry Date"/>
            </label>
            <div class="col-md-10">
            <form:input path="expDate" class="form-control" required="true" placeholder="Enter Expiry Date"/>
            <form:errors path="expDate"></form:errors>
            </div>
    </div>
    </div>
        <h4>Medication Guide</h4>
    
    <div class="row">
    <div class="form-group">
            <label class="col-md-2">
                <spring:message text="Do's"/>
            </label>
            <div class="col-md-10">
            <form:input path="medicationGuide.dos" class="form-control" required="true" placeholder="Do's"/>
            <form:errors path="medicationGuide.dos"></form:errors>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
            <label class="col-md-2">
                <spring:message text="Dont's"/>
            </label>
            <div class="col-md-10">
            <form:input path="medicationGuide.donts" class="form-control" required="true" placeholder="Don'ts"/>
            <form:errors path="medicationGuide.donts"></form:errors>
            </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
            <label class="col-md-2">
                <spring:message text="Side Effects"/>
            </label>
            <div class="col-md-10">
            <form:input path="medicationGuide.sideEffects" class="form-control" required="true" placeholder="Side Effects"/>
            <form:errors path="medicationGuide.sideEffects"></form:errors>
            </div>
    </div>
    </div>
            <h4>Communication Plan</h4>
        <div class="row">
    <div class="form-group">
            <label class="col-md-2">
                <spring:message text="Communication Plan"/>
            </label>
            <div class="col-md-10">
            <form:input path="communicationPlan.communicationPlan" class="form-control" required="true" placeholder="Communication Plan"/>
            <form:errors path="communicationPlan.communicationPlan"></form:errors>
            </div>
    </div>
    </div>

    <input type="submit" value="<spring:message text="Add Drugs"/>" /> 
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