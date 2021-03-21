<!DOCTYPE html>
<html>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-sm">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="hoov" href="">
         <img src="<?php echo base_url()?>/images/icon-home.png" style="width:50%">
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
    <div class="row">
      <div class="col">

        <!-- première carte blanche du premier container -->
		  <?php
			//print_r($detecteur);
		  foreach($detecteur as $key){
		  	?>
		  <div class="container " style="width:90%;" >
			  <div class="card border-0 shadow my-4" style="height: 250px;">
				  <div class="card-body p-3" id="white_card_1_1">

					  <div class="text-center" >
						  <h5>Emplacement: <?php echo $key["name"] ?></h5>
					  </div>

				  </div>
			  </div>
		  </div>
		  <?php
		  }
		  ?>
        <div class="container " style="width:90%;" >   
          <div class="card border-0 shadow my-4" style="height: 250px;">
            <div class="card-body p-3" id="white_card_1_1">

            <div class="text-center" >
              <a class="hoov">
                <img src="<?php echo base_url()?>/images/icon-cross.png" alt="logo" style="width:25%" >
              </a>
            </div>

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
