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


	if($this->_db->setquery($query))
	{
		echo "Data entered";
	}
}

public function get()

}
?>