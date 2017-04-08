<?php
require_once 'php/init.php';
$user= new user();
if($user->IsLoggedIn())
{
$id=$_GET['id'];
$prod = new product($id);
$result=$prod->results()[0];
}
else
{
	header('location: index.php');
}

?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='BuyPage/font-awesome.css' rel="stylesheet" type="text/css">
	<!-- Bootstrap -->
    <link href="BuyPage/bootstrap.min.css" rel="stylesheet">
	<!-- Main Style -->
	<link rel="stylesheet" href="BuyPage/style.css" />
	<!-- fancy Style -->
	<link rel="stylesheet" type="text/css" href="BuyPage/jquery.fancybox.css" media="screen" />
</head>
<body>
<div class="container">
<div class="row">
			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
				
								</div>
				<div class="row">
					<div class="col-md-6">
						<div class="dt-img">
							<div class="detpricetag"><div class="inner"><?php echo $result->price; ?></div></div>
							<a class="fancybox" href="BuyPage/Images/sample-1.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="BuyPage/images/sample-1.jpg" alt="" class="img-responsive" /></a>
						</div>
						<div class="thumb-img">
							<a class="fancybox" href="BuyPage/Images/sample-4.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="BuyPage/images/sample-4.jpg" alt="" class="img-responsive" /></a>
						</div>
						<div class="thumb-img">
							<a class="fancybox" href="BuyPage/Images/sample-5.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="BuyPage/images/sample-5.jpg" alt="" class="img-responsive" /></a>
						</div>
						<div class="thumb-img">
							<a class="fancybox" href="BuyPage/Images/sample-1.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="BuyPage/images/sample-1.jpg" alt="" class="img-responsive" /></a>
						</div>
					</div>
					<div class="col-md-6 det-desc">
						<div class="productdata">
							<div class="infospan">Title<span><?php echo $result->title; ?></span></div>
							<div class="infospan">Price<span><?php echo $result->price; ?></span></div>
							<div class="infospan">City<span><?php echo $result->city; ?></span></div>
							<!-- <div class="average">
							<form role="form">
							<div class="form-group">
								<div class="rate"><span class="lbl">Average Rating</span>
								</div>
								<div class="starwrap">
									<div id="score" style="width:100px">
									<img src="BuyPage/Images/star-on.png">
									<img src="BuyPage/Images/star-on.png">
									<img src="BuyPage/Images/star-on.png">
									<img src="BuyPage/Images/star-on.png">
									<img src="BuyPage/Images/star-off.png">
								</div>
								</div>
								<div class="clearfix"></div>
							</div>
							</form>
							</div> -->
							<form class="form-horizontal ava" role="form">
							<div class="col-sm-4">
							<div class="form-group">
										<button class="btn btn-default btn-red btn-sm"><span class="addchart">Buy Now</span></button>
									</div>
							</div>
							<div class="clearfix"></div>
							</form>
				<div class="sharing">	
								<div class="share-bt">
									<div class="addthis_toolbox addthis_default_style ">
										<a class="addthis_counter addthis_pill_style"></a>
									</div>
									<script type="text/javascript" src="BuyPage/share.js"></script>
									<div class="clearfix"></div>
								</div>
								<div class="avatock"><span>In stock</span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-review">
					<ul id="myTab" class="nav nav-tabs shop-tab">
						<li class="active"><a href="#desc" data-toggle="tab">Description</a></li>
					</ul>
					<div id="myTabContent" class="tab-content shop-tab-ct">
						<div class="tab-pane fade active in" id="desc">
							<p><?php echo $result->descp; ?>
							</p>
						</div>
					</div>
				</div>
				</div>
				</body>
				</html>
					
						