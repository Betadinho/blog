<?php
//session_start();
require_once 'configure.php';

function checkUser($username, $password) { //validate user login aatempt and create session if successfull
    $dbh = connect();
    if ($dbh) {
        try {
            $getUser = $dbh->prepare('SELECT * FROM users WHERE username=:username' );
            $getUser->bindParam('username', $username);
            $dbh->beginTransaction();
            if ($getUser->execute()) {
                $dbh->commit();
                $user = $getUser->fetchAll(\PDO::FETCH_ASSOC);
                $user = $user[0];
                $usertype = $user['usertype'];
                $hash = $user['password'];
                //unset($getPassword);

                unset($user);
                unset($dbh);
                if (password_verify($password, $hash)) { //Create a User Session if Login Succeds
                    //Create Session for
                    $_SESSION['username'] = $username;
                    $_SESSION['usertype'] = $usertype;
                    $URL = '../../../private/index.php';
                    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                } else {
                    echo "Wrong Login Credentials\n";
                }
            }
        } catch (PDOException $e) {
            die("Error while loggin in: " . $e->getMessage(). "\n");
        }


    }
}
 ?>
