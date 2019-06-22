<?php
require_once 'configure.php';
function register() {
    $username = $email = $password = $passwordConfirm = "";

    if(isset($_POST['register'])) {
      $username = fixInput($_POST['name']);
      $email = fixInput($_POST['email']);
      $password = fixInput($_POST['password']);
      $passwordConfirm = fixInput($_POST['confirmPassword']);

      createUser($username, $password, $email);
      unset($password);
    }
}

function fixInput($data) { //remove potentially harmful characters from input
    $data = trim($data);;
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function createUser($username, $password, $email) {
    $dbh = connect();
    if ($dbh) {
        try {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $createUser = $dbh->prepare('INSERT INTO users (username, email, password) VALUES(:username, :email, :password)');
            $createUser->bindParam(':username', $username);
            $createUser->bindParam(':email', $email);
            $createUser->bindParam(':password', $hashedPassword);

            $dbh->beginTransaction();
            if ($createUser->execute()) {
                //Redirect to home
                $dbh->commit();
                header("location: ../../../index.php");
            } else {
                echo "Something went wrong";
            }
        } catch (PDOException $e) {
            $dbh->rollBack();
            die("Error while creating user: " . $e->getMessage() . "\n");
        }
        unset($createUser);
        unset($dbh);
    }
}

 ?>
