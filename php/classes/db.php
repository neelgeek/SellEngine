<?php
class db
{
private static $_inst=null;

private  $_pdo,
$msg ="Hello",
$_query,
$_results;
private function __construct()
{
		$user ="root";
		$password="";
	try
	{
	$this->_pdo= new PDO('mysql: host=localhost ;dbname=sellengine',$user,$password);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}


	public  function getInstance()
	{
	
		if(!isset(self::$_inst))
		{
			self::$_inst=new db();
		}
		return self::$_inst;
	}

	public function setquery($query)
	{
		echo "<br>",$query;
			if($this->_query=$this->_pdo->prepare($query))
			{
				try
				{
					if($this->_query->execute())
					{
						$this->_results=$this->_query->fetchAll(PDO::FETCH_OBJ);

						return $this->_results;
					}
				}
				catch(PDOException $e)
				{
					echo $e->getMessage();
				}
			}
			return false;
	}

	
}


?>