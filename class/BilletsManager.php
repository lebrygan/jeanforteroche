<?php
class BilletsManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Billets $billet)
  {
    $q = $this->_db->prepare('INSERT INTO billets(showOrder, datePublication, published, textPublication) VALUES(:showOrder, :datePublication, :published, :textPublication)');

    $q->bindValue(':showOrder', $billet->showOrder(), PDO::PARAM_INT);
    $q->bindValue(':datePublication', $billet->datePublication());
    $q->bindValue(':published', $billet->published());
    $q->bindValue(':textPublication', $billet->textPublication());

    $q->execute() or die(print_r($this->_db->errorInfo()));
  }

  public function delete(Billets $billet)
  {
    $this->_db->exec('DELETE FROM billets WHERE id = '.$billet->id());
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, showOrder, datePublication, published, textPublication FROM billets WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Billets($donnees);
  }

  public function getList()
  {
    $billets = [];

    $q = $this->_db->query('SELECT id, showOrder, datePublication, published, textPublication FROM billets ORDER BY showOrder DESC');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $billets[] = new Billets($donnees);
    }

    return $billets;
  }

  public function update(Billets $billet)
  {
    $q = $this->_db->prepare('UPDATE billet SET showOrder = :showOrder, datePublication = :datePublication, published = :published,\
    		 textPublication = :textPublication WHERE id = :id');

    $q->bindValue(':showOrder', $billet->showOrder(), PDO::PARAM_INT);
    $q->bindValue(':datePublication', $billet->datePublication());
    $q->bindValue(':published', $billet->published());
    $q->bindValue(':textPublication', $billet->textPublication());
    $q->bindValue(':id', $billet->id(), PDO::PARAM_INT);

    $q->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
?>