<?php
class input
{

	public function exists($method='post')
	{
		switch ($method) {
			case 'post':
				if(!empty($_POST))
				{
					return true;
				}
				else
				{
					return false;
				}
				break;
			
				case 'get':
				if(!empty($_GET))
				{
					return true;
				}
				else
				{
					return false;
				}
				break;
			default:
				return false;
				break;
		}
	}

	public function get($field)
	{
		if(!empty($_POST))
		{
			return $_POST[$field];
		}
		else if(!empty($_GET))
		{
			return $_GET[$field];
		}

	}

}


?>