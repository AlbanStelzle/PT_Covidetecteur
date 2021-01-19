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
      <div class="card-body p-6">
        <div class="text-center">
          <h1 class="font-weight-light">Connexion</h1>
        </div>

        <!-- Logo -->
        <div class="text-center">
          <img src="<?php echo base_url()?>/images/logo.png" alt="logo" style="width:20%" unselectable="on">
        </div>

        <br>

        <!-- Form -->
        <div class="form-group">
			<?php echo form_open();
			echo form_input(['type'=>'text',
								'class'=> 'form-control',
								'placeholder'=>'Prénom',
								'name'=>'firstname']);

			echo form_input(['type'=>'text',
								'class'=> 'form-control',
								'placeholder'=>'Nom',
								'name'=>'name']);

			echo form_input(['type'=>'email',
								'class'=> 'form-control',
								'placeholder'=>'Adresse email',
								'name'=>'email']);

			echo form_input(['type'=>'password',
								'class'=> 'form-control',
								'placeholder'=>'Mot de passe',
								'name'=>'password']);
			echo form_input(['type'=>'password',
								'class'=> 'form-control',
								'placeholder'=>'Confirmez votre mot de passe',
								'name'=>'password_confirm']);
          ?>
        <br>

        <!-- Confirmation button -->
        <div class="text-center">
			<?php
			echo form_submit(['type'=>'submit',
							'class'=>'btn btn-success rounded-pill',
							'style'=>'width:50%'],"S'inscrire");
			echo form_close();
			?>
		</div>

        <br>

         <div class="text-center">
        <p class="lead mb-0 text-secondary">Profitez de l’innovation pour un air plus sain !</p>
    </div>
  </div>
</div>




</body>

</html>
