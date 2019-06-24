<?php
require_once ROOT.'scripts/php/auth/configure.php';
function listArticles(){
    /*
    Connect to database,, get posts and display them as part of a collection

    */

    $dbh = connect();
    $getArticles = $dbh->prepare('SELECT * FROM posts');

    $dbh->beginTransaction();
    $getArticles->execute();
    $dbh->commit();

    $getArticles = $getArticles->fetchAll(\PDO::FETCH_ASSOC);
    foreach ($getArticles as $article) {
        echo '
            <li class="container white col s12">
                <div>
                    <a href="#" class="left-align"><h4>'.$article['title'].'</h4></a>
                </div>
                <div>
                    <p class=" flow-text truncate">
                        '. $article['description'] .'
                    </p>
                    <a href="#" class="right">By '. $article['author'] .'</a>
                </div>
            </li>
            <div class="devider"></div>
        ';
    }

    unset($dbh);
    unset($getArticles);
}

 ?>
