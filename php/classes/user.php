<?php

class user
{
private $_db,
$_isLoggedIn,
$_data;

public function __construct()
{
$this->_db = db::getInstance();

	if(session::exists('user'))
	{	

		$user= session::get('user');
		if($this->find($user))
		{
		$this->_isLoggedIn = true;
		}
		else
		{
			$this->logout();
		}
	}

}

public function register($table,$fields)
{	
	$query='';
	$keys = array_keys($fields);
	$values='';
	$x=1;
	foreach ($fields as $field) {
		if($x<count($fields))
		{
		$values.="'".$field."'".',';
		}
		else
		{
			$values.="'".$field."'";
		}
		$x++;
	}
	$query="INSERT into {$table} (`" . implode('` , `', $keys) . "`) VALUES ({$values}) ";


	if(!$this->_db->setquery($query)->error())
	{
	session::flash('home','User Registered Successfully ! You may now Login');
	header('location: index.php');
	}
}

	public function find($username)
	{
		$data=$this->_db->getData('users',array('user_id'=>$username));
		if($data->count())
		{
			$this->_data=$data->results()[0];
			return true;
		}
		return false;
	}

	public function login($username,$password)
	{
			$log_data= $this->_db->getData('users',array(
     		'username'=>$username
     		));
     	if(!$log_data->error())
     	{
     		if($log_data->count()===1)
     		{
     			
     			if($log_data->results()[0]->password===input::get('pass_login'))
     			{
     				session::put('user',$log_data->results()[0]->user_id);
     				header('location: index.php');
     			}
     			else
     			{
     				echo "Wrong Pass<br>";

     			}
     		}
     		else
     	{
     		echo "Username Dosent Exists !";
     	}
     	}

	}

	public function IsLoggedIn()
	{
		return $this->_isLoggedIn;
	}

	public function logout()
	{
		session::delete('user');
	}

	public function data()
	{
		return $this->_data;
	}
}

?>