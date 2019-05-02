<link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/profile.css"); ?>"/>

<div class="laatikko">
<div class="row">
<div class='col'>
<?php
echo '<h2>Oma profiili</h2>';
echo '<p><b>Käyttäjätunnus:</b> ' . $user['astunnus'] . '</p>';
echo '<p><b>Etunimi:</b> ' . $user['as_etu'] . '</p>';
echo '<p><b>Sukunimi:</b> ' . $user['as_suku'] . '</p>';
echo '<p><b>Puhelinnumero:</b> 0' . $user['puh'] . '</p>';
echo '<p><b>Postinumero:</b> ' . $user['postinro'] . '</p>';
echo '<p><b>Postitoimipaikka:</b> ' . $user['postitmp'] . '</p>';
echo '<p><b>Osoite:</b> ' . $user['as_osoite'] . '</p>';

?>
<a href="<?php echo site_url('users/edit/' . $user['id']); ?>"><button class="btn btn-primary">Siirry muokkaamaan tietoja <i class="fas fa-arrow-circle-right"></i></button></a>
<?php echo form_open('users/delete'); ?>
<input type="hidden" name="id" value="<?php echo $user['id'];?>" />
</div>
</div>
</div>