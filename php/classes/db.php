<?php
class db
{
private static $_inst=null;

private  $_pdo,
$msg ="Hello",
$_query,
$_results,
$_count,
$_error;
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
		$this->_error=false;
			if($this->_query=$this->_pdo->prepare($query))
			{
				try
				{
					if($this->_query->execute())
					{
						$this->_results=$this->_query->fetchAll(PDO::FETCH_OBJ);
						$this->_count=$this->_query->rowCount();
						
					}
					else
					{
						$this->_error=true;
					}
				}
				catch(PDOException $e)
				{
					echo $e->getMessage();
				}

			}
			return $this;
	}
	
	public function error()
	{
		return $this->_error;
	}

	public function results()
	{
		return $this->_results;
	}

	public function count()
	{
		return $this->_count;
	}
}


?>