<!-- Sends Post request to create new user in blog/scripts/auth/authController.php
which calls  scripts/php/auth/register.php and passes the data
 / -->

<div id="modalRegister" class="modal" style="color: black;">
  <div class="modal-content">
   <h3 class="center">Register</h3>
  <div class="container">
       <form action="/blog/scripts/php/auth/authController.php" method="post">
           <div class="row">
               <div class="input-field col s12">
                   <input id="register-name" type="text" name="name" required>
                   <label for="register-name">User Name</label>
               </div>
           </div>

           <div class="row">
               <div class="input-field col s12">
                   <input id="register-email" type="email" name="email" class="validate" required>
                   <label for="register-email">Email</label>
               </div>
           </div>

           <div class="row">
               <div class="input-field col s6">
                   <input id="register-password" type="password" name="password" autocomplete="off" required>
                   <label for="register-password">Password</label>
               </div>
                <div class="input-field col s5 right">
                    <input id="confirmPassword" type="password" name="confirmPassword" autocomplete="off" required>
                    <label for="confirmPassword">Confirm Password</label>
                </div>
           </div>

           <div class="row">
               <div class="input-field col s6">
                   <select name="usertype">
                       <option value="" disabled selected>Choose an account type</option>
                       <option value="admin">Admin</option>
                       <option value="user">Normal User</option>
                   </select>
                   <label>Account Type (Defaults to normal user)</label>
               </div>
           </div>
           <div class="row center">
             <div class="input-field col s12">
               <button class="waves-effect waves-light btn" type="submit" name="register">Register <i class="material-icons right">send</i></button>
             </div>
           </div>
       </form>
  </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
  </div>
</div>
