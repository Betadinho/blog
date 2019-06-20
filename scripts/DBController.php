<?php
require 'configure.php';

if(isset($_POST['submit'])) {
  $username = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  createUser($username, $password, $email);
  echo 'User Registered!';
}

if (isset($_POST['login'])) {
  // code...
  $username = $_POST['name'];
  $password = $_POST['password'];
  login($username, $password);
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
        $createUser->execute();
        $dbh->commit();
        echo "User created\n";
      } catch (PDOException $e) {
        $dbh->rollBack();
        die("Error while creating user: " . $e->getMessage() . "\n");
      }

    }
}

function login($username, $password) {
  $dbh = connect();
    if ($dbh) {
      try {
          $getPassword = $dbh->prepare('SELECT password FROM users WHERE username=:username' );
          $getPassword->bindParam('username', $username);
          $dbh->beginTransaction();
          $getPassword->execute();
          $dbh->commit();
          $hash = $getPassword->fetchAll(\PDO::FETCH_COLUMN);
          $hash = $hash[0];
          if (password_verify($password, $hash)) {
            echo 'it worked';
          } else {
            echo "couldnt log in \n";
          }
        } catch (PDOException $e) {
          die("Error while loggin in: " . $e->getMessage(). "\n");
        }

    }
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

    }
}

function SetupDB() {
  $createPostTable = NULL;
  $createUserTable = NULL;
  $createCommentTable = NULL;

  try {
    $dbh = new PDO('sqlite:C:\xampp\htdocs\blog\db\database.db', '', '', array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
    echo "connected";
    echo "<br>";
  } catch (Exception $e) {
    die('Unable to connect: '. $e->getMessage() . "\n");
  }

  if ($dbh) {
      try {
          $createPostTable = $dbh->prepare( 'CREATE TABLE IF NOT EXISTS posts (
              id INTEGER PRIMARY KEY AUTOINCREMENT,
              title VARCHAR(50) NOT NULL,
              content TEXT(255) NOT NULL,
              created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
              author VARCHAR(50) NOT NULL,
              FOREIGN KEY(author) references users(username)
          );');
          $dbh->beginTransaction();
          $createPostTable->execute();
          $dbh->commit();
          echo "Table created";
          echo "<br>";
      } catch (PDOException $e) {
          die("Encounteresd an error while preparing statement:" . $e . "\n");
      }

  }

  if ($dbh) {
      try {
          $createCommentTable = $dbh->prepare( 'CREATE TABLE IF NOT EXISTS comments (
              id INTEGER PRIMARY KEY AUTOINCREMENT,
              title VARCHAR(25) NOT NULL,
              content TEXT(255) NOT NULL,
              created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
              author VARCHAR(50) NOT NULL,
              postTitle VARCHAR(50) NOT NULL,
              FOREIGN KEY(author) references users(author),
              FOREIGN KEY(postTitle) references posts(id)
          );');
            $dbh->beginTransaction();
            $createCommentTable->execute();
            $dbh->commit();
            echo "Table created";
            echo "<br>";
      } catch (PDOException $e) {
          die("Encounteresd an error while preparing statement:" . $e . "\n");
      }

  }

  if ($dbh) {
      try {
          $createUserTable = $dbh->prepare( 'CREATE TABLE IF NOT EXISTS users (
              id INTEGER PRIMARY KEY AUTOINCREMENT,
              username VARCHAR(50) NOT NULL UNIQUE,
              email VARCHAR(50) NOT NULL UNIQUE,
              password VARCHAR(255) NOT NULL,
              created_at DATETIME DEFAULT CURRENT_TIMESTAMP
          );');
          $dbh->beginTransaction();
          $createUserTable->execute();
          $dbh->commit();
          echo "Table created";
          echo "<br>";
      } catch (PDOException $e) {
          die("Could not create table:" . $e . "\n");
      }
  }

}


//createUser("test12", "test12", "test12"); WORKS
?>
