<?php
$this->load->helper('html');?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="<?php echo base_url()?>css/graphiques.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/inscription.css">



</head>

<body>
<! -- javascript du graphique -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<link rel="icon" href="images/logo2.png">

<!-- Navigation -->
<nav class="navbar navbar-expand-sm">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="hov" href="<?php echo base_url()?>">
                <img class="hov" src="<?php echo base_url()?>images/icon-home.png" alt="logo" style="width:50%">
            </a>
        </li>
    </ul>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link text-white hov" target="_top" href = "mailto: le.covidetecteur@gmail.com">Contact
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <!-- Boutton qui actionne le modale (pop-up)-->
                <a data-toggle="modal" data-target="#exampleModalCenter">
                    <img class="hov" src="<?php echo base_url()?>images/icon-info.png" alt="logo" style="width:75%" >
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
        <p><b>Comment analyser les données du capteur ?</b></p>
        Sur cette page cliquez sur les boutons <kbd class="bg-primary">CO2</kbd>, <kbd class="bg-primary">Humidité</kbd> ou <kbd class="bg-primary">Température</kbd> pour avoir accès à l'historique de votre Covidétecteur.</p>
        <p>Vous allez pouvoir par exemple vérifier à quels moments les données ont dépassé les limites de dangerosité.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

  <!-- Page Content -->
    

  <div class="container" style="width:80%">
    <div class="row">
    <div id="col" class="col-md-12">
    <div class="card border-0 shadow my-4">
      <div class="card-body p-6">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <button type="button" class="btn btn-primary m-1" id="co2">CO2</button>
        </li>
        <li class="nav-item">
          <button type="button" class="btn btn-primary m-1" id="humidite">Humidité</button>
        </li>
        <li class="nav-item">
         <button type="button" class="btn btn-primary m-1" id="temperature">Temperature</button>
        </li>

      </ul>
    </div>
  </div>
</nav>
<!-- zone d'affichage des graphiques -->
<div id="chart"></div>
<?php $data = json_encode($detecteur)?>
<script>
// modal (pop-up) automatique
let dataco2= <?php print_r($data);?>;

$(window).on('load', function() {
        $('#exampleModalCenter').modal('show');
    });

//affiche les graphiques
document.getElementById('chart').innerHTML = '<div id="chart_co2"></div>';

document.getElementById("co2").addEventListener("click", displayCo2);

function displayCo2() {
  document.getElementById('chart').innerHTML = '<div id="chart_co2"></div>';
  //recharge le js
   var head= document.getElementsByTagName('head')[0];
      var script= document.createElement('script');
      script.src= '<?php echo base_url()?>js/co2.js';
      head.appendChild(script);
}

document.getElementById("humidite").addEventListener("click", displayHumidite);

function displayHumidite() {
  document.getElementById('chart').innerHTML = '<div id="chart_humidite"></div>';
  //recharge le js
   var head= document.getElementsByTagName('head')[0];
      var script= document.createElement('script');
      script.src= '<?php echo base_url()?>js/humidite.js';
      head.appendChild(script);
}

document.getElementById("temperature").addEventListener("click", displayTemperature);

function displayTemperature() {
  document.getElementById('chart').innerHTML = '<div id="chart_temperature"></div>';
	  //recharge le js
	   var head= document.getElementsByTagName('head')[0];
		  var script= document.createElement('script');
		  script.src= '<?php echo base_url()?>js/temperature.js';
		  head.appendChild(script);
}

</script>


    </div>

        </div>
 
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript" src="<?php echo base_url()?>js/co2.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/temperature.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/humidite.js"></script>

</body>
</html>

