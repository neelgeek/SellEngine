<?php

class token
{

	public static function generate($name)
	{
		return session::put($name,md5(uniqid()));
	}

	public static function check($name ,$value)
	{
		$tokenName = $name;

		if(session::exists($tokenName) && $value===session::get($tokenName))
		{
			session::delete($tokenName);
			return true;
		}
		return false;

	}	
}


?>