<?php
$this->load->helper('html');?>
<html lang="fr">

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-sm">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a>
          <img src="<?php echo base_url()?>/images/icon-home.png" class="icon-home">
        </a>
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
            <img src="<?php echo base_url()?>/images/icon-info.png" class="icon-info hov" alt="logo">
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
  <div class="logo-nom-site">
    <img src="<?php echo base_url()?>images/logo.png" alt="logo">
    <h1>Le Covidétecteur</h1>
  </div>

  <!-- SE CONNECTER -->
  <div class="connexion">
    <div class="hov-soft">
      <?php echo anchor('Accueil/login',img('images/bouton-connexion.png'));?>
    </div>
  </div>


  <!-- S'INSCRIRE -->
  <div class="inscription">
    <div class="hov-soft">
      <?php echo anchor('Accueil/register', 	img('images/bouton-inscription.png'));?>
    </div>
  </div>

<footer>
  <div class="container" style="width:80%">
    <div class="card border-0 shadow my-4">
      <div class="card-body p-3">
        <div class="text-footer">
          <p>Par STELZLE Alban, RAYMOND Enveric, BOUCHENY Nicolas. Sous la direction de VALARCHER Pierre.<br>Créé le : 10/11/2020 Dernière mise à jour : 26/06/2021.<br>Tous droits réservés ©</p>
          <img class="hov" src="<?php echo base_url()?>images/logo-upec-iut.png" class="logo-upec-iut" onClick="location.href='https://www.iutsf.u-pec.fr/departements/informatique'">
        </div>
      </div>
    </div>
  </div>
</footer>
</body>

</html>

