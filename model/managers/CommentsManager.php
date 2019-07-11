<?php
require_once('Manager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/entitys/Comment.php');

class CommentsManager extends Manager
{

  public function add(Comment $comment)
  {
    $db = $this->dbConnect();
    $q = $db->prepare('INSERT INTO comments(relativeBillet, comment, signaled) VALUES(:relativeBillet, :comment, :signaled)');

    $q->bindValue(':relativeBillet', $comment->relativeBillet(), PDO::PARAM_INT);
    $q->bindValue(':comment', $comment->comment());
    $q->bindValue(':signaled', $comment->signaled());

    $q->execute();
  }

  public function delete($id,$relativeBillet = false)
  {
    $db = $this->dbConnect();
    if(!$relativeBillet)
      $q = $db->prepare('DELETE FROM comments WHERE id = :id');
    else
      $q = $db->prepare('DELETE FROM comments WHERE relativeBillet = :id');

    $q->bindValue(':id', $id, PDO::PARAM_INT);

    $q->execute();
  }

  public function get($id)
  {
    $id = (int) $id;

    $db = $this->dbConnect();
    $q = $db->query('SELECT id, relativeBillet, UNIX_TIMESTAMP(datePublication) as datePublication, comment, signaled FROM comments WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Billets($donnees);
  }

  public function getList($id = -1, $signaled = true)
  {
    $comments = [];

    $db = $this->dbConnect();
    if($id == -1 || is_nan($id)){
      if($signaled)
        $q = $db->query('SELECT id, relativeBillet, UNIX_TIMESTAMP(datePublication) as datePublication, comment, signaled FROM comments ORDER BY relativeBillet ASC, datePublication DESC');
      else
        $q = $db->query('SELECT id, relativeBillet, UNIX_TIMESTAMP(datePublication) as datePublication, comment, signaled FROM comments WHERE signaled = 0 ORDER BY relativeBillet ASC, datePublication DESC');
    }
    else{
      if ($signaled) {
        $q = $db->prepare('SELECT id, relativeBillet, UNIX_TIMESTAMP(datePublication) as datePublication, comment, signaled FROM comments WHERE relativeBillet = :id ORDER BY relativeBillet ASC, datePublication DESC');
      }else{
        $q = $db->prepare('SELECT id, relativeBillet, UNIX_TIMESTAMP(datePublication) as datePublication, comment, signaled FROM comments WHERE relativeBillet = :id AND signaled = 0 ORDER BY relativeBillet ASC, datePublication DESC');
      }
      
      $q->bindValue(':id',$id);
      $q->execute();
    }
    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
      $comments[] = new Comment($data);
    }
    return $comments;
  }

  public function getSignaled()
  {
    $db = $this->dbConnect();
    $comments = [];
    $q = $db->query('SELECT id, relativeBillet, UNIX_TIMESTAMP(datePublication) as datePublication, comment, signaled FROM comments WHERE signaled = 1 ORDER BY relativeBillet ASC, datePublication DESC');
    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
      $comments[] = new Comment($data);
    }
    return $comments;
  }

  public function update(Comment $comment)
  {
    $db = $this->dbConnect();
    $q = $db->prepare('UPDATE comments SET relativeBillet = :relativeBillet, datePublication = :datePublication, comment = :comment, signaled = :signaled WHERE id = :id');

    $q->bindValue(':relativeBillet', $comment->relativeBillet(), PDO::PARAM_INT);
    $q->bindValue(':datePublication', $comment->datePublication());
    $q->bindValue(':comment', $comment->comment());
    $q->bindValue(':signaled', $comment->signaled());
    $q->bindValue(':id', $comment->id(), PDO::PARAM_INT);

    $q->execute();
  }

  public function signal($id)
  {
    $db = $this->dbConnect();
    $q = $db->prepare('UPDATE comments SET signaled = true WHERE id = :id');

    $q->bindValue(':id', $id, PDO::PARAM_INT);

    $q->execute();
  }

  public function unSignal($id)
  {
    $db = $this->dbConnect();
    $q = $db->prepare('UPDATE comments SET signaled = false WHERE id = :id');

    $q->bindValue(':id', $id, PDO::PARAM_INT);

    $q->execute();
  }
}