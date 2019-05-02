<html>
    <head>
        <title>Rantarolex</title>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="navbar-container">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link tuotealueet" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-lg fa-bars"></i>
        <span>Tuotealueet</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
                foreach($category as $tuote_category):
                    $kategoria = $tuote_category['kategoria'];
                    echo  "<a class='dropdown-item' href='#'>" . $kategoria . "</a>";
                    endforeach;
          ?>
          <!--<a class="dropdown-item" href="#">Kultakellot</a>-->
          <!--<a class="dropdown-item" href="#">Hopeakellot</a>-->
          <!--<div class="dropdown-divider"></div>-->
          <!--<a class="dropdown-item" href="#">Älykellot</a>-->
          
        </div>
      </li>
    </ul>
    <a class="navbar-brand" href="<?php echo base_url(); ?>">Rantarolex</a>
    <form class="form-inline my-2 my-lg-0 ">
      <input class="form-control justify-content-center" type="search" placeholder="Etsi tuotteita" aria-label="Search">
 
    </form>
     <ul class="navbar-nav">
      <?php
if (!empty($logged_user['id'])) { ?>
    <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('users/' . $logged_user['id']); ?>">
        <i class="fas fa-lg fa-user-circle"></i>Oma profiili</a></li>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('users/logout'); ?>"><i class="fas fa-lg fa-sign-out-alt"></i>Kirjaudu ulos</a></li>
<?php        
} 
else { ?>
    <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('users/login'); ?>"><i class="fas fa-lg fa-sign-in-alt"></i>Kirjaudu sisään</a></li>
        
<?php 
} ?>
        </ul>
  </div>
  </div>
</nav>
        <div class="container">