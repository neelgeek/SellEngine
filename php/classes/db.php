<?php
class db
{
	private static $_inst=null;

private  $_pdo,
$msg ="Hello";
private function __construct()
{
		$user ="root";
		$password="";
	try
	{
	$_pdo= new PDO('mysql: host=localhost ;dbname=sellengine',$user,$password);
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


	public function disp()
	{
		echo $this->msg;
	}
}


?>