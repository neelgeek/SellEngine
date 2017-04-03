<?php
require_once 'php/init.php';

$prod = new product();


if(input::exists('post'))
{
if(token::check('token',input::get('token')))
{
  $prod->addProd(array(
    'title'=>input::get('title'),
    'type'=>input::get('type'),
    'city'=>input::get('city'),
    'descp'=>input::get('descp')
    ));   
}

}
?>




<html>
<head>
  <link rel="stylesheet" type="text/css" href="Register Product/css/signin.css">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
</head>
<body >
  <div class="container">
    <p>Register You Product</p>
    <form method="post" id="form" action="">
      <div class="form-input">
        <p id="para">Product title:</p>
       <input type="text" name="title" id='title'>
     </br>
       <p id="para">Product type:</p>
      <input type="text" name="type" id='type'>
    </br>
       <p id="para">City:</p>
      <input type="text" name="city" id='city'>
    </br>
       <p id="para">Product Description:</p>
      <textarea id='descp' name='descp' cols="20" rows ="20"></textarea>

    </br>
      </div>
      <input type="hidden" id='token' name='token' value="<?php echo token::generate('token') ?>">
      <input type="submit" value="Post Ad" class="btn-login">
    </form>
  </div>
</body>
</html>
