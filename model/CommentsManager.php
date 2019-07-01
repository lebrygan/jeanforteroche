<?php
require_once('Manager.php');
require_once('Comment.php');

class CommentsManager extends Manager
{

  public function add(Comment $comment)
  {
    $db = $this->dbConnect();
    $q = $db->prepare('INSERT INTO comments(relativeBillet, datePublication, comment, signaled) VALUES(:relativeBillet, :datePublication, :comment, :signaled)');

    $q->bindValue(':relativeBillet', $comment->relativeBillet(), PDO::PARAM_INT);
    $q->bindValue(':datePublication', $comment->datePublication());
    $q->bindValue(':comment', $comment->comment());
    $q->bindValue(':signaled', $comment->signaled());

    $q->execute();
  }

  public function delete(Comment $comment)
  {
    $db = $this->dbConnect();
    $db->exec('DELETE FROM comments WHERE id = '.$comment->id());
  }

  public function get($id)
  {
    $id = (int) $id;

    $db = $this->dbConnect();
    $q = $db->query('SELECT id, relativeBillet, datePublication, comment, signaled FROM comments WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Billets($donnees);
  }

  public function getList()
  {
    $comments = [];

    $db = $this->dbConnect();
    $q = $db->query('SELECT id, relativeBillet, datePublication, comment, signaled FROM comments ORDER BY relativeBillet ASC, datePublication DESC');

    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
      $comments[] = new Comment($data);
    }
    return $comments;
  }

  public function update(Comment $comment)
  {
    $db = $this->dbConnect();
    $q = $db->prepare('UPDATE billet SET relativeBillet = :relativeBillet, datePublication = :datePublication, comment = :comment, signaled = :signaled WHERE id = :id');

    $q->bindValue(':relativeBillet', $comment->relativeBillet(), PDO::PARAM_INT);
    $q->bindValue(':datePublication', $comment->datePublication());
    $q->bindValue(':comment', $comment->comment());
    $q->bindValue(':signaled', $comment->signaled());
    $q->bindValue(':id', $comment->id(), PDO::PARAM_INT);

    $q->execute();
  }
}