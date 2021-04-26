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
    <h1>Votre inscription a bien été prise en compte</h1>
    <br>
    <br>
    <img src="<?php echo base_url()?>images/icon-check-2.png" alt="logo">
</div>

<br>
<br>

<?php
$seconnecter = array(
    'class'=>'btn btn-success rounded-pill',
    'value' => 'true',
    'content' => 'Se connecter'
);



echo form_button($seconnecter);
?>



<footer>
</footer>
</body>
</html>