<?php
$this->load->helper('form');
?>
<!DOCTYPE html>
<html>



<body>
  
<!-- Navigation -->
<nav class="navbar navbar-expand-sm">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a href="">
        <img src="<?php echo base_url()?>/images/icon-home.png" style="width:50%">
      </a>
    </li>
  </ul>
   <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link text-white" target="_top" href="mailto:Le.covidetecteur@gmail.com?subject=">Contact
                  <span class="sr-only">(current)</span>
                </a>
          </li>
          <li class="nav-item">
            <a href="">
              <img src="<?php echo base_url()?>/images/icon-info.png" alt="logo" style="width:75%" >
            </a>
          </li>
        </ul>
      </div>
</nav>

<!-- Page Content -->
  <div class="container" style="width:50%">
    <div class="card border-0 shadow my-4">
      <div class="card-body p-3">
        <div class="text-center">
          <h1 class="font-weight-light">Inscription</h1>
        </div>

        <!-- Logo -->
        <div class="text-center">
          <img src="<?php echo base_url()?>/images/logo.png" alt="logo" style="width:20%" unselectable="on">
        </div>

        <br>

        <!-- Form -->
          <?php
          echo form_open();
          echo "<div class=\"form-group\">";


          echo form_input(['type'=>'email',
                            'placeholder'=>'Adresse email',
                            'class'=>'form-control',
                            'name'=>'email']);

          echo form_input(['type'=>'password',
              'placeholder'=>'Mot de passe',
              'class'=>'form-control',
              'name'=>'password']);



          echo "<div class=\"text-center\">";
          echo form_submit(['type'=>'submit',
                            'class'=>'btn btn-success rounded-pill',
                            'style'=>'width:50%',
                            ],"Se connecter");
          echo form_close();
          ?>
      </div>
        <br>

        <!-- Confirmation button -->


        <br>

         <div class="text-center">
        <p class="lead mb-0 text-secondary">Profitez de l’innovation pour un air plus sain !</p>
    </div>
  </div>
</div>




</body>

</html>
