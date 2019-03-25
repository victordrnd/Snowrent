<?php
/**
* Classe qui permet la lecture et l'écriture dans la base de donnée
*/
class Crud extends Database
{

  public function __construct(){

  }

  /**
  * Permet de sélectionner des données dans la base de données
  * @param string $table
  * @param string $row
  * @param string $where
  * @param int $zip
  * @param string $order
  * @param string $groupby
  * @return array
  */
  public function select($table, $row = "*", $where=null, $order=null, $groupby = null){
    $query = 'SELECT '.$row.' FROM '.$table;
    if($where != null){
      $query .= ' WHERE '.$where;
    }

    if($order !=null){
      $query .= ' ORDER BY '.$order;
    }
    if ($groupby !=null){
      $query .= ' GROUP BY '.$groupby;
    }
    //echo $query;
    return $this->query($query);
  }

  /**
  * Permet d'insérer des données dans la base de données
  * @param string $table
  * @param string $value
  * @param array $row
  * @return void
  */
  public function insert($table, $value, $row=null){
    $query = ' INSERT INTO '.$table;
    if($row !=null){
      $query .= ' (' . $row . ')';
    }
    for($i=0; $i<count($value); $i++){
      if(is_string($value[$i])){

      }
    }
    $value = implode(',',$value);
    $query.= ' VALUES ('.$value.')';
    //echo $query;
    return;
  }

  /**
  * Permet de supprimer des données dans la base de données
  * @param string $table
  * @param string $where
  * @return void
  */
  public function delete($table, $where=null){
    if($where == null){
      $query = 'DELETE '.$table;
    }
    else{
      $query = 'DELETE FROM '.$table.' WHERE '.$where;
    }
    return;
  }
  /**
  * Permet de modifier des données dans la base de données
  * @param string $table
  * @param array $rows
  * @param string $where
  * @return void
  */
  public function update($table, $rows, $where){
    //Gestion de la valeur de $where
      $query = 'UPDATE '.$table.' SET ';
      $keys = array_keys($rows);
      for($i = 0; $i < count($rows); $i++){
        if(is_string($rows[$keys[$i]])){
          $query .= $keys[$i].' ="'.$rows[$keys[$i]].'"';
        }
        else{
          $query .= $keys[$i].'='.$rows[$keys[$i]];
        }
        if($i != count($rows)-1){
          $query .= ',';
        }
      }
      $query .= ' WHERE '.$where;
      //echo $query;
      return;

  }
  /**
  * Permet d'exécuter la requête
  * @param string $requete
  * @return array
  */
  public function query($requete){
    $req = Database::connect()->prepare($requete);
    $req->execute();
    $selectinfo = $req->fetchAll();
    return $selectinfo;
  }

}
?>
