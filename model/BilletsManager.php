<?php
require_once('Manager.php');
require_once('Billet.php');

class BilletsManager extends Manager
{

  public function add(Billet $billet)
  {
    $db = $this->dbConnect();
    $q = $db->prepare('INSERT INTO billets(showOrder, datePublication, published, textPublication) VALUES(:showOrder, :datePublication, :published, :textPublication)');

    $q->bindValue(':showOrder', $billet->showOrder(), PDO::PARAM_INT);
    $q->bindValue(':datePublication', $billet->datePublication());
    $q->bindValue(':published', $billet->published());
    $q->bindValue(':textPublication', $billet->textPublication());

    $q->execute();
  }

  public function delete(Billet $billet)
  {
    $db = $this->dbConnect();
    $db->exec('DELETE FROM billets WHERE id = '.$billet->id());
  }

  public function get($id)
  {
    $id = (int) $id;

    $db = $this->dbConnect();
    $q = $db->query('SELECT id, showOrder, DATE_FORMAT(datePublication, "%d/%m/%Y %k:%i") as datePublication, published, textPublication FROM billets WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Billets($donnees);
  }

  public function getList()
  {
    $billets = [];

    $db = $this->dbConnect();
    $q = $db->query('SELECT id, showOrder, DATE_FORMAT(datePublication, "%d/%m/%Y %k:%i") as datePublication, published, textPublication FROM billets ORDER BY showOrder DESC');

    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
      $billets[] = new Billet($data);
    }

    return $billets;
  }

  public function update(Billet $billet)
  {
    $db = $this->dbConnect();
    $q = $db->prepare('UPDATE billets SET showOrder = :showOrder, datePublication = :datePublication, published = :published, textPublication = :textPublication WHERE id = :id');

    $q->bindValue(':showOrder', $billet->showOrder(), PDO::PARAM_INT);
    $q->bindValue(':datePublication', $billet->datePublication());
    $q->bindValue(':published', $billet->published());
    $q->bindValue(':textPublication', $billet->textPublication());
    $q->bindValue(':id', $billet->id(), PDO::PARAM_INT);

    $q->execute();
  }

}