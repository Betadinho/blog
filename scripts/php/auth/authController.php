<?php
if (!isset($_SESSION)) {
    // code...
    session_start();
}
require_once 'configure.php';
require 'login.php';
require 'register.php';

$method = $_SERVER['REQUEST_METHOD'];

/*
Determin what type of request was made and act accordingly:
GET: check User credentials against db and give Session when correct
POST: Register User
*/
switch ($method) {
    case 'GET':
        // code...
        // CALL Login Method
        if (isset($_GET['login'])) {
          // code...
          $username = fixInput($_GET['name']);
          $password = fixInput($_GET['password']);

          checkUser($username, $password);

          unset($password);
        }
        if (isset($_GET['logout'])) {
          unset($_SESSION['username']);
          session_destroy();
          $URL = '../../../index.php';
          echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
          exit;
        }
        break;
    case 'POST':
        // code...
        //CALL REGISTER METHOD AND PAS VALUES
        if(isset($_POST['register'])) {
            $username = fixInput($_POST['name']);
            $email = fixInput($_POST['email']);
            $password = fixInput($_POST['password']);
            $passwordConfirm = fixInput($_POST['confirmPassword']);
            //set usertype to user by defau
            $usertype = "user";
            if (isset($_POST['usertype'])) {
            // code...
                $usertype = $_POST['usertype'];
            } else {

            }

            if (filter_var($email, FILTER_VALIDATE_EMAIL) && $password === $passwordConfirm) {
                createUser($username, $password, $email, $usertype);
            } else {
                echo "Passwords must identical to each other";
            }
            unset($password);
        }
        break;
    default:
        break;
    }

function fixInput($data) { //remove potentially harmful characters from input
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
        die("Error while listing users: " . $e->getMessage() . "\n");
      }
      unset($listUsers);
      unset($dbh);

    }
}
?>
