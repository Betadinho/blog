<div id="modalLogin" class="modal" style="color: black;">
  <div class="modal-content">
   <h3 class="center">Login</h3>
   <br>
  <div class="container center">
       <form id="login-form" action="/blog/scripts/php/auth/authController.php" method="get">
           <div class="row">
               <div class="input-field col s12">
                   <input id="name" type="text" name="name" required>
                   <label for="name">User Name</label>
               </div>
           </div>

           <div class="row">
               <div class="input-field col s12">
                   <input id="password" type="text" name="password" required>
                   <label for="password">Password</label>
               </div>
           </div>

           <div class="row center">
             <div class="input-field col s12">
                   <button type="submit" class="waves-effect waves-light btn" name="login">
                       Login <i class=" material-icons right">send</i>
                   <button>
             </div>
           </div>
       </form>
    </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
  </div>
</div>
<script>
function submit()
{
 document.getElementById("login-form").submit();
}
</script>
