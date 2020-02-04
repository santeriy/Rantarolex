<link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/login.css"); ?>"/>

<div class="container">

<?php

echo form_open('users/login'); ?>
<div class="login-page">
  <div class="form">
      <?php echo validation_errors(); ?>
      <h3 class="otsikko">Kirjaudu sisään</h3>
    <form class="login-form">
      <input type="email" class="kirjaudu" name="astunnus" placeholder="Sähköpostiosoite"/>
      <input type="password" class="kirjaudu" name="salasana" placeholder="Salasana"/>
      <button type="submit">Kirjaudu sisään</button>
      <p class="message">Ei vielä käyttäjätiliä? <a href="<?php echo site_url('users/register'); ?>">Luo käyttäjätili.</a></p>
    </form>
  </div>
</div>
<?php echo form_close(); ?>
</div>

