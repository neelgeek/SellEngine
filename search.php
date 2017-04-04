
<?php
require_once 'php/init.php';
$prod = new product();
$error=true;
$user=new user();
if($user->IsLoggedIn())
{
if(input::exists('get'))
{
 $title = $_GET['title'];
 if($title!='')
 {
	if($prod->search(array('title'=>$title)))
	{
	  $res=$prod->results();
	  $error=false;
	}
	else
	{
		$error=true;
		echo "No Result Found !";
	}
}
}
}
else
{
	header('location: index.php');
}

?>





<!-- SellEngine.html By Neel,Aniket,Monis,Kalpesh -->
<html lang='en'>
<head>
<meta charset="UTF-8" />
<title>Sell Engine</title>
<link href="Homepage/style2.css" rel="stylesheet" type="text/css" >
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">


</head>

<body>
<div id="nav1">
    <h1><a href="homepage2.html"><img src="Homepage/logo1.png">SELL ENGINE</a></h1>
	<ul>
	<li id="active"><a href="homepage2.html"><b>Home</b></a></li>
	<li><a href="signin.html"><b>Sell</b></a></li>
	
	<li><a href="login.php"><b>Logout</b></a></li> 
	<li><a href="about.html"><b>About</b></a></li>
	</ul>
</div>

<div id="main-content">
<br>
<br>
<form align="center" action="">
<input type="text" name="title" placeholder="<?php if(!$error)
{
	echo $title;
} 
else
{
?>
..Search what you want to Buy!.. 
<?php
}
?>"
maxlength="25" id="search">
<input type="submit" value="Go!" id="submit">
</form>
<br>
<br>
<div class="parent">
  <h2>Search Results</h2><hr color="black"><br>
  <div align="center" id="wrapper">
  
  <?php
  if(!$error)
  {
  foreach ($res as $result) {
  	?>
   <div class="content" id="first"><?php echo $result->title; ?></div>
   <?php
  }
}
else
{
	echo "NO RESULT FOUND !";
}
  ?>
  
  
  </div>
</div>


</div>

<div id="footer">
<h3><br>Copyrights &copy.SellEngine 2017.All Rights Reserved.</h3>
</div>
</body>
</html>