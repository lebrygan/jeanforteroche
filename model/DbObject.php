<?php

class DbObject
{
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
}