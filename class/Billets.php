<?php
class Billets{

  private $_id,
          $_showOrder,
          $_datePublication,
          $_published,
          $_textPublication;

  public __construct(array $donnees){
    $this->hydrate($donnees);
  }

  //Getters and setters

  public function id(){return $this->_id;};
  public function showOrder(){return $this->_showOrder;};
  public function datePublication(){return $this->_datePublication;};
  public function published(){return $this->_published;};
  public function textPublication(){return $this->_textPublication;};

  public function setId($id){
    $id = (int) $id;
    if($id > 0)
      $this->_id = $id;
  };
  public function setShowOrder(){return $this->_showOrder;};
  public function setDatePublication(){return $this->_datePublication;};
  public function setPublished(){return $this->_published;};
  public function setTextPublication(){return $this->_textPublication;};


  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      // On récupère le nom du setter correspondant à l'attribut.
      $method = 'set'.ucfirst($key);
          
      // Si le setter correspondant existe.
      if (method_exists($this, $method))
      {
        // On appelle le setter.
        $this->$method($value);
      }
    }
}

  ?>