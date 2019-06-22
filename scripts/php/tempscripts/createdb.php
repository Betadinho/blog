<?php
  $createPostTable = NULL;
  $createUserTable = NULL;
  $createCommentTable = NULL;

  try {
    $dbh = new PDO('sqlite:/blog/db/database.db', '', '', array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
    echo "connected";
    echo "<br>";
  } catch (Exception $e) {
    die('Unable to connect: '. $e->getMessage() . "\n");
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
  } catch (PDOException $e) {
    die("CEncounteresd an error while preparing statement: " . $e . "\n");
  }

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
  } catch (PDOException $e) {
    die("Encounteresd an error while preparing statement:" . $e . "\n");
  }

}

if ($createUserTable) {
  try {
    $createUserTable->execute();
    echo "Table created";
    echo "<br>";
  } catch (PDOException $e) {
    die("Could not create table:" . $e . "\n");
  }
}

if ($createPostTable) {
  try {
    $createPostTable->execute();
    echo "Table created";
    echo "<br>";
  } catch (PDOException $e) {
    die("Could not create table:" . $e . "\n");
  }
}

if ($createCommentTable) {
  try {
    $createCommentTable->execute();
    echo "Table created";
    echo "<br>";
  } catch (PDOException $e) {
    die("Could not create table:" . $e . "\n");
  }
}



?>
