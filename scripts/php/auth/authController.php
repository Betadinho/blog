<?php
require_once 'configure.php';
require 'login.php';
require 'register.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // code...
        // CALL Login Method
        login();
        break;
    case 'POST':
        // code...
        //CALL REGISTER METHOD AND PAS VALUES
        register();
        break;
    default:
        // code...
        break;
}

function listUsers() {
  listUsersInterface();
}

function listUsersInterface() {
  $dbh = connect();
    if ($dbh) {
      try {
        $listUsers = $dbh->prepare('SELECT * FROM users');
        $dbh->beginTransaction();
        $listUsers->execute();
        $dbh->commit();
        $result = $listUsers->fetchAll(\PDO::FETCH_ASSOC);
          foreach ($result as $row) {
            print_r($row);
            echo "<br>";
          }

      } catch (PDOException $e) {
        $dbh->rollBack();
        die("Error while listing users: " . $e->getMessage() . "\n");
      }
      unset($listUsers);
      unset($dbh);

    }
}
?>
