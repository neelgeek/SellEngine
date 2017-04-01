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
		return $this->setquery($query);
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