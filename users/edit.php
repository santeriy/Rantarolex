<link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/edit.css"); ?>"/>
<div class="laatikko">
    <div class="row">
        <div class="col-6 section">
            <h2>
                <?php echo $title; ?>
            </h2>
            <?php
echo validation_errors();
echo form_open('users/edit/' . $user['id']); ?>
                <input type="input" class="form-control" name="astunnus" value="<?php echo $user['astunnus']; ?>" />

                <button class="btn btn-primary" type="submit" value="Tallenna">Tallenna</button>
                <?php echo form_close(); ?>
        </div>
        <div class="col-5 section">
            <?php echo form_open('users/delete'); ?>
            <input type="hidden" name="id" value="<?php echo $user['id'];?>" />
            <h2>Kirjoita DELETE, jos haluat poistaa tunnuksesi.</h2>
            <input type="input" class="form-control" name="delete" />
            <button class="btn btn-danger  poisto" type="submit" value="Delete">Vahvista poisto</button>
            <?php echo form_close(); ?>
        </div>
        <div class="col-6 section">
            <h2>Vaihda salasana</h2>
            <a href="<?php echo site_url('users/passwd/' . $user['id']); ?>"><button class="btn btn-primary sala">Vaihda salasana <i class="fas fa-unlock"></i></button></a>
        </div>
    </div>
</div>
