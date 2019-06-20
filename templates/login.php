<div id="modalLogin" class="modal" style="color: black;">
  <div class="modal-content">
   <h3 class="center">Login</h3>
   <br>
  <div class="container center">
       <form action="/blog/scripts/DBController.php" method="post">
           <div class="row">
               <div class="input-field col s12">
                   <input id="name" type="text" name="name">
                   <label for="name">User Name</label>
               </div>
           </div>

           <div class="row">
               <div class="input-field col s12">
                   <input id="password" type="text" name="password">
                   <label for="password">Password</label>
               </div>
           </div>

           <div class="row center">
             <div class="input-field col s12">
               <button class="waves-effect waves-light btn" type="submit" name="login">Login</button>
             </div>
           </div>
       </form>
    </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
  </div>
</div>
