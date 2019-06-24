<?php
require_once 'configure.php';

function createUser($username, $password, $email) { //input arguments already validated and cleaned!
    $dbh = connect();
    if ($dbh) {
        try {
            //check Database for user with mail or username matching the input and stop if there is one
            $getEmail = $dbh->prepare('SELECT * FROM users WHERE email=:email');
            $getEmail->bindParam(':email', $email);

            // Query DB for Users with matching email
            $getUsername = $dbh->prepare('SELECT * FROM users WHERE username=:username');
            $getUsername->bindParam(':username', $username);

            $dbh->beginTransaction();
            $getEmail->execute();
            $getUsername->execute();

            $getEmail = $getEmail->fetch(\PDO::FETCH_ASSOC);
            $getUsername = $getUsername->fetch(\PDO::FETCH_ASSOC);

            $dbh->commit();

            //Check for users already registered with the input username and email
            $noMatchingUser = true;
            //Handle what happens if the user already exists
            if ($getEmail != null && $getUsername != null) {
                $noMatchingUser = false;
                $URL="../../../index.php";
                echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
            }

            unset($getEmail);
            unset($getUsername);

            //Otherwise Create User with credentials
            if($noMatchingUser) {
                // code...
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $createUser = $dbh->prepare('INSERT INTO users (username, email, password) VALUES(:username, :email, :password)');
                $createUser->bindParam(':username', $username);
                $createUser->bindParam(':email', $email);
                $createUser->bindParam(':password', $hashedPassword);

                $dbh->beginTransaction();
                if ($createUser->execute()) {
                    //Redirect to home
                    $dbh->commit();
                    $URL = '../../../index.php';
                    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                } else {
                    echo "Something went wrong";
                }
            } // End if
        }//End Try
        catch (PDOException $e) {
            $dbh->rollBack();
            die("Error while creating user: " . $e->getMessage() . "\n");
        } //end catch
        unset($createUser);
        unset($dbh);
    } //ejd reoot if
}

 ?>
