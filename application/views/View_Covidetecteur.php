<?php
$this->load->helper('html');?>
<html lang="fr">
<head>
<title>Le Covidétecteur</title>
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-sm">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a>
                <img src="<?php echo base_url()?>images/icon-home.png" alt="logo" style="width:50%">
            </a>
        </li>
    </ul>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link text-white" target="_top" href="mailto:your@email.address?subject=">Contact
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="">
                    <img src="<?php echo base_url()?>images/icon-info.png" alt="logo" style="width:75%" >
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- LOGO -->
<div class="text-center">
    <img src="<?php echo base_url()?>images/logo.png" alt="logo">
    <h1>Le Covidétecteur</h1>
</div>

<br>
<br>

<!-- SE CONNECTER -->
<div class="connexion">
    <?php
    echo anchor('Accueil/login',img('images/bouton-connexion.png'));
    ?>
</div>

<br>

<!-- S'INSCRIRE -->
<div class="inscription">
    <?php

    echo anchor('Accueil/register', 	img('images/bouton-inscription.png'));
    ?>

</div>

<footer>
  <div class="container" style="width:80%">
    <div class="card border-0 shadow my-4">
      <div class="card-body p-3">
        <div class="text-center">
          <h4>Mentions légales</h4>
          <p>Par RAYMOND Enveric, STELZLE Alban, BOUCHENY Nicolas, DESCROIX Hugo Sous la direction de VALARCHER Pierre</p>
          <p>Crée le : 10/11/2020 Dernière mise à jour : 18/01/2021<br>Tous droits réservés ©</p>
          <img src="images/logo-upec-iut.png" class="logo-upec-iut">
        </div>
      </div>
    </div>
  </div>
</footer>
</body>
</html>
