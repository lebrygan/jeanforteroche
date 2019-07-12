<?php
require_once('DbObject.php');

class Comment extends DbObject{

  protected $_relativeBillet,
            $_comment,
            $_signaled,
            $_name;

  public function __construct(array $donnees){
    $this->hydrate($donnees);
  }

  //Getters and setters

  public function relativeBillet(){return $this->_relativeBillet;}
  public function comment(){return $this->_comment;}
  public function signaled(){return $this->_signaled;}
  public function name(){return $this->_name;}

  public function setRelativeBillet($relativeBillet){
    $relativeBillet = (int) $relativeBillet;
    if($relativeBillet > 0)
      $this->_relativeBillet = $relativeBillet;
  }
  public function setComment($comment){
    if(is_string($comment))
      $this->_comment = $comment;
  }
  public function setSignaled($signaled){
    if($signaled == true || $signaled == false)
      $this->_signaled = $signaled;
  }
  public function setName($name){
    if(strlen($name) > 255)
      $name = substr($name, 0,255);
    $this->_name = $name;
  }
}