<?php
define("ROOT", str_replace('scripts\php\auth', '', __DIR__));
  function connect() {
      try {
        $dbh = new PDO('sqlite:' . ROOT . '\db\database.db', '', '', array(
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
        return $dbh;
      } catch (PDOException $e) {
        die("Unable to connect: " . $e->getMessage() . "\n");
        return NULL;
      }
  }
?>
