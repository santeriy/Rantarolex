<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('https://images4.alphacoders.com/266/266738.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4"></h2>
          <p class="lead"></p>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('https://www.wallpaperup.com/uploads/wallpapers/2017/04/23/1086878/3346447d30a8a297d96e03301da278e3-700.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4"></h2>
          <p class="lead"></p>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('https://blog.hdwallsource.com/wp-content/uploads/2016/02/hand-watch-wallpaper-45000-46162-hd-wallpapers-1024x640.jpg')">
        <div class="carousefl-caption d-none d-md-block">
          <h2 class="display-4"></h2>
          <p class="lead">.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
  
  <!-- Tähän loppuu slideshow -->
  
  
<?php
    if (empty($item)) {
        echo 'Ei tuotteita.</p>';
    }
    else {?>
      <?php
          
          $i=0;
          
          print "<h3 class='etusivu'>Valikoiman uusimmat</h3>";
          print "<div class='row justify-content-center'>";
          
          foreach($item as $tuote_item):
          $hinta = $tuote_item['hinta'];
          $merkki = $tuote_item['merkki'];
          $malli = $tuote_item['malli'];
          $info = $tuote_item['info'];
          $kategoria = $tuote_item['kategoria'];
          $tuote_id = $tuote_item['tuote_id'];
              
            echo "<div class='col-xl col-md-5'>";
            echo "<div class='card'>";
            echo "<img class='card-img-top' src='assets/img/" . $malli . ".jpg' alt='Card image cap'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $merkki . " " .$malli ."</h5><h6>".$kategoria."</h6>";
            echo "<p class='card-text hinta'>". $hinta ."€</p>";
            echo "<a href='" . site_url() . "/tuote/". $tuote_id ."' class='btn btn-primary'>Tutustu tuotteeseen <i class='fas fa-search'></i></a>";
            echo "</div></div></div>";
    $i++;
    if($i==4) break;

        
        endforeach;
    }
?>
</div>
<h3 class="etusivu">Kultakellot</h3>
<div class="row justify-content-center">

<?php foreach($item as $tuote_item):
            $hinta = $tuote_item['hinta'];
            $merkki = $tuote_item['merkki'];
            $malli = $tuote_item['malli'];
            $info = $tuote_item['info'];
            $kategoria = $tuote_item['kategoria'];
            $tuote_id = $tuote_item['tuote_id'];
            
            if ($kategoria == "Kultakello") {

            echo "<div class='col-3'>";
            echo "<div class='card'>";
            echo "<img class='card-img-top' src='assets/img/" . $malli . ".jpg' alt='Card image cap'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $merkki . " " .$malli ."</h5><h6>".$kategoria."</h6>";
            echo "<p class='card-text hinta'>". $hinta ."€</p>";
            echo "<a href='" . site_url() . "/tuote/". $tuote_id ."' class='btn btn-primary'>Tutustu tuotteeseen <i class='fas fa-search'></i></a>";
            echo "</div></div></div>";
            }
        endforeach;
?>
</div>  
<?php
if (!empty($logged_user['id'])) {
 if ($logged_user['id'] == '1') {
echo "<form action='" . site_url() . "/tuote/add/'>";
echo "<button type='submit' class='btn btn-danger lisaa'>Lisää kello</button></form>";
}
} 
?>
