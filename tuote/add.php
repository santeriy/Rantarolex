<link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/add.css"); ?>"/>

<h1>
    <?php
    echo $title;
    ?>
</h1>

<?php

echo validation_errors();
?>
<?php
echo form_open('tuote/add');
?>
<label for="hinta"><span>Kellon hinta: </span></label>
    <input class="form-control" type="number" class="tunnit" name="hinta"/>
<label for="merkki"><span>Merkki: </span></label>
    <input class="form-control" type="text" name="merkki" class="merkki"/>
<label for="malli"><span>Malli: </span></label>
    <input class="form-control" type="text" name="malli" class="malli" />
<label for="info"><span>Infoteksti:</span></label>
    <textarea class="form-control" name="info" id="info" required></textarea></p>
    
<button type="submit" class="btn btn-primary">Lähetä</button>
<button type="reset" class="btn btn-danger">Tyhjennä</button>
<?php echo form_close();?>