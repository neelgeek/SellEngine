<?php
require_once 'php/init.php';
echo session::flash('edit');
$user = new user();
$data;
if($user->IsLoggedIn())
{
  $data= $user->data();
    if(input::exists())
    {
      if(token::check('token',input::get('token')))
      {

        if($user ->update(array(
          'first_name'=> input::get('first_name'),
          'last_name'=> input::get('last_name'),
          'number'=> input::get('number'),
          'email'=> input::get('email')
          ),$data->user_id))
        {
      session::flash('edit',"Info Edited Sucessfully !");
      header("location: editprofile.php");
      
    }
      }
    }
}
else
{
  header('location: index.php');
}

?>

<html >
<head>
  <meta charset="UTF-8">
  <title>Edit Profile</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="EditProfile/css/style.css">

  
</head>

<body>
<div class="form">
   <div class="toprow">
<form action="index.php">
   <div class="field-wrap">
   <input type="image" src="EditProfile/home.png" width="60" height="60">
</form>
</div>
<div>
<h1>Edit Profile</h1>
</div>
</div>
<div id="signup">   
          
          
          <form action="" method="post">
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name='first_name' required autocomplete="off" value="<?php echo $data->first_name; ?>" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name='last_name' required autocomplete="off" value="<?php echo $data->last_name; ?>"/>
            </div>
          </div>
			<div class="field-wrap">
              <label>
                Number<span class="req">*</span>
              </label>
              <input type="text" name='number' required autocomplete="off" value="<?php echo $data->number; ?>"/>
            </div>
          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name='email' required autocomplete="off"/ value="<?php echo $data->email; ?>">
          </div>
           <input type="hidden" name="token" value="<?php echo token::generate('token') ?>">
          <button type="submit" class="button button-block"/>UPDATE</button>
          
          </form>

        </div>
	
		</div>
		
		 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="EditProfile/js/index.js"></script>

</body>
</html>
