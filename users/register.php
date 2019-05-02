<link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/register.css"); ?>"/>

<div class="container-fluid register-form">
    <div class="laatikko">
        
        <?php 

echo form_open('users/register'); ?>
            <?php echo validation_errors(); ?>
            <h3 class="otsikko">Rekisteröidy</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Sukunimi *" name="as_suku" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Etunimi *" name="as_etu" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Sähköposti *" name="astunnus" />
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Puhelinnumero *" name="puh" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Postinumero *" name="postinro" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Postitoimipaikka *" name="postitmp" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Salasana *" name="salasana" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Vahvista salasana *" name="passconf" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Osoite *" name="as_osoite" />
                    </div>

                    <button class="btn btn-primary" type="submit" value="Rekisteröidy">Rekisteröidy <i class="fas fa-arrow-circle-right"></i></button>
                </div>

                <?php echo form_close(); ?>
                <!--<a href="<?php echo base_url(); ?>"><button class="btn btn-primary">Peruuta</button></a>-->
            </div>
    </div>
</div>

