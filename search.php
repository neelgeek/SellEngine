
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
    <h1><a href="index.php"><img src="Homepage/logo1.png">SELL ENGINE</a></h1>
	<ul>

	<li><a href="register.php"><b>Sell</b></a></li>

	<li><a href="user.html"><b>Welcome <?php echo $user->data()->username; ?></b><img src="Homepage/user.png"></a>

  <ul>
  <li><a href="editprofile.php"><b>Edit Profile</b></a></li>
  <li><a href="list.php"><b>My Ads</b></a></li>
  <li><a href="login.php"><b>Logout</b></a></li>
  </ul>
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
   <div class="content" id="first">
   <a href="BuyPage.php?id=<?php echo $result->prod_id; ?>"><?php echo $result->title; ?></a>
   	<div>
   	<?php echo $result->price; ?>
   	</div>
   </div>
   <?php
  }
}
else
{
	echo "NO RESULT FOUND !";
}
  ?>

<br><br>
  </div>
</div>
</div>


</div>

<div id="footer">
<h3><br>Project Developed by Aniket,Neel,Monis and Kalpesh</h3>
</div>
</body>
</html>
