<?php
require_once 'php/init.php';
$id= $_GET['id'];
$user = new user();

// if($user->IsLoggedIn())
// {
$prod = new product();
if($prod->find($id))
{
	$res=$prod->results()[0];
	$user_id = $res->user_id;		
 	 if($user->find($user_id))
 	 {
 	 	$uploader=$user->data();
 	 }
 	
}
else
{
	session::flash('home','Product Not Found :(!');
	header('location: index.php');
}
//}
?>

<html>
  <head>
  <style>
body {font-family: "Lato", sans-serif;}

/* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #FFF;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  background-color: #FFF;
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='BuyPage\font-awesome.css' rel="stylesheet" type="text/css">
	<!-- Bootstrap -->
    <link href="BuyPage\bootstrap.min.css" rel="stylesheet">
	<!-- Main Style -->
	<link rel="stylesheet" href="BuyPage\style.css" />
	<!-- fancy Style -->
	<link rel="stylesheet" type="text/css" href="BuyPage\jquery.fancybox.css" media="screen" />
</head>
<body>
<div class="container">
<div class="row">
			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
					<div class="title"><?php echo $res->title ?></div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<!-- <div class="dt-img">
							<div class="detpricetag"><div class="inner"><?php echo $res->price ?></div></div>
							<a class="fancybox" href="BuyPage/images/sample-1.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="BuyPage/images/sample-1.jpg" alt="" class="img-responsive" /></a>
						</div>
						<div class="thumb-img">
							<a class="fancybox" href="BuyPage/images/sample-4.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="BuyPage/images/sample-4.jpg" alt="" class="img-responsive" /></a>
						</div> -->
						<!-- <div class="thumb-img">
							<a class="fancybox" href="BuyPage/images/sample-5.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="BuyPage/images/sample-5.jpg" alt="" class="img-responsive" /></a>
						</div>
						<div class="thumb-img">
							<a class="fancybox" href="BuyPage/images/sample-1.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="BuyPage/images/sample-1.jpg" alt="" class="img-responsive" /></a>
						</div> -->
					</div>
					<div class="col-md-6 det-desc" align="left">
						<div class="productdata" align="left">
							<div class="infospan" align="left">Price<span><?php echo $res->price ?></span></div>
							<div class="infospan">City<span><?php echo $res->city ?></span></div>
							<div class="infospan">Type<span><?php echo $res->type ?></span></div>
							<div class="average">
							<!-- <form role="form">
							<div class="form-group">
								<div class="rate"><span class="lbl">Average Rating</span>
								</div>
								<div class="starwrap">
									<div id="score" style="width:100px">
									<img src="Images/star-on.png">
									<img src="Images/star-on.png">
									<img src="Images/star-on.png">
									<img src="Images/star-on.png">
									<img src="Images/star-off.png">
								</div>
								</div>
								<div class="clearfix"></div>
							</div> -->
							</form>
							</div>
							<form class="form-horizontal ava" role="form">
							<div class="col-sm-4">
							<div class="form-group">
										<!-- <button class="btn btn-default btn-red btn-sm" onclick="document.getElementById('id01').style.display='block'"><span class="addchart">Buy Now</span></button> -->
										<div id="id01" class="modal">
										<div class="modal-content animate">
										  <h1>Product Info</h1>
										<center>
										<table>
											<tr>
											  <td>Product Title </td>
											  <td>zdfzd</td>
											</tr>
											<tr>
											  <td>Product Type </td>
											  <td>fzdfzd</td>
											</tr>
											<tr>
											  <td>Price </td>
											  <td>fdz</td>
											</tr>
											<tr>
											  <td>City </td>
											  <td>fasaf</td>
											</tr>
											<tr>
											  <td>Product Description </td>
											  <td width="300px">bdha dasdasd  asdasdas dasdasd adsasdasd asdasdasd asdasdasdasd dasdasdas dasdasdas dasdasdasd adsdasdas dasdasda</td>
											</tr>
										</table>
										</center>
										<button type="submit" class="buttton5">DELETE</button>
										</div>
										</div>
									</div>
							</div>
							<div class="clearfix"></div>
							</form>
				<div class="sharing">
								<div class="share-bt">
									<div class="addthis_toolbox addthis_default_style ">
										<a class="addthis_counter addthis_pill_style"></a>
									</div>
									<script type="text/javascript" src="share.js"></script>
									<div class="clearfix"></div>
								</div>
								<div class="avatock"><span>In stock</span></div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">Description</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Owner Info</button>
 
</div>
  <div id="London" class="tabcontent">
  <h3>Description</h3>
  <p><?php echo $res->descp ?>
			</p>
</div>

<div id="Paris" class="tabcontent">
  
						<table>
											<tr>
											  <td>Name</td>
											  <td><?php echo $uploader->first_name,' ',$uploader->last_name; ?></td>
											</tr>
									
											<tr>
											  <td>Email Addrees </td>
											  <td><?php echo $uploader->email ?></td>
											</tr>
											<tr>
											  <td>Contact No.</td>
											  <td ><?php echo $uploader->number ?></td>
											</tr>
										</table>
</div>
				
	

			
				
				</div>
				<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < 2; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < 2; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
				</body>
				</html>