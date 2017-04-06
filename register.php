<?php
require_once 'php/init.php';

echo session::flash('register');

$prod = new product();
$user=new user();
if($user->IsLoggedIn())
{
if(input::exists('post'))
{
if(token::check('token',input::get('token')))
{

  $prod->addProd(array(
    'title'=>input::get('title'),
    'type'=>input::get('type'),
    'price'=>input::get('price'),
    'city'=>input::get('city'),
    'descp'=>input::get('descp')
    ));   
}

}
}
else
{
  header('location: index.php');
}
?>




<html>
<head>
  <link rel="stylesheet" type="text/css" href="register product/css/signin.css">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
</head>
<body >
  <div class="form">
  <h1>AD PAGE</h1>
    <form method="post" name="myForm">
       <div class="field-wrap">
              <label>
                Product Title<span class="req">*</span>
              </label>
              <input type="text" name='title' id='title' required autocomplete="off" />
            </div>
      <select form_id="myForm" class="field-wrap"  id="type" name="type">
    <option value="" disabled="disabled" selected="selected">Please select a category</option>
   <option value="Electronics">Electronics</option>
    <option value="Mobiles">Mobiles</option>
    <option value="Vehicals">Vehicals</option>
    <option value="Household Items">Household Items</option>
</select>
   <div class="field-wrap">
              <label>
                Price<span class="req">*</span>
              </label>
              <input type="text" name='price' id='price' required autocomplete="off" />
            </div>
      <div class="field-wrap">
              <label>
                City<span class="req">*</span>
              </label>
              <input type="text" id='city' name="city" required autocomplete="off" />
            </div>
       <div class="field-wrap">
              <label>
                Product Description<span class="req">*</span>
              </label>
      <textarea name='descp' id='descp'></textarea>
    </div>
    <input type="hidden" name="token" id='token' value="<?php echo token::generate('token') ?>">
   <input type="submit" value='POST' class="button button-block"/>
   <BR>
   <BR>
    <button class="button button-block"/><a href='index.php'>BACK</a></button>
  </form>
  </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="register.js"></script>
</body>
</html>
