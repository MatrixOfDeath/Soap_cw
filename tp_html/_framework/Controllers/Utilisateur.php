<?php
namespace Controllers;
class Utilisateur
{
	public static function register()
	{

		$Utilisateur = new \Models\Utilisateur($_POST);
		//echo "Instanciation\n";
		

		/*$Utilisateur->nom ="b";
		$Utilisateur->prenom ="b";
		$Utilisateur->email =rand();
		$Utilisateur->passwd ="b";*/
		$Utilisateur->save();



		//echo "Création";
		//print_r($Utilisateur);

		/*if($Utilisateur = \Models\Utilisateur::FindByID($Utilisateur->id)){
			echo "Selection\n";
			print_r($Utilisateur);
			$Utilisateur->nom ="k";
			$Utilisateur->prenom ="k";
			$Utilisateur->email ="k";
			$Utilisateur->passwd ="k";
			$Utilisateur->save();

			echo "Modification\n";
			print_r($Utilisateur);
			//$Utilisateur->delete();
			//echo "Suppréssion\n";
			//print_r($Utilisateur);*/


		}
		

	}

	public static function login()
	{
		
		$Utilisateur =  \Models\Utilisateur::login($_POST['email'],$_POST['passwd']);
		echo "Login\n";

		$login = \_Core\Session::login($Utilisateur);
		
		
		//print_r($Utilisateur);
	}

	public static function logout()
	{
		 \_Core\Session::logout();
		
	}

	
	
	

}