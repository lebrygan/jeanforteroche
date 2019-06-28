<?php
class CommentsManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Comment $comment)
  {
    $q = $this->_db->prepare('INSERT INTO comments(relativeBillet, datePublication, comment, signaled) VALUES(:relativeBillet, :datePublication, :comment, :signaled)');

    $q->bindValue(':relativeBillet', $comment->relativeBillet(), PDO::PARAM_INT);
    $q->bindValue(':datePublication', $comment->datePublication());
    $q->bindValue(':comment', $comment->comment());
    $q->bindValue(':signaled', $comment->signaled());

    $q->execute();
  }

  public function delete(Comment $comment)
  {
    $this->_db->exec('DELETE FROM comments WHERE id = '.$comment->id());
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, relativeBillet, datePublication, comment, signaled FROM comments WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Billets($donnees);
  }

  public function getList()
  {
    $comment = [];

    $q = $this->_db->query('SELECT id, relativeBillet, datePublication, comment, signaled FROM comments ORDER BY relativeBillet DESC');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $comments[] = new Billets($donnees);
    }

    return $comments;
  }

  public function update(Comment $comment)
  {
    $q = $this->_db->prepare('UPDATE billet SET relativeBillet = :relativeBillet, datePublication = :datePublication, comment = :comment, signaled = :signaled WHERE id = :id');

    $q->bindValue(':relativeBillet', $comment->relativeBillet(), PDO::PARAM_INT);
    $q->bindValue(':datePublication', $comment->datePublication());
    $q->bindValue(':comment', $comment->comment());
    $q->bindValue(':signaled', $comment->signaled());
    $q->bindValue(':id', $comment->id(), PDO::PARAM_INT);

    $q->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
?>