<?php
require_once('Manager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/projet4/model/entitys/Billet.php');

class BilletsManager extends Manager
{

  public function add(Billet $billet)
  {
    $db = $this->dbConnect();
    $q = $db->prepare('INSERT INTO billets(published, textPublication) VALUES(:published, :textPublication)');

    $q->bindValue(':published', $billet->published());
    $q->bindValue(':textPublication', $billet->textPublication());

    $q->execute();
  }

  public function delete($id)
  {
    $db = $this->dbConnect();
    $q = $db->prepare('DELETE FROM billets WHERE id = :id');
    $q->bindValue(':id', $id, PDO::PARAM_INT);
    $q->execute();
  }

  public function get($id)
  {
    $id = (int) $id;

    $db = $this->dbConnect();
    $q = $db->query('SELECT id, UNIX_TIMESTAMP(datePublication) as datePublication, published, textPublication FROM billets WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Billets($donnees);
  }

  public function getList($published = false)
  {
    $billets = [];
    $db = $this->dbConnect();
    if(!$published)
      $q = $db->query('SELECT id, UNIX_TIMESTAMP(datePublication) as datePublication, published, textPublication FROM billets ORDER BY id DESC');
    else
      $q = $db->query('SELECT id, UNIX_TIMESTAMP(datePublication) as datePublication, published, textPublication FROM billets WHERE published = 1 ORDER BY id DESC');

    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
      $billets[] = new Billet($data);
    }

    return $billets;
  }

  public function update(Billet $billet)
  {
    $db = $this->dbConnect();
    $q = $db->prepare('UPDATE billets SET published = :published, textPublication = :textPublication WHERE id = :id');

    $q->bindValue(':published', $billet->published());
    $q->bindValue(':textPublication', $billet->textPublication());
    $q->bindValue(':id', $billet->id(), PDO::PARAM_INT);

    $q->execute();
  }

}