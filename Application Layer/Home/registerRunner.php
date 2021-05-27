<?php
if(isset($_POST["signup"])){
    require_once '..\..\Business Services Layer\userController\RegisRunner.php';
    $controller = new RegisRunner();
    $runnerData = $controller->signup(); 
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Runner Registration</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
     <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
    </head>
    <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
    <div class="mdl-layout__header-row">
    <span class="mdl-layout-title">SIGN UP</span>
    <div class="mdl-layout-spacer"></div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            
    </label>
    <div class="mdl-textfield__expandable-holder">
    <input class="mdl-textfield__input" type="text" id="search">
    <label class="mdl-textfield__label" for="search">Enter your query...</label>
    </div>
    </div>
         
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
      <header class="demo-drawer-header">
      <img src="../serviceProviderView/photo/logo.png" class="demo-avatar">
      </header>
      
      <nav>

           </div>
           <main class="mdl-layout__content mdl-color--grey-100">
           <div class="mdl-grid demo-content">
           <!-- for the base to display the content -->
           <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
           <svg fill="currentColor" viewBox="0 0 1400 150" class="demo-graph">
           <use xlink:href="#chart" />
           </svg>

      <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- coding style or format for the register form-->
    <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-color: black;
    }

    * {
      box-sizing: border-box;
    }

    /* Add padding to containers */
    .container {
      padding: 16px;
      background-color: white;
    }

    /* Full-width input fields */
    input[type=text], input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
      border: 1px solid #f1f1f1;
      margin-bottom: 25px;
    }

    /* Set a style for the submit button */
    .registerbtn {
      background-color: #4CAF50;
      color: white;
      padding: 16px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }

    .registerbtn:hover {
      opacity: 1;
    }

    /* Add a blue text color to links */
    a {
      color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
      background-color: #f1f1f1;
      text-align: center;
    }

    div.b{
      text-align: right;
    }
    </style>  
    </head>
    <body>
<!-- coding for register form that user need to fill in -->
<form action="" method="POST">
  <div class="container">
    <h1>RUNNER REGISTRATION</h1>
    <p>Please fill in this form to create an account.</p>
    <P>* Required fields</P>
    <hr>
    <p>Account Information</p>

    <label for="username"><b>Username* :</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="email"><b>Email* :</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password :</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="phone"><b>Phone* :</b></label>
    <input type="text" placeholder="Enter Phone" name="phone" required> 
    <div class="form-group has-feedback">
    <br>
              <p><h6>Registration For Service Provider</h6>
                <h3><a href="registerServiceP.php">&#8592;</a></h3> 
                  <div class="b">
                  <h6>Registration For Customer</h6>
                  <h3><a href="registerCustomer.php">&#8594;</a></h3>
                  </div>
              </p>
            </div>
          </br>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" name = "signup" class="registerbtn">SIGN UP</button>
  </div>
  
  <div class="container signin">
  <p>Already have an account? <a href="User_Login.php">LOGIN</a>.</p>
  </div>
</form>

<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html>
