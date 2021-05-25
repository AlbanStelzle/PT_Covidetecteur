<!DOCTYPE html>
<html>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-sm">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="hoov" href="">
         <img src="<?php echo base_url()?>images/icon-home.png" style="width:50%">
       </a>
       <li>
        <h2 class="text-white" style="margin-top: 10px;">MES APPAREILS ></h2>
      </li>
    </li>

    </ul>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link text-white hoov" target="_top" href="mailto:Le.covidetecteur@gmail.com?subject=">Contact
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="hoov" href="">
            <img src="<?php echo base_url()?>/images/icon-info.png" alt="logo" style="width:75%" >
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Page Content -->
  <br>
  <br>
  <br>


  <!-- 1er container contenant 3 cartes blanche -->
  <div class="container" style="width:90%">


        <!-- première carte blanche du premier container -->
		  <?php
			//print_r($detecteur);
		  $i = 0;
		  if(isset($detecteur)){
		  foreach($detecteur as $key){

		  	if( $i == 0) {
				echo "<div class=\"card-group\">";
			}
		  		echo '<div class="card border-0 shadow my-2 mx-2" style="height: 250px;">
				  <div class="card-body p-3" id="">

					  <div class="text-center" >
						  <h5>'.$key["name"].' </h5>
						  ';
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
						echo '
						  <button class="btn btn-primary btn-sm">';
              echo anchor('Accueil/graphiques','Voir les statistiques globales','class="btn btn-primary btn-sm"');
              echo '</button>';
						  echo '<button class="btn btn-danger" style="margin-top:2%" onclick="location.href =\'MenuPrincipal/delete/'.$key["id"].'\'">Supprimer ce capteur</button>
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
          <div class="card border-0 shadow my-2 mx-2" style="height: 250px;">
            <div class="card-body p-3" id="white_card_1_1">

            <div class="text-center" >
              <a class="hoov" href="MenuPrincipal/add_detector">
                <img src="<?php echo base_url()?>/images/icon-cross.png" alt="logo" style="width:25%" >
              </a>
            </div>
			</div>

          </div>

    </div>

            <br>
            <br>
            <br>



          </div>
        </div>
      </div>




  </div>

</div>










</div>

<!-- script -->
<script src="<?php echo base_url()?>/js/cards.js"></script>
</body>
</html>
