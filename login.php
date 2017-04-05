
<?php
require_once 'php/init.php';
$user= new user();
if($user->IsLoggedIn())
{
  $user->logout();
  header('location: index.php');
  }

if(input::exists())
{ 
	
	
     	
     if(!is_null(input::get('id')))
     {
     	if(token::check('token_log',input::get('token_log')))
     	{
     		$user->login(input::get('id'),input::get('pass_login'));
     	}
  		
  	}
     else if(!is_null(input::get('first_name')))
     {
     	if(token::check('token_reg',input::get('token_reg')))
     	{
     	if(input::get('pass_reg')===input::get('pass_reg_again'))
     		{
     			if($user->find(input::get('reg_id')))
     			{
	     	$user->register('users',array(
	     		'username'=>input::get('reg_id'),
	     		'first_name'=>input::get('first_name'),
	     		'last_name'=>input::get('last_name'),
	     		'email'=>input::get('email'),
	     		'password'=>input::get('pass_reg'),
	     		'number'=>input::get('number')

     		));
	     }
	     else
	     {
	     	echo "Username Already Exists";
	     }
     		
   			}
        else
        {
          echo "Password Does Not Match";
        }
     	}
 		}

		
	
}

?>







<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="sign-up-login-form/css/style.css">

  
</head>

<body>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="" method="post">
          
          <div class="top-row">
          <div class="field-wrap">
            <label>
              Username <span class="req">*</span>
            </label>
            <input type="text" name="reg_id" required autocomplete="off"/>
          </div>
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name='first_name' required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"  name='last_name' required autocomplete="off"/>
            </div>
          </div>
			<div class="field-wrap">
              <label>
                Number<span class="req">*</span>
              </label>
              <input type="text" name="number" required autocomplete="off"/>
            </div>
          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"  name="email" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
               Password<span class="req">*</span>
            </label>
            <input type="password"  name="pass_reg" required autocomplete="off"/>
          </div>
          
		  <div class="field-wrap">
            <label>
               Confirm Password<span class="req">*</span>
            </label>
            <input type="password" name="pass_reg_again" required autocomplete="off"/>
          </div>
       
          <button type="submit" class="button button-block"/>Get Started</button>
           <input type="hidden" name="token_reg"  id="token_reg" value="<?php echo token::generate('token_reg') ?>">
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="text" name="id" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"  name="pass_login" required autocomplete="off"/>
          </div>
         
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block"/>Log In</button>
           <input type="hidden" name="token_log"  id="token_log" value="<?php echo token::generate('token_log') ?>">
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="sign-up-login-form/js/index.js"></script>

</body>
</html>
