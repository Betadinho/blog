<?php
  function connect() {
      try {
        $dbh = new PDO('sqlite:C:\xampp\htdocs\blog\db\database.db', '', '', array(
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
        echo "Connected \n";
        echo "<br>";
        return $dbh;
      } catch (PDOException $e) {
        die("Unable to connect: " . $e->getMessage() . "\n");
        return NULL;
      }
  }
?>
