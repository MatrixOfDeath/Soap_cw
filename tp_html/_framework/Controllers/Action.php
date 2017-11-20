<?php 
namespace Controllers;

class Action 
{
	
	public static function call($action)
	{
		
		$argument = array();
		foreach (explode('/', $action) as $key => $value) {
				if($key ===0){$class =$value;}
				else if ($key ===1){ $method = $value;}
				else 				{$argument[] = $value;}
		}

		if($class && $method){
		try {
			
			call_user_func_array(array("\Controllers\\".$class,$method),$argument);
		} catch (Exception $e) {
			echo "eror";
			}
		}
		else
		{
			echo '404';
		}
	}
}
