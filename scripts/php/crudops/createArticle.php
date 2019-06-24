<?php
include_once 'scripts/php/auth/configure.php';
$createPost = $dbh = $title = $content = $username = '';


if (isset($_POST) && $_POST['task'] == 'create_post') {
    // $title = fixCreatePostInput($_POST['title']);
    // $content = fixCreatePostInput($_POST['content']);
    // $username = fixCreatePostInput($_POST['username']);
    $title = "TEST";
    $content = "TESTCONTENTVORSCHAUAMINAKOYUM";
    $username = "TESTAUTHOR";

    // code...
    //get database connection
    $dbh = connect();
    if ($dbh) {
        $createPost = $dbh->prepare('INSERT INTO posts (title, content, author) VALUES (:title, :content, :author)');
        $createPost->bindParam(':title', $title);
        $createPost->bindParam(':content', $content);
        $createPost->bindParam(':author', $username);

        $dbh->beginTransaction();
        $createPost->execute();
        $dbh->commit();
    }

    unset($createPost);
    unset($dbh);
}

function fixCreatePostInput($data) { //remove potentially harmful characters from input
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
 ?>
