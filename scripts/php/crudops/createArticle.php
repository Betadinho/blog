<?php
if (!isset($_SESSION)) {
    // code...
    session_start();
}
include_once '../auth/configure.php';
$createPost = $dbh = $title = $content = $username = $description = '';


if (isset($_POST) && isset($_POST['submit-post'])) {
    $title = fixCreatePostInput($_POST['post-title']);
    $content = fixCreatePostInput($_POST['post-content']);
    $username = fixCreatePostInput($_SESSION['username']);

    // code...
    //get database connection
    $dbh = connect();
    if ($dbh) {
        $createPost = $dbh->prepare('INSERT INTO posts (title, content, author, description) VALUES (:title, :content, :author, :description)');
        $createPost->bindParam(':title', $title);
        $createPost->bindParam(':content', $content);
        $createPost->bindParam(':author', $username);
        $createPost->bindParam(':description', $description);

        $dbh->beginTransaction();
        if ($createPost->execute()) {
            // code...
            $dbh->commit();
            $URL = '../../../private/index.php';
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        } else {
            echo "Some Issue occured while creating a new post!";
        }
    }

}
//remove potentially harmful characters from input: /,
function fixCreatePostInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
 ?>
