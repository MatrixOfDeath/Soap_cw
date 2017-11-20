<?php 
namespace Models;
use \_Core\Database as Database;
class Utilisateur
{
	public $id 		= -1;
	public $nom 	= null;
	public $prenom	= null;
	public $email	= null;
	public $passwd	= null;

	function __Construct($arg = false)
	{
		if($arg){
			foreach ($this as $key => $value) {
				if (isset($arg[$key]))
				{
				$this->$key = $arg[$key];
				}
			}
		}

	}

	function save()
	{	
		if ($this->id == -1 )
		{
			$this->id = Database::instance()->insert(__CLASS__,$this);
		}
		else
		{
			
			Database::instance()->update(__CLASS__,$this);
		}


	}

	public function delete()
	{
		Database::instance()->delete(__CLASS__,$this);
	}

	public static function FindByID($id)
	{

		return Database::instance()->select(__CLASS__,["id"=>$id]);
	}

	public static function login($email,$passwd)
	{
		$datas = array("email" => $email , "passwd" => $passwd);
		
		return Database::instance()->select(__CLASS__,$datas);
	}
	

}