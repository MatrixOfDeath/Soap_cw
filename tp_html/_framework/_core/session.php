<?php
namespace _Core;
class Session 
{
	
	

	public static function login($data)
	{
		//var_dump($data);
		
		session_start();
	
		$_SESSION['id'] = $data->id;
		$_SESSION['nom'] = $data->nom;
		$_SESSION['prenom'] = $data->prenom;
		$_SESSION['email'] = $data->email;
		$_SESSION['passwd'] = $data->passwd;

		require_once '_framework\Views\index.html';

		

	}

	public static function logout()
	{
		session_unset();
		require_once '_framework\Views\index.html';
	}


}



