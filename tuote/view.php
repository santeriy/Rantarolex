<link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/tuote.css"); ?>"/>
<div class='container  test1 justify-content-center'>
<div class="row">
<div class='col-sm irti'>
<h3 class="otsikkotuote"><?php echo $item['merkki'] . " " . $item['malli']?></h3><hr>
<img src="/CI/assets/img/<?php echo $item['malli']?>.jpg">
</div>
<div class='col-sm irti'>
</div>

<div class='col-sm irti'>
<div class="card irt2" style="width: 18rem;">
  <div class="card-body">
    <h6 class="card-title">Hinta alv 24 % </h6>
    <h1 class="hinta1"><?php echo $item['hinta']?>€</h1>
     </div>
  </div>
  <div class="card irt1" style="width: 18rem;">
  <div class="card-body">
    <p>Lähetettävissä: Heti yli 25 kpl</p>
    <button type="button" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Lisää ostoskoriin</button>
     </div>
  </div>
</div>
</div>
<div class="row">
<div class='col-sm-5 irti'>
<h5 class="otsikkotuote">Kuvaustuotteesta:</h5>
<p class="otsikkotuote"><?php echo $item['info']?></p>
</div>
<div class='col-sm irti'>

</div>
</div>
</div>



