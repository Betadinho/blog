<nav class="nav-wrapper teal darken-2">
   <div class="container center">
       <a href="#" class="brand-logo center">STORIES</a>
       <a href="#" class="sidenav-trigger right" data-target="mobile-links">
           <i class="material-icons">menu</i>
       </a>
       <ul id="nav" class="left hide-on-med-and-down">
         <li><a href="/blog/index.php">Home</a></li>
    <!-- The following line should be under the condition that a session is set-->
         <!--  <li><a href="/blog/private/index.php">Home</a></li> -->


         <li><a class="modal-trigger" href="#modalAbout">About</a>
           <div id="modalAbout" class="modal teal darken-2">
             <div class="modal-content container">
               <h2>About this Project</h2>
               <p class="flow-text">Basic reddit like story viewer
               </div>
               <div class="modal-footer">
                 <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
               </div>
             </div>
           </li>

           <li><a class="modal-trigger" href="#modalContact">Contact</a>
             <div id="modalContact" class="modal teal darken-2">
               <div class="modal-content container">
                 <h2>Contact me</h2>
                 <a href="#"><span class="flow-text">My GitHub: betadinho/github.com</span></a>
                 <a href="#"><span class="flow-text">My Heroku: heroku.alpha.com</span></a>
                 <a href="#"><span class="flow-text">My Email: alpha-prechtl@outlook.com</span></a>
               </div>
               <div class="modal-footer">
                 <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
               </div>
             </div>
           </li>
         </ul>
         <ul id="nav-mobile" class="right hide-on-med-and-down">
           <li><a class="modal-trigger" href="#modalLogin">Log In</a>
             <?php include 'login.php' ?>
           </li>
           <li><a class="modal-trigger" href="#modalRegister">Register</a>
             <?php include 'register.php' ?>
           </li>
         </ul>
   </div>
 </nav>
 <!-- Sidenav for mobile view -->
 <ul class="sidenav" id="mobile-links">
    <li class="">
        <img src="http://lorempixel.com/output/technics-q-c-640-480-6.jpg" alt="#" style="height: 250px;">
    </li>
     <li class="">
         <a href="/blog/index.php">Home</a>
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
           <a href="#">Log In</a>
       </li>

       <li class="">
           <a href="#">Register</a>
       </li>

 </ul>
