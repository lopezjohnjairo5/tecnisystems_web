<section id="login">
  <form id="form_login" action="<?php echo CONTROLLERS;?>login_controller.php" method="post">
    <img id="logo" src="<?php echo IMGS; ?>/logo.png" alt="Logo">
    <br><input class="login_inputs Vmail" type="email" name="email" id="email" placeholder="email" required>
    <input class="login_inputs Vpass" type="password" name="password" id="password" placeholder="password" autocomplete="off" required>
    <br><input class="login_inputs" type="checkbox" name="terms" id="terms" required><label for=""><a href="<?php echo URL_BASE;?>/views/terms_and_conditions.php" target="_blank"> Acepto terminos y condiciones</a></label>
    <br><input type="submit" id="btn_submit" name="" value="INGRESAR">
  </form>
</section>
