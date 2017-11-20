<?php
/**
**
**/
class Service{
	
	public function __construct(){
		session_start();
		if(empty($_SESSION["BDD"])){
			$_SESSION["BDD"] = array("server","client","soap","Zend","REST");
		}//END if $_SESSION
	}//END construct

	/**
	* getWord
	*
	* @param integer $limit
	* @param  string $order
	* @return  array $result
	**/
	public function getWord($limit=0, $order='ASC'){
		
		$result = $_SESSION["BDD"];

		(strtoupper($order === "ASC")) ? sort($result, SORT_NATURAL | SORT_FLAG_CASE) : rsort($result, SORT_NATURAL | SORT_FLAG_CASE);

		if ($limit>0){
			$result = array_splice($result, 0, $limit);
		}//END if $limit

		return $result;
	}//END getWord()

	/**
	* addWord
	*
	* @param string $word
	* @return  boolean
	**/

	public function addWord($word){
		if(empty($word) || in_array($word, $_SESSION["BDD"])){
			return false;
		}//END if $word
		array_push($_SESSION["BDD"], $word);
		return true;
	}//END addWord()


	/**
	* getWord
	*
	* @param string $oldWord
	* @param string $newWord
	* @return  boolean
	**/

	public function updateWord($oldWord, $newWord){
		if(empty($oldWord) || empty($newWord)){
			return false;
		}//END if $old/newWord

		$key = array_search($oldWord, $_SESSION["BDD"]);

		if($key === false || in_array($newWord, $_SESSION["BDD"])){
			return false;
		}//END if $key

		$_SESSION["BDD"][$key] = $newWord;
		return true;
	}//END update()

	/**
	* deleteWord
	*
	* @param string $word
	* @return  boolean
	**/
	public function deleteWord($word){

		if(empty($word)){
			
			return false;
		}//END if 

		$key = array_search($word, $_SESSION["BDD"]);

		if($key === false){
			return false;
		}//END if $key


		unset($_SESSION["BDD"][$key]);
		return true;


	}//END deleteWord



}//END CLASS