<!DOCTYPE html>
<?php
session_start();
//Creates all database tables (users, posts, comments) if not there already
//include 'scripts/php/tempscripts/createdb.php';

if (isset($_SESSION['username'])) {
    $URL = 'private/index.html';
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    exit;
    // code...
}
require_once 'scripts/php/auth/configure.php'; ?>
<html lang="en">
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="/blog/styles/main.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog/Article CMS</title>
</head>
<body>

      <!-- Navbar goes here -->
  <?php require_once ROOT.'templates/nav.php';?>
  <!-- Page Layout here -->
  <div class="section">
        <div class="container center">

            <?php
            include_once 'scripts/php/auth/authController.php';
            include_once 'templates/cards.php';
            include 'scripts/php/crudops/articles.php';
            ?>
            <div class="row">
              <div class="col s12 right teal">
              <h4 class="white-text">Recent Articles</h4>
                <ul class="collection collection-with-header row">
                <?php
                    listArticles();
                ?>
                </ul>
              </div>
            </div>
        </div>
    </div> <!-- content end -->


  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    $(document).ready(function () {
        $('.modal').modal();
        $('.sidenav').sidenav();
        $('select').formSelect();
      });
  </script>
</body>
</html>
