<?php
require_once 'configure.php';

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
                  header("location: ../../../private/index.php");
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
