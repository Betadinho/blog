<?php
require_once 'configure.php';
function login() {
    $username = $email = $password = $passwordConfirm = "";

    if (isset($_GET['login'])) {
      // code...
      $username = fixInput($_POST['name']);
      $password = fixInput($_POST['password']);
      checkUser($username, $password);
      unset($password);
      header("location: ../../../private/index.php");
    }
}

function fixInput($data) { //remove potentially harmful characters from input
    $data = trim($data);;
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function checkUser($username, $password) {
    $dbh = connect();
    if ($dbh) {
        try {
            $getPassword = $dbh->prepare('SELECT password FROM users WHERE username=:username' );
            $getPassword->bindParam('username', $username);
            $dbh->beginTransaction();
            if ($getPassword->execute()) {
                $dbh->commit();
                $hash = $getPassword->fetchAll(\PDO::FETCH_COLUMN);
                $hash = $hash[0];
                if (password_verify($password, $hash)) { //Create a User Session if Login Succeds
                    //Create Session for User

                } else {
                    echo "couldnt log in \n";
                }
            }
        } catch (PDOException $e) {
            die("Error while loggin in: " . $e->getMessage(). "\n");
        }
        unset($getPassword);
        unset($dbh);

    }
}
 ?>
