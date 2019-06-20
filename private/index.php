<!DOCTYPE html>
<html lang="en">
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog/Article CMS</title>
</head>
<body>

    <!-- Navbar goes here -->
    <?php require '../templates/nav.php'; ?>
    <!-- Page Layout here -->
        <div class="row">
            <div class="col s12 m4 l2">
                <!-- Note that "m4 l3" was added -->
                <!-- Grey navigation panel

                    This content will be:
                3-columns-wide on large screens,
                4-columns-wide on medium screens,
                12-columns-wide on small screens  -->
                <ul class="collection collection-with-header">
                    <li class="collection-item truncate"><h5>Top</h5>
                        <p class="flow-text"><a href="#">Lorem ipsum dolor</a></p>
                        <p class="flow-text"><a href="#">sit amet ipsum</a></p>
                        <p class="flow-text"><a href="#">Lorem ipsum dolor</a></p>
                    </li>
                    <li class="collection-item"><h5>Hot</h5>
                        <p class="flow-text"><a href="#">Lorem ipsum dolor</a></p>
                        <p class="flow-text"><a href="#">sit amet ipsum</a></p>
                        <p class="flow-text"><a href="#">Lorem ipsum dolor</a></p>

                    </li>
                    <li class="collection-item"><h5>Recent</h5>
                        <p class="flow-text"><a href="#">Lorem ipsum dolor</a></p>
                        <p class="flow-text"><a href="#">sit amet ipsum</a></p>
                    </li>
                    <li class="collection-item"><h5>Archive</h5></li>
                </ul>

            </div> <!-- Sidebar end  -->

            <div class="col s12 m8 l10 section">
                <!-- Note that "m8 l9" was added -->
                <!-- Teal page content

                    This content will be:
                9-columns-wide on large screens,
                8-columns-wide on medium screens,
                12-columns-wide on small screens  -->
                <div class="container center">
                  <?php
                    //include 'scripts/createdb.php';
                    include 'scripts/DBController.php';
                    listUsers();
                   ?>

                </div>


            </div> <!-- content end -->


    </div> <!-- Body end -->


    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <script>
      $(document).ready(function () {
            $('.carousel-slider').carousel({fullWidth: true});
            $('.modal').modal();
        });
    </script>
</body>
</html>
