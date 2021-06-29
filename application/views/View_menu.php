<!DOCTYPE html>
<html>
<body>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-sm">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="hov" href="<?php echo base_url()?>">
          <img src="<?php echo base_url()?>/images/icon-home.png" class="icon-home-capteur">
        </a>
      </li>
      <li>
        <h2 class="titre-menu-capteurs">MES CAPTEURS &gt;</h2>
      </li>
    </ul>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link text-white hov" target="_top" href = "mailto: le.covidetecteur@gmail.com">Contact
           <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <!-- Boutton qui actionne le modale (pop-up)-->
          <a data-toggle="modal" data-target="#exampleModalCenter">
            <img src="<?php echo base_url()?>images/icon-info.png" class="icon-info hov" alt="logo">
           </a>
        </li>
      </ul>
    </div>
  </nav>


  <!-- Modale (pop-up) -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Informations sur Le Covidétecteur</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p><b>Ce site va vous permettre de connecter votre capteur Covidétecteur afin de visualiser ses données.</b></p>
          <p>Le Covidétecteur est un appareil capable de détecter et d'alerter sur la présence potentielle de charge virale dans l’air d’un lieu clos.</p>
          <p>Le Covidétecteur est équipé d'un capteur Sensirion SCD30 utilisant la technologie CMOSens® pour la détection infrarouge qui permet la mesure extrêmement précise de dioxyde de carbone. Outre la technologie de mesure NDIR pour la détection du CO2, un capteur d'humidité et de température Sensirion de qualité supérieure est également intégré sur le même module capteur.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Page Content -->

  <!-- 1er container contenant 3 cartes blanche -->
  <div class="container taille-carte">

    <!-- première carte blanche du premier container -->
	  <?php
		//print_r($detecteur);
	  $i = 0;
	  if(isset($detecteur)){
  	  foreach($detecteur as $key){

  	  	if( $i == 0) {
  			  echo "<div class=\"card-group\">";
  		  }
  	  	echo '<div class="card border-0 shadow my-2 mx-2">
        <div class="card-body p-3" id="">

  			<div class="text-center" >
  			<h5>'.$key["name"].' </h5>';
  		  if($key["lastdata"] == null){
  				echo '<div class="alert alert-primary" role="alert">Aucune donnée n\'est présente.</div>';
  			}else if($key["lastdata"]>800 && $key["lastdata"] < 1500){
  			echo '<div class="alert alert-warning" role="alert">
        La qualité de l\'air est moyenne. La concentration de CO2 est de '.$key["lastdata"].' PPM. Il est préférable d\'aérer la pièce.
        </div>';
  			}else if($key["lastdata"] > 1500){
  		  	echo '<div class="alert alert-danger" role="alert">
          La qualité de l\'air est très mauvaise. La concentration de CO2 est de '.$key["lastdata"].' PPM. Il est urgent d\'aérer la pièce.
          </div>';
  			}else if($key["lastdata"] <800){
  				echo '<div class="alert alert-success" role="alert">
          La qualité de l\'air est bonne. La concentration de CO2 est de '.$key["lastdata"].' PPM.
          </div>';
  			}
  			echo '<button class="btn btn-primary btn-sm mr-1">';
        echo anchor('MenuPrincipal/Graph/'.$key["id"],'Voir les statistiques globales','class="btn btn-primary btn-sm"');
        echo '</button>';
  			echo '<button class="btn btn-danger mb-2 ml-1" style="margin-top:2%" onclick="location.href =\'MenuPrincipal/delete/'.$key["id"].'\'">Supprimer ce capteur</button>
  			</div>

  			</div>
  			</div>';
  		  if($i ==2){
  		    echo '</div>';
  		  	$i=-1;
  			}
  		  $i++;
  		}
	  }
	  ?>
    <div class="card border-0 shadow my-2 mx-2 taille-carte-2">
      <div class="card-body p-3" id="white_card_1_1">
        <div class="text-center" >
          <a class="hoov" href="./add_detector">
            <img src="<?php echo base_url()?>/images/icon-cross.png" class="icon-croix hov" alt="logo">
          </a>
        </div>
		  </div>
    </div>
  </div>

  <br>
  <br>
  <br>

<!-- script -->
<script src="<?php echo base_url()?>/js/cards.js"></script>
</body>
</html>
