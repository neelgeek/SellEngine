<?php

class user
{
private $_db;

public function __construct()
{
$this->_db = db::getInstance();
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

	public function getData($table,$values=array())
	{
		$sub2=array_keys($values);
		
		$sub1 = '';
		$x=0;
		foreach ($values as $value) {
			if($x<count($values)-1)
			{
				$sub1.= $sub2[$x].' = '."'".$value."'".' AND ';
				$x++;
			}
			else
			{
			$sub1.=$sub2[$x].' = '."'".$value."'";
		    }

		}
		 $query = "SELECT * FROM {$table} WHERE {$sub1}";
		return $this->_db->setquery($query);
	}

	public function login($username,$password)
	{
			$log_data= $this->getData('users',array(
     		'username'=>$username
     		));
     	if(!$log_data->error())
     	{
     		if($log_data->count()===1)
     		{
     			
     			if($log_data->results()[0]->password===input::get('pass_login'))
     			{
     				echo "Logged In !";
     			}
     			else
     			{
     				echo "Wrong Pass<br>";

     			}
     		}
     	}
	}
}
?>