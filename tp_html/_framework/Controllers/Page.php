<?php 
namespace Controllers;
class Page
{
	public static $_directoryIndex ="index.html";

	public static function load($route){

		if (substr($route, -1)==="/"){$route .=self::$_directoryIndex;}
		if (file_exists('_framework\Views\\'.$route) && !preg_match('/__fragments/', $route)) {
			require_once('_framework\Views\\'.$route);
		}
		else{
			require_once('_framework\Views\404.html');
		}
		
	}
	

	 public static function loadFragments($name)
	 {
	 	if (file_exists(('_framework\Views\__fragments\\'.$name.".html")))
	 	{
	 		require_once '_framework\Views\__fragments\\'.$name.".html";
	 	}
	 	else{echo 'pas de fichier';}
	 }
	public static function Page($route)
	{
		

		if($route == '/')
		{
			require_once('_framework\Views\index.html');	
		}
		else {

		if($route != '/' && file_exists('_framework\Views\\'.$route)){
			require_once('_framework\Views\\'.$route);
		}
		else 
		{
			echo '404';
		}
	}

	}
}