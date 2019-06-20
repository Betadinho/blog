<!DOCTYPE html>
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
  <?php require 'templates/nav.php'; ?>
  <!-- Page Layout here -->
  <div class="container center">
          <?php //include 'templates/sidebar.php'; ?>

          <div class="section">
            <div class="container center">

            <?php
            //include 'scripts/createdb.php';
            include 'scripts/DBController.php';
            include 'templates/cards.php';
            ?>

            <div class="row">
              <?php
                  listUsers();

                  for ($i=1; $i < 4; $i++) {
                    small_thumb_slide('testing shit' . $i, 'http://lorempixel.com/output/technics-q-c-640-480-'. $i .'.jpg');
                  }
                  for ($i=1; $i < 4; $i++) {
                    big_thumb_normal();
                  }
                  for ($i=1; $i < 4; $i++) {
                    big_thumb_slide();
                  }
                ?>
              </div>

            </div>


          </div> <!-- content end -->
  </div> <!-- container end -->


  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    $(document).ready(function () {
          $('.carousel-slider').carousel({fullWidth: true});
          $('.modal').modal();
          $('.sidenav').sidenav();
      });
  </script>
</body>
</html>
