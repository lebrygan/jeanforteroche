<?php
class Billet{

  private $_id,
          $_showOrder,
          $_datePublication,
          $_published,
          $_textPublication;

  public function __construct(array $donnees){
    $this->hydrate($donnees);
  }

  //Getters and setters

  public function id(){return $this->_id;}
  public function showOrder(){return $this->_showOrder;}
  public function datePublication(){return $this->_datePublication;}
  public function published(){return $this->_published;}
  public function textPublication(){return $this->_textPublication;}

  public function setId($id){
    $id = (int) $id;
    if($id > 0)
      $this->_id = $id;
  }
  public function setShowOrder($showOrder){
    $showOrder = (int) $showOrder;
    if($showOrder > 0)
      $this->_showOrder = $showOrder;
  }
  public function setDatePublication($datePublication){
    if(preg_match("#^([0-9]{2}.?){5,6}$#", $datePublication))
      $this->_datePublication = $datePublication;
  }
  public function setPublished($published){
    if($published == true || $published == false)
      $this->_published = $published;
  }
  public function setTextPublication($textPublication){
    if(is_string($textPublication))
      $this->_textPublication = $textPublication;
  }

  //Hydratation
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
  public function showInformation(){
    return 'id :'.$this->_id.' showOrder: '.$this->_showOrder.' datePublication: '.$this->_datePublication.' published: '.$this->_published.' textPublication: '.$this->_textPublication;
  }
}

  ?>