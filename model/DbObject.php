<?php

class DbObject
{
protected	$_id,
			$_datePublication;

	//Getters
	public function id(){return $this->_id;}
	public function datePublication(){return $this->_datePublication;}
	//Getter for a readable date
	public function datePublicationReadable(){
		$date = 'Publié le ';
		if(preg_match("#\s+.+$#", $this->_datePublication)){
			$date .= preg_replace('#(\s+)#', ' à ', $this->_datePublication);
		} else {
			$date .= $this->_datePublication;
		}
		return $date;
	}

	//Setters
	public function setId($id){
	    $id = (int) $id;
	    if($id > 0)
	      $this->_id = $id;
  	}
  	public function setDatePublication($datePublication){
	    if(preg_match("#^([0-9]{1,2}.?){5,7}$#", $datePublication))
	      $this->_datePublication = $datePublication;
  	}

  	//Hydrate
	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value)
		{
		  // Getting the setters name wich correspond to the key
		  $method = 'set'.ucfirst($key);
		      
		  // if the setter exist we call it
		  if (method_exists($this, $method))
		    $this->$method($value);
		}
	}

	//Debbug
	public function showInformation() {
	    $information = '';
	    foreach ($this as $key => $value) {
	        $information .= $key.' => '.$value.' || ';
	    }
	    return $information;
  }
}