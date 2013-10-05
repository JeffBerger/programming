<?php

$HTML=<<<HTML

<!DOCTYPE html>
<html lang="en">
  <head>
  	
	<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet"/>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
	
	<title>Introduction to programming topics</title>

    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">

  </head>

  <body>
     <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Programming</a>
        </div>
        <div class="navbar-collapse">
          <ul class="nav navbar-nav">
          	<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">General<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="aws1.php">Setting up AWS</a></li>
                <li><a href="apache1.php">Turning your AWS into a website with Apache</a></li>
                <li><a href="linux1.php">Linux commands and VIM</a></li>
                <li><a href="git.php">GIT and GITHUB</a></li>
                 <li><a href="emacs1.php">Emacs tutorial</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Frontend<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="html1.php">HTML/CSS/Bootstrap intro</a></li>
                <li><a href="js1.php">Javascript 1 : Intro to Programming</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Backend<b class="caret"></b></a>
              <ul class="dropdown-menu">
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="mysql.php">Setting up and using MySQL</a></li>
                <li><a href="mongo1.php">Setting up MongoDB (Mongo 1)</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

HTML;

echo $HTML;
