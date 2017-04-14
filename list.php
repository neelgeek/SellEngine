<?php
require_once 'php/init.php';

$user= new user();

if($user->IsLoggedIn())
{
  $prod = new product();
  $prod->search(array(
    'user_id'=>$user->data()->user_id
    ));

  $result = $prod->results();
  // echo count($result);
}

?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="Product List/css/list.css">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
</head>
<body>
  <div class="form">
  <h1>My Ads List</h1>
  <ol>
  <?php
  foreach ($result as $value) 
  {
  ?>
    <li><a href="info.php?id=<?php echo $value->prod_id; ?>"><?php echo $value->title ?></a></li>

    <?php
  }
  ?>

    </ol>

</div>
</body>
</html>
