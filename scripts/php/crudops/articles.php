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
            <li class="collection-item col s12">
                <div>
                    <a href="#"><h4>Test Article</h4></a>
                    <p class="flow-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos,
                    </p>
                </div>
            </li>
            <div class="devider"></div>
        ';
    }

    unset($dbh);
    unset($getArticles);
}

 ?>
