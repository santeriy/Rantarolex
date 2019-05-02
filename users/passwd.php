<link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/passwd.css"); ?>"/>
<h2><?php echo $title; ?></h2>
<?php
echo validation_errors();
echo form_open('users/passwd/' . $user['id']); ?>
<p><label for="salasana">New password</label><br>
    <input type="password" class="form-control" name="salasana" /></p>

<p><label for="passconf">Password Confirmation</label><br>
    <input type="password" class="form-control" name="passconf" /></p>

<button class="btn btn-primary" type="submit" value="Hyväksy">Hyväksy</button>
<?php echo form_close(); ?>
<a href="<?php echo site_url('users/edit/' . $logged_user['id']); ?>"><button class="btn btn-primary">Peruuta</button></a>
