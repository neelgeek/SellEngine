<?php
require_once 'php/init.php';
$user=new user();
$LoggedIn=false;
if($user->IsLoggedIn())
{
  echo "Welcome";
  $LoggedIn=true;
}

?>




<!-- SellEngine.html By Neel,Aniket,Monis,Kalpesh -->
<html lang='en'>
<head>
<meta charset="UTF-8" />
<title>Sell Engine</title>
<link href="homepage/style2.css" rel="stylesheet" type="text/css" >
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">


</head>

<body>
<div id="nav1">
    <h1><a href="index.html"><img src="homepage/logo1.png">SELL ENGINE</a></h1>
	<ul>
	<li id="active"><a href="index.html"><b>Home</b></a></li>

	<?php 
  if(!$LoggedIn)
  {
  ?>
  <li><a href="login.php"><b>Login/Signup</b></a></li> 
  <?php
  }
  ?>
<?php
    if($LoggedIn)
  {
  ?>
  	<li><a href="register.php"><b>Sell</b></a></li>
	<li><a href="buy.html"><b>Buy</b></a></li>
  <li><a href="login.php"><b>Logout</b></a></li> 
  <?php
  }
  ?>

	<li><a href="about.html"><b>About</b></a></li>
	</ul>
</div>

<div id="main-content">
<br>
<h1 id="h1">Welcome to Sell Engine</h1>
<p align="center"><b>Welcome to the site where you can sell and buy used goods within minutes.</b></p>
<br>
<br>
<form align="center">
<input type="text" placeholder="Search..." maxlength="25" id="search">
<input type="submit" value="Go!" id="submit">
</form>
<br>
<br>
<!--
Automatic Slideshow
Changes image every 5 seconds:
-->

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 5</div>
  <img src="homepage/1.jpg" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 5</div>
  <img src="homepage/2.jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 5</div>
  <img src="homepage/3.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 5</div>
  <img src="homepage/4.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>


<div class="mySlides fade">
  <div class="numbertext">5 / 5</div>
  <img src="homepage/5.png" style="width:100%">
  <div class="text">Caption Three</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>  
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 5000); // Changes image every 5 seconds
}
</script>
<br>
<br>
<br>
<p><h1></h1></p>
</div>




</body>
</html>