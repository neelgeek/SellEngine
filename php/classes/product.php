<?php
require_once 'php/init.php';
class product
{
 	
 private $_db=null;

 public function __construct()
 {

 	$this->_db=db::getInstance();

 }


 public function addProd($fields = array())
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
	 $query="INSERT into products (`" . implode('` , `', $keys) . "`) VALUES ({$values}) ";


	if(!$this->_db->setquery($query)->error())
	{
	echo "Product Registered Sucessfully";
	}
 }

}


?>
