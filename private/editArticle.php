<!DOCTYPE html>
<?php
session_start();
if ( !(isset($_SESSION['username'])) ) {
    header('location: ../');
    exit;
}
require_once '../scripts/php/auth/configure.php';
?>

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
  <?php require_once '../templates/nav_private.php'; ?>
  <!-- Page Layout here -->
  <div class="container center">
      <h2>Edit Article</h2>
          <?php //include 'templates/sidebar.php'; ?>

      <div class="section">
        <div class="container center">

        <?php
        //include 'scripts/createdb.php';
        include_once '../scripts/php/auth/authController.php';
        include '../scripts/php/crudops/articles.php';
        ?>


        </div>


      </div> <!-- content end -->
  </div> <!-- container end -->


  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    $(document).ready(function () {
          $('.modal').modal();
          $('.sidenav').sidenav();
      });
  </script>
</body>
</html>
