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
    else
      throw new InvalidArgumentException("Le commentaire doit être lié à un id de billet positif");
  }
  public function setComment($comment){
    if(is_string($comment))
      $this->_comment = $comment;
    else
      throw new InvalidArgumentException("Le text du commentaire doit être de type string");
  }
  public function setSignaled($signaled){
    if($signaled == true || $signaled == false)
      $this->_signaled = $signaled;
    else
      throw new InvalidArgumentException("Le variable signaled doit être de type bool");
  }
  public function setName($name){
    if(is_string($name)){
      if(strlen($name) > 255)
        $name = substr($name, 0,255);
      $this->_name = $name;
    }else
      throw new InvalidArgumentException("Le nom du commentaire doit être de type string");
  }
}