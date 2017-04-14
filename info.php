<?php
require_once 'php/init.php';
$prod_id = $_GET['id'];
$user = new user();
$prod = new product();

if($user->IsLoggedIn())
{
  $prod->find($prod_id);

  $results=$prod->results()[0];
  

}

?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="Product Info/css/info.css">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
</head>
<body>
  <div class="form">
  <h1>Product Info</h1>
<center>
<table>
    <tr>
      <td>Product Title </td>
      <td><?php echo $results->title; ?></td>
    </tr>
    <tr>
      <td>Product Type </td>
      <td><?php echo $results->type; ?></td>
    </tr>
    <tr>
      <td>Price </td>
      <td><?php echo $results->price; ?></td>
    </tr>
    <tr>
      <td>City </td>
      <td><?php echo $results->city; ?></td>
    </tr>
    <tr>
      <td>Product Description </td>
      <td width="300px"><?php echo $results->descp; ?></td>
    </tr>
</table>
</center>
<button type="submit">DELETE</button>
</div>
</body>
</html>
