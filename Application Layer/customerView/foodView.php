<?php
require_once '../../Business Services Layer/foodController/foodController.php';


$controller = new foodController();

$food = $controller->displayController();


?>
<br>
<br>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
      padding:20px 20px;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    
    /* Set black background color, white text and some padding */
   .sidenav {
      padding-top: 50px;
      background-color: #f1f1f1;
      height: 100%;
    }
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" img src="../serviceProviderView/photo/logo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href=" ../customerView/customerInterface.php">Home</a></li>
        <li><a href=" ../customerView/custManageCart.php">Cart</a></li>
        <li><a href="../customerView/foodAdd.php">Add Cart</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../../Business Services Layer/loginController/logoutController.php"><span class="glyphicon glyphicon-log-in"></span> Signup</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
    
    
  </div>
</div>



</body>


<style>
th, td {
    padding: 5px;
    text-align: left;
}
img{
  width:180px;
  height:150px;
}

  body{
    background-color:rgb(240, 255, 240);
  }

</style>

<body>

<center><table border="" border-collapse="collapse">
<div class=" w3-display-container">
  <div class="w3-display-middle">
    <h3>All Product </h3>
  </div>
</div>
<br>
<br>


<?php $count = 0;
      echo '<table>';
   foreach ($food as $food) { 
    if($count==3) //three images per row
            {
               print "</tr>";
               $count = 0;
            }
      if($count==0)
               print "<tr>";
            
            print "<td>";
            ?>

  <td  align=center> <img src="../serviceProviderView/photo/<?=$food['photo']?>" /></center>
  
  <table>
         <tr>
         <td><strong><?php echo $food['foodName']; ?></strong></td></tr>
         <tr>
         
        
  </table>

  <div class="w3-container">
<div class="w3-bar">
  <button class="w3-bar-item w3-button w3-green"><a href="foodDesp.php?foodid=<?php echo $food['foodid']?>">VIEW</button></a>

</div>
  
  </td>


<?php
            $count++;
            print "</td>";
        }
        if($count>0)
           print "</tr>";
        ?>


</table></center>
<br><br>
<style>
  footer .main-footer {
  padding: 20px 0;
  background: #252525;
}
footer ul {
  padding-left: 0;
  list-style: none;
}

/* Copy Right Footer */
.footer-copyright {
  background: #222;
  padding: 5px 0;
}
.footer-copyright .logo {
  display: inherit;
}
.footer-copyright nav {
  float: right;
  margin-top: 5px;
}
.footer-copyright nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
.footer-copyright nav ul li {
  border-left: 1px solid #505050;
  display: inline-block;
  line-height: 12px;
  margin: 0;
  padding: 0 8px;
}
.footer-copyright nav ul li a {
  color: #969696;
}
.footer-copyright nav ul li:first-child {
  border: medium none;
  padding-left: 0;
}
.footer-copyright p {
  color: #969696;
  margin: 2px 0 0;
}

/* Footer Top */
.footer-top {
  background: #252525;
  padding-bottom: 30px;
  margin-bottom: 30px;
  border-bottom: 3px solid #222;
}

/* Footer transparent */
footer.transparent .footer-top,
footer.transparent .main-footer {
  background: transparent;
}
footer.transparent .footer-copyright {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.3);
}

/* Footer light */
footer.light .footer-top {
  background: #f9f9f9;
}
footer.light .main-footer {
  background: #f9f9f9;
}
footer.light .footer-copyright {
  background: none repeat scroll 0 0 rgba(255, 255, 255, 0.3);
}

/* Footer 4 */
.footer- .logo {
  display: inline-block;
}

/*==================== 
  Widgets 
====================== */
.widget {
  padding: 20px;
  margin-bottom: 40px;
}
.widget.widget-last {
  margin-bottom: 0px;
}
.widget.no-box {
  padding: 0;
  background-color: transparent;
  margin-bottom: 40px;
  box-shadow: none;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  -ms-box-shadow: none;
  -o-box-shadow: none;
}
.widget.subscribe p {
  margin-bottom: 18px;
}
.widget li a {
  color: #ff8d1e;
}
.widget li a:hover {
  color: #4b92dc;
}
.widget-title {
  margin-bottom: 20px;
}
.widget-title span {
  background: #839fad none repeat scroll 0 0;
  display: block;
  height: 1px;
  margin-top: 25px;
  position: relative;
  width: 20%;
}
.widget-title span::after {
  background: inherit;
  content: "";
  height: inherit;
  position: absolute;
  top: -4px;
  width: 50%;
}
.widget-title.text-center span,
.widget-title.text-center span::after {
  margin-left: auto;
  margin-right: auto;
  left: 0;
  right: 0;
}
.widget .badge {
  float: right;
  background: #7f7f7f;
}

.typo-light h1,
.typo-light h2,
.typo-light h3,
.typo-light h4,
.typo-light h5,
.typo-light h6,
.typo-light p,
.typo-light div,
.typo-light span,
.typo-light small {
  color: #fff;
}

ul.social-footer2 {
  margin: 0;
  padding: 0;
  width: auto;
}
ul.social-footer2 li {
  display: inline-block;
  padding: 0;
}
ul.social-footer2 li a:hover {
  background-color: #ff8d1e;
}
ul.social-footer2 li a {
  display: block;
  height: 30px;
  width: 30px;
  text-align: center;
}
.btn {
  background-color: #ff8d1e;
  color: #fff;
}
.btn:hover,
.btn:focus,
.btn.active {
  background: #4b92dc;
  color: #fff;
  -webkit-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
  -ms-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
  -o-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
  -webkit-transition: all 250ms ease-in-out 0s;
  -moz-transition: all 250ms ease-in-out 0s;
  -ms-transition: all 250ms ease-in-out 0s;
  -o-transition: all 250ms ease-in-out 0s;
  transition: all 250ms ease-in-out 0s;
}
</style>
<footer id="footer" class="footer-1">
  <div class="main-footer widgets-dark typo-light">
    <div class="container">
      <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="widget subscribe no-box">
            <h5 class="widget-title">Deliver2U<span></span></h5>
            <div class="container">
      <img src="../serviceProviderView/photo/logo.png" />
    </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="widget no-box">
            <h5 class="widget-title">Quick Links<span></span></h5>
            <ul class="thumbnail-widget">
              <li>
                <div class="thumb-content"><a href="#.">About Us</a></div>
              </li>
              <li>
                <div class="thumb-content"><a href="#.">Contacts</a></div>
              </li>
              <li>
                <div class="thumb-content"><a href="#.">Terms & Condition</a></div>
              </li>
              <li>
                <div class="thumb-content"><a href="#.">Privacy Policy</a></div>
              </li>
              
            </ul>
          </div>
        </div>

        
          <div class="col-md-3 footer-ns animated fadeInRight">
        <h4>Newsletter</h4>
        <p>A rover wearing a fuzzy suit doesn’t alarm the real penguins</p>
        <p>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
            </span>
          </div><!-- /input-group -->
        </p>
      </div>
        

        <div class="col-xs-12 col-sm-6 col-md-3">

          <div class="widget no-box">
            <div class="col-md-2 footer-social animated fadeInDown">
        <h4>Follow Us</h4>
        <ul>
          <li><a href="#">Facebook</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Instagram</a></li>
          <li><a href="#">RSS</a></li>
        </ul>
      </div>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="footer-copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <p>Copyright Company Name © 2016. All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>
</html>