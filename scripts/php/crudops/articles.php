<?php
if (!isset($_SESSION)) {
    // code...
    session_start();
}
define("ROOTE", str_replace('scripts\php\crudops', '', __DIR__));
require_once ROOTE . 'scripts/php/auth/configure.php';

//Check if a delete request for an article was send
if ( isset($_POST['postDeleteID']) )  {
    if ($_SESSION['username'] == $_POST['author'] || $_SESSION['usertype'] == "admin") {
        deleteArticle($_POST['postDeleteID']);
        $URL = '../../../private/index.php';
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
} elseif ( isset($_GET['postEditID'])  && isset($_GET['postEditAuthor']))  {
    if ($_SESSION['username'] == $_GET['postEditAuthor'] || $_SESSION['usertype'] == "admin") {
        getEditArticleForm($_GET['postEditID']);
    }
} elseif ( isset($_POST['postEditID']) && isset($_POST['submit-edit-post']) )  {
    if ($_SESSION['username'] == $_POST['postEditAuthor'] || $_SESSION['usertype'] == "admin") {
        $id = $_POST['postEditID'];
        $title = $_POST['edit-post-title'];
        $description = $_POST['edit-post-description'];
        $content = $_POST['edit-post-content'];
        editArticle($id, $title, $description, $content);
        $URL = "/blog/private/displaySingleArticle.php/?id=" . $id;
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
}

function deleteArticle($id) {
    $dbh = connect();
    if($dbh) {
        try {

            $deleteArticle = $dbh->prepare('DELETE FROM posts WHERE id=:id');
            $deleteArticle->bindParam(':id', $id);
            $dbh->beginTransaction();
            $deleteArticle->execute();
            $dbh->commit();
            unset($dbh);
        } catch (\PDOException $e) {
            echo "something went wrong while deleting a post: \n" . $e . "\n";
            unset($dbh);
        }
    }
}
function displayArticle($id) {
    $dbh = connect();
    if($dbh) {
        try {

            $readArticle = $dbh->prepare('SELECT * FROM posts WHERE id=:id');
            $readArticle->bindParam(':id', $id);
            $dbh->beginTransaction();
            $readArticle->execute();
            $dbh->commit();
            $article = $readArticle->fetchAll(\PDO::FETCH_ASSOC);

            renderArticle($article, $_SESSION);
            unset($dbh);
        } catch (\PDOException $e) {
            echo "something went wrong while reading a post: \n" . $e . "\n";
            unset($dbh);
        }
    }
}

function editArticle($id, $title, $description, $content) {
    $dbh = connect();
    if($dbh) {
        try {
            $editArticle = $dbh->prepare('UPDATE posts SET title = :title, description = :description, content = :content WHERE id=:id');
            $editArticle->bindParam(':id', $id);
            $editArticle->bindParam(':title', $title);
            $editArticle->bindParam(':description', $description);
            $editArticle->bindParam(':content', $content);
            $dbh->beginTransaction();
            if ($editArticle->execute()) {
                $dbh->commit();
            }
            unset($dbh);
        } catch (\PDOException $e) {
            echo "something went wrong while reading a post: \n" . $e . "\n";
            unset($dbh);
        }
    }
}
function listArticles(){
    /*
    Connect to database,, get posts and display them as part of a outlining collection
    defined AROUND THE FUNCTION CALL IN THE FILE MAKING THE CALL
    */

    try {
        $dbh = connect();
        $getArticles = $dbh->prepare('SELECT * FROM posts');

        $dbh->beginTransaction();
        $getArticles->execute();
        $dbh->commit();

        $articles = $getArticles->fetchAll(\PDO::FETCH_ASSOC);

        renderArticleList($articles, $_SESSION);
    } catch (\PDOException $e) {
        echo "Something went wrong listing posts: " . $e->getMessage() . "\n";
    }


    unset($dbh);
    unset($getArticles);
}

function renderArticleList($articles, $session) {
    foreach ($articles as $article) {
        // code...
        echo '
        <li class="container white col s12 black-text">
                <div class="row">
                    <a href="/blog/private/displaySingleArticle.php/?id='.$article['id'].'" class="left-align"><h4>'.$article['title'].'</h4></a>
                </div>
                <div class="row">
                    <div class="col left">
                        <p class=" flow-text left-align">
                        '. $article['description'] .'
                        </p>
                    </div>
                </div>
                <div class="row">
                <div class="valign-wrapper right">
                        <a href="" class="col left "><p>By <b>'. $article['author'] .'</b></p></a>
                        <p class="col left"> '. $article['created_at'] .'</p>';
                    // When a user is logged in and the article belongs to him or is an admin: display delete and edit buttons
                    if (isset($session['username'])) {
                        if ($article['author'] == $session['username'] || $session['usertype'] == "admin") {
                            echo'
                                <form class="col right" action="/blog/scripts/php/crudops/articles.php" method="post">
                                    <input type="hidden" value="'. $article['id'].'" name="postDeleteID"  />
                                    <input type="hidden" value="'. $article['author'].'" name="author"  />
                                    <button class="btn red darken-1" type="submit">
                                    <i class="medium material-icons">delete</i>
                                    </button>
                                </form>
                                <form class="col right" action="/blog/private/editArticle.php" method="get">
                                    <input type="hidden" value="'. $article['id'].'" name="postEditID"  />
                                    <input type="hidden" value="'. $article['author'].'" name="postEditAuthor"  />
                                    <button class="btn waves-effect waves yellow yellow darken-1" type="submit">
                                    <i class="medium material-icons">border_color</i>
                                    </button>
                                </form>';
                        }
                    }
                    echo'<a href="/blog/private/displaySingleArticle.php/?id='.$article['id'].'" class="col right"><i class="small material-icons">arrow_forward</i></a>
                </div>
            </div>
        </li>
        <div class="devider"></div>
        ';
    }
}
function renderArticle($articles, $session) {
    foreach ($articles as $article) {
        // code...
        echo '
        <div class="flow-text white">
            <div class="row">
                <a href="/blog/private/displaySingleArticle.php/?id='.$article['id'].'" class="col left-align"><h4>'.$article['title'].'</h4></a>
                <p class="col right"> '. $article['created_at'] .'</p>
                <a href="#" class="col right "><p>By <b>'. $article['author'] .'</b></p></a>
            </div>
            <div class="row">
                <div class="col left">
                    <p class=" flow-text left-align">
                    '. $article['description'] .'
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col left">
                    <p class=" flow-text left-align">
                    '. $article['content'] .'
                    </p>
                </div>
            </div>
            <div class="row">
            <a href="/blog/private/index.php" class="col left"><i class="small material-icons">arrow_backward</i></a>
            <div class="valign-wrapper right">
                <a href="#" class="col left "><p>By <b>'. $article['author'] .'</b></p></a>
                <p class="col left"> '. $article['created_at'] .'</p>';
            // When a user is logged in and the article belongs to him or is an admin: display delete and edit buttons
                if (isset($session['username'])) {
                    if ($article['author'] == $session['username'] || $session['usertype'] == "admin") {
                        echo'
                            <form class="col right" action="/blog/scripts/php/crudops/articles.php" method="post">
                                <input type="hidden" value="'. $article['id'].'" name="postDeleteID"  />
                                <input type="hidden" value="'. $article['author'].'" name="author"  />
                                <button class="btn red darken-1" type="submit">
                                <i class="medium material-icons">delete</i>
                                </button>
                            </form>
                            <form class="col right" action="/blog/private/editArticle.php" method="get">
                                <input type="hidden" value="'. $article['id'].'" name="postEditID"  />
                                <input type="hidden" value="'. $article['author'].'" name="postEditAuthor"  />
                                <button class="btn waves-effect waves yellow yellow darken-1" type="submit">
                                <i class="medium material-icons">border_color</i>
                                </button>
                            </form>';
                    }
                }
                echo'
            </div>
        </div>
        </div>
        <div class="devider"></div>
        ';
    }
}

function getEditArticleForm($id) {
    $dbh = connect();
    if($dbh) {
        try {

            $readArticle = $dbh->prepare('SELECT * FROM posts WHERE id=:id');
            $readArticle->bindParam(':id', $id);
            $dbh->beginTransaction();
            $readArticle->execute();
            $dbh->commit();
            $articles = $readArticle->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($articles as $article) {
                echo '
                    <div class=" center">
                        <form action="/blog/scripts/php/crudops/articles.php" method="post">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input value="'. $article['title'] .'" id="title" type="text" class="validate" name="edit-post-title" required>
                                    <label for="title">Post Title</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input value="'. $article['description'] .'" id="post-description" type="text" class="validate" name="edit-post-description" required>
                                    <label for="post-description">Post Description </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="post-content" class="materialize-textarea validate" name="edit-post-content" required>'. $article['content'] .'</textarea>
                                    <label for="post-content">Post Content</label>
                                </div>
                            </div>
                            <div class="row">
                                <input type="hidden" value="'.$article['id'].'" name="postEditID"  />
                                <input type="hidden" value="'.$article['author'].'" name="postEditAuthor"  />
                                <div class="input-field col s12">
                                    <button tpye="submit" class="waves-effect waves-light btn" name="submit-edit-post">Confirm Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                ';
            }
            unset($dbh);
        } catch (\PDOException $e) {
            echo "something went wrong while reading a post: \n" . $e . "\n";
            unset($dbh);
        }
    }


}
 ?>
