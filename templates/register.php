<div id="modalRegister" class="modal" style="color: black;">
  <div class="modal-content">
   <h3 class="center">Register</h3>
   <br>
  <div class="container">
       <form action="/blog/scripts/php/auth/authController.php" method="post">
           <div class="row">
               <div class="input-field col s12">
                   <input id="name" type="text" name="name" required>
                   <label for="name">User Name</label>
               </div>
           </div>

           <div class="row">
               <div class="input-field col s12">
                   <input id="email" type="email" name="email" class="validate" required>
                   <label for="email">Email</label>
               </div>
           </div>

           <div class="row">
               <div class="input-field col s5">
                   <input id="password" type="password" name="password" autocomplete="off" required>
                   <label for="password">Password</label>
               </div>
                <div class="input-field col s5 right">
                    <input id="confirmPassword" type="password" name="confirmPassword" autocomplete="off" required>
                    <label for="confirmPassword">Confirm Password</label>
                </div>
           </div>

           <div class="row center">
             <div class="input-field col s12">
               <button class="waves-effect waves-light btn" type="submit" name="register">Register</button>
             </div>
           </div>
       </form>
  </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
  </div>
</div>
