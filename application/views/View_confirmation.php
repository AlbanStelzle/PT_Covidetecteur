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
                <a class="nav-link text-white hov" target="_top" href="mailto:your@email.address?subject=">Contact
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="">
                    <img class="hov" src="<?php echo base_url()?>images/icon-info.png" alt="logo" style="width:75%" >
                </a>
            </li>
        </ul>
    </div>
</nav>

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