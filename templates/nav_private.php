<nav class="nav-wrapper teal">
   <div class="container center">
       <a href="/blog/private/index.php" class="brand-logo center">|STORIES|</a>
       <a href="#" class="sidenav-trigger right" data-target="mobile-links">
           <i class="material-icons">menu</i>
       </a>
       <ul id="nav" class="left hide-on-med-and-down">

    <!-- The following line should be under the condition that a session is set-->
         <!--  <li><a href="/blog/private/index.php">Home</a></li> -->
         <li><a class="modal-trigger" href="#modalAbout">About</a>
             <div id="modalAbout" class="modal teal darken-1" >
                 <div class="modal-content container">
                     <h2>About this Project</h2>
                     <p class="flow-text">Basic reddit like story viewer </p>
                 </div>
                     <a href="#!" class="modal-close waves-effect waves-green btn-flat white right">Close</a>
             </div>
           </li>

           <li><a class="modal-trigger" href="#modalContact">Contact</a>
             <div id="modalContact" class="modal teal darken-1">
               <div class="modal-content container">
                 <h2>Contact me</h2>
                 <a href="#"><span class="flow-text">My GitHub: betadinho/github.com</span></a>
                 <a href="#"><span class="flow-text">My Heroku: heroku.alpha.com</span></a>
                 <a href="#"><span class="flow-text">My Email: alpha-prechtl@outlook.com</span></a>
               </div>
                 <a href="#!" class="modal-close waves-effect waves-green btn-flat white right">Close</a>
             </div>
           </li>
           <li><a href="/blog/private/createArticle.php" class="btn">Create post <i class="left meddium material-icons">add</i></a></li>
         </ul>
         <ul class="right hide-on-med-and-down">
            <li>
                <a href="#" class="flow-text hide-on-med-and-down"><?php echo $_SESSION['username'];?></a>
            </li>
             <li>
                 <form action="/blog/scripts/php/auth/authController.php" method="get">
                     <button class="waves-effect waves-light btn" type="submit" name="logout">Logout</button>
                 </form>
             </li>
         </ul>
   </div>
 </nav>
 <!-- Sidenav for mobile view -->
 <ul class="sidenav" id="mobile-links">
    <li class="">
        <img src="#" alt="#" style="height: 250px;">
    </li>
     <li class="">
         <a href="/blog/private/index.php">Home</a>
     </li>
<!-- The following line should be under the condition that a session is set-->
     <!--  <li><a href="/blog/private/index.php">Home</a></li> -->
     <li class="">
         <a href="#">About</a>
       </li>

       <li class="">
           <a href="#">Contact</a>
       </li>
       <li class="">
           <a href="#">Logout</a>
       </li>

 </ul>
