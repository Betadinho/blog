<?php
  $createPostTable = NULL;
  $createUserTable = NULL;
  $createCommentTable = NULL;

  try {
    $dbh = new PDO('sqlite:C:\xampp\htdocs\blog\db\database.db', '', '', array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
  } catch (Exception $e) {
    die('Unable to connect: '. $e->getMessage() . "\n");
  }

if ($dbh) {
  try { //Add permission collumn to table
      $createUserTable = $dbh->prepare( 'CREATE TABLE IF NOT EXISTS users (
          id INTEGER PRIMARY KEY AUTOINCREMENT,
          username VARCHAR(50) NOT NULL UNIQUE,
          email VARCHAR(50) NOT NULL UNIQUE,
          usertype VARCHAR(50) NOT NULL,
          password VARCHAR(255) NOT NULL,
          created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );');
  } catch (PDOException $e) {
    die("Encountered an error while preparing statement: " . $e . "\n");
  }
}


if ($dbh) {
  try {
      $createPostTable = $dbh->prepare( 'CREATE TABLE IF NOT EXISTS posts (
          id INTEGER PRIMARY KEY AUTOINCREMENT,
          title VARCHAR(50) NOT NULL UNIQUE,
          description VARCHAR(100) NOT NULL,
          content TEXT NOT NULL,
          created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
          author VARCHAR(50) NOT NULL,
          FOREIGN KEY(author) references users(username)
        );');
  } catch (PDOException $e) {
    die("Encountered an error while preparing statement:" . $e . "\n");
  }
}


if ($dbh) {
  try {
      $createCommentTable = $dbh->prepare( 'CREATE TABLE IF NOT EXISTS comments (
          id INTEGER PRIMARY KEY AUTOINCREMENT,
          content TEXT NOT NULL,
          created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
          author VARCHAR(50) NOT NULL,
          postTitle TEXT NOT NULL,
          FOREIGN KEY(author) references users(id),
          FOREIGN KEY(postTitle) references posts(title)
        );');
  } catch (PDOException $e) {
    die("Encounteresd an error while preparing statement:" . $e . "\n");
  }
}

if ($createUserTable) {
  try {
    $dbh->beginTransaction();
    $createUserTable->execute();
    echo "User Table created";
    echo "<br>";
  } catch (PDOException $e) {
    die("Could not create user table:" . $e . "\n");
    exit;
} $dbh->commit();
}

if ($createPostTable) {
  try {
    $dbh->beginTransaction();
    $createPostTable->execute();
    echo " Post Table created";
    echo "<br>";
  } catch (PDOException $e) {
    die("Could not create post table:" . $e . "\n");
    exit;
} $dbh->commit();
}

if ($createCommentTable) {
  try {
      $dbh->beginTransaction();
    $createCommentTable->execute();
    echo "Comment Table created";
    echo "<br>";
  } catch (PDOException $e) {
    die("Could not create comment table:" . $e . "\n");
    exit;
} $dbh->commit();
}

unset($dbh);
?>
