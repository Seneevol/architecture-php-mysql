<!--
  Script config connexion DB
-->
<?php
// On définit la class Database
class Database
{
  /* 
   * On définit nos variables
   */

  // connexion mysql
  private static $dbName = 'mydb';
  private static $dbHost = 'localhost';
  private static $dbUsername = 'nakad';
  private static $dbUserPassword = 'nakad976';

  // la connexion exporter
  private static $cont  = null;

  // fonction d'erreur
  public function __construct() {
    die('Init function is not allowed');
  }

  // fonction de connexion
  public static function connect() {
    // Une connexion à travers toute l'application
    if (null == self::$cont) {
      // j'essaie
      try {
        // On définit notre connexion qui est un nouvelle objet du constructeur PDO (notre connexion avec notre db)
        self::$cont =  new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
      // si j'arrive pas
      } catch (PDOException $e) {
        // je renvoie un message d'erreur
        die($e->getMessage());
      }
    }
    // je retourne le cont connecter ou pas si il ya ou un soucis avant
    return self::$cont;
  }

  // la fonction pour ce déconnecter
  public static function disconnect() {
    // et on définit notre connexion sur null
    self::$cont = null;
  }
}
?>