<?php

class user
{
private $_db,
$_isLoggedIn;

public function __construct()
{
$this->_db = db::getInstance();

	if(session::exists('user'))
	{
		$this->_isLoggedIn = true;
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
		echo "Data entered";
	}
}

	public function find($username)
	{
		$data=$this->_db->getData('users',array('username'=>$username));
		if($data->count())
		{
			return $data;
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
     				
     				session::put('user',$log_data->results()[0]->username);
     				header('location: index.php');
     			}
     			else
     			{
     				echo "Wrong Pass<br>";

     			}
     		}
     	}
	}

	public function IsLoggedIn()
	{
		return $this->_isLoggedIn;
	}
}
?>