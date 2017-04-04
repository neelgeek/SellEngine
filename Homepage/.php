
<?php
require_once 'php/init.php';
$prod = new product();
if(input::exists('get'))
{
 $title = $_GET['title'];
if($prod->search(array('title'=>$title)))
{
  $res=$prod->results();
  foreach ($res as $value) 
  {
    echo "<br>" ,$value->title;
    echo "<br>" ,$value->price;
  }
}
else
{
	echo "No Result Found !";
}
}

?>





<!-- SellEngine.html By Neel,Aniket,Monis,Kalpesh -->
<html lang='en'>
<head>
<meta charset="UTF-8" />
<title>Sell Engine</title>
<link href="style2.css" rel="stylesheet" type="text/css" >
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">


</head>

<body>
<div id="nav1">
    <h1><a href="homepage2.html"><img src="logo1.png">SELL ENGINE</a></h1>
	<ul>
	<li id="active"><a href="homepage2.html"><b>Home</b></a></li>
	<li><a href="signin.html"><b>Sell</b></a></li>
	
	<li><a href="index.html"><b>Login/Signup</b></a></li> 
	<li><a href="about.html"><b>About</b></a></li>
	</ul>
</div>

<div id="main-content">
<br>
<br>
<form align="center">
<input type="text" placeholder="..Search what you want to Buy!.." maxlength="25" id="search">
<input type="submit" value="Go!" id="submit">
</form>
<br>
<br>
<div class="parent">
  <h2>Search Results</h2><hr color="black"><br>
  <div align="center" id="wrapper">
  
   <div class="content" id="first">Test</div>
  <div class="content" id="second">Test</div>
  <div class="content" id="third">Test</div>
  
  </div>
</div>


</div>

<div id="footer">
<h3><br>Copyrights &copy.SellEngine 2017.All Rights Reserved.</h3>
</div>
</body>
</html>