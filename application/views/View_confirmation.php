<head>
<title>Le Covidétecteur</title>
</head>

<?php
$this->load->helper('form');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Le Covidétecteur</title>

<link rel="icon" href="images/logo2.png">
</head>

<body>
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

<!-- LOGO -->
<div class="text-center">
    <h1 class="confirmation-text">Votre inscription a bien été prise en compte</h1>
    <br>
    <br>
    <img class="logo-confirmation" src="<?php echo base_url()?>images/icon-check-2.png" alt="logo">
</div>

<br>
<br>

<div class="button-center" onClick="location.href='http://ptcovidetecteur/index.php/Accueil/register'">
    <?php
    $seconnecter = array(
        'class'=>'btn btn-success rounded-pill col-sm-2',
        'value' => 'true',
        'content' => 'Se connecter'
    );

    echo form_button($seconnecter);
    ?>
</div>

<footer>
</footer>
</body>
</html>