<?php
require_once('DbObject.php');

class Comment extends DbObject{

  private $_id,
          $_relativeBillet,
          $_datePublication,
          $_comment,
          $_signaled;

  public function __construct(array $donnees){
    $this->hydrate($donnees);
  }

  //Getters and setters

  public function id(){return $this->_id;}
  public function relativeBillet(){return $this->_relativeBillet;}
  public function datePublication(){return $this->_datePublication;}
  public function comment(){return $this->_comment;}
  public function signaled(){return $this->_signaled;}

  public function setId($id){
    $id = (int) $id;
    if($id > 0)
      $this->_id = $id;
  }
  public function setRelativeBillet($relativeBillet){
    $relativeBillet = (int) $relativeBillet;
    if($relativeBillet > 0)
      $this->_relativeBillet = $relativeBillet;
  }
  public function setDatePublication($datePublication){
    if(preg_match("#^([0-9]{2}.?){5,6}$#", $datePublication))
      $this->_datePublication = $datePublication;
  }
  public function setComment($comment){
    if(is_string($comment))
      $this->_comment = $comment;
  }
  public function setSignaled($signaled){
    if($signaled == true || $signaled == false)
      $this->_signaled = $signaled;
  }

  //Debbug
  public function showInformation(){
    return 'id :'.$this->_id.' relativeBillet: '.$this->_relativeBillet.' datePublication: '.$this->_datePublication.' signaled: '.$this->_signaled.' comment: '.$this->_comment;
  }
}

  ?>