	<?php
require_once 'php/init.php';




class product
{
 	
 private $_db=null,
 		$_results;

 public function __construct($id=null)
 {

 	$this->_db=db::getInstance();

 	if(!is_null($id))
 	{
 		$this->find($id);
 	}

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
	session::flash('home','Product Registered Sucessfully !');
	header('location: index.php');
	}
 }


public function search($filters= array())
{
       $sub2=array_keys($filters);
		
		$sub1 = '';
		$x=0;
		foreach ($filters as $value) {
			if($x<count($filters)-1)
			{
				if(is_numeric($value))
				{
				$sub1.= $sub2[$x].' = '. $value .' AND ';
				}
				else
				{
					$sub1.= $sub2[$x].' LIKE '." '%".$value."%' " .' AND ';
				}	
							
			}
			else
			{
				if(is_numeric($value))
				{
				$sub1.= $sub2[$x].' = '. $value ;
				}
				else
				{
					$sub1.= $sub2[$x].' LIKE '." '%".$value."%' ";
				}	
		    }
			$x++;	

		}
		    $query = "SELECT * FROM products WHERE {$sub1}";


		$searchResults = $this->_db->setquery($query);

		if($searchResults->count())
		{
			$this->_results=$searchResults->results();
			return true;
		}
			return false;
		
	
	
}

	public function results()
	{
		return $this->_results;
	}

	public function find($id)
	{
		$query = "SELECT * FROM products WHERE prod_id='{$id}'";
		$searchResults =$this->_db->setquery($query);
		if($searchResults->count())
		{
			$this->_results=$searchResults->results();
			return true;
		}
		
			return false;
		
	
	}

	public function	 delete($id)
	{
			$query="DELETE FROM products WHERE prod_id={$id} ";

			$result=$this->_db->setquery($query);
			if($result->count())
			{
				return true;
			}
			return false;
	}

}


?>
