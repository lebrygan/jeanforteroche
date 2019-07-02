<?php
require_once('DbObject.php');

class Billet extends DbObject{

  protected $_published,
            $_textPublication;

  public function __construct(array $donnees){
    $this->hydrate($donnees);
  }

  //Getters and setters

  public function published(){return $this->_published;}
  public function textPublication(){return $this->_textPublication;}

  public function setPublished($published){
    if($published == true || $published == false)
      $this->_published = $published;
  }
  public function setTextPublication($textPublication){
    if(is_string($textPublication))
      $this->_textPublication = $textPublication;
  }
}