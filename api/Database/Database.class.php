<?php
/**
* Classe qui permet de se connecter à la base de donnée
*/
class Database{



  /**
  * @var string $dbName
  */
  private static $dbName = 'vdurand';






  /**
  * @var string $dbHost
  */
  private static $dbHost = '10.11.1.27';





  /**
  * @var string $dbUser
  */
  private static $dbUser = 'vdurand';




  /**
  * @var string $dbPassword
  */
  private static $dbPassword = 'sio1';



  /**
  * @var object $pdo
  */
  private static $pdo = null;




  public function __construct(){
    die("La fonction d'initialisation est interdite");
  }
  public static function connect(){
    if (null == self::$pdo){
      try{
        self::$pdo = new PDO("mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUser, self::$dbPassword);
      }
      catch(PDOException $e){
        die($e->getMessage());
      }
    }
    return self::$pdo;
  }

  /**
   * Permet de détruire l'objet self::$pdo
   */
  public static function disconnect(){
    self::$pdo = null;
  }

}
function tostring($str){
  return '"'.$str.'"';
}
?>
