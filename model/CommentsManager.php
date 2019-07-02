<?php
require_once('Manager.php');
require_once('Comment.php');

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

  public function delete($id)
  {
    $db = $this->dbConnect();
    $q = $db->prepare('DELETE FROM comments WHERE id = '.$id);

    $q->bindValue(':id', $id, PDO::PARAM_INT);

    $q->execute();
  }

  public function get($id)
  {
    $id = (int) $id;

    $db = $this->dbConnect();
    $q = $db->query('SELECT id, relativeBillet, DATE_FORMAT(datePublication, "%d/%m/%Y %k:%i") as datePublication, comment, signaled FROM comments WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Billets($donnees);
  }

  public function getList()
  {
    $comments = [];

    $db = $this->dbConnect();
    $q = $db->query('SELECT id, relativeBillet, DATE_FORMAT(datePublication, "%d/%m/%Y %k:%i") as datePublication, comment, signaled FROM comments ORDER BY relativeBillet ASC, datePublication DESC');

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