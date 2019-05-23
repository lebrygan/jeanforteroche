<?php
class Model{

	private $_bdd;

	// Method
	public function __construct($bddName){
		this->_bdd = new PDO('mysql:host=localhost;dbname='.$bddName.';charset=utf8', 'root', '');
	}
}

?>