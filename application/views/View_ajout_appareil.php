<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Le Covidétecteur</title>

<link rel="icon" href="<?php echo base_url()?>images/logo2.png">

</head>

<body>
  
<!-- Navigation -->
  <nav class="navbar navbar-expand-sm">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a href="MenuPrincipal">
          <img src="<?php echo base_url()?>images/icon-home.png" style="width:50%">
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
            <img src="<?php echo base_url()?>images/icon-info.png" alt="logo" style="width:75%" >
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <br>
  <br>
  <br>
  <br>
  <br>

  <!-- Page Content -->
    

  <div class="container" style="width:40%">
    <div class="row">
    <div id="col" class="col-md-12">
    <div class="card border-0 shadow my-4">
      <div class="card-body p-6">
        <div class="text-center">
          <h1 class="font-weight-light">Ajouter un appareil</h1>
        </div>

        <br>
        <br>

        <!-- Form -->
		<?php echo form_open(); ?>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <img src="<?php echo base_url()?>images/icon-tag.png" class="img-responsive" alt="Responsive image" width="24" height="24" />
             </span>
          </div>
			<?php echo form_input(['type'=>'text',
									'class'=>'form-control',
									'placeholder'=>'Choisissez un nom',
									'name'=>'name'])?>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <img src="<?php echo base_url()?>images/icon-code.png" class="img-responsive" alt="Responsive image" width="24" height="24" />
            </span>
          </div>
			<?php echo form_input(['type'=>'text',
					'class'=>'form-control',
					'placeholder'=>'Entrez le code présent sous l’appareil',
					'name'=>'id'])?>
        </div>

        <br>

        </div>
          <div class="rounded-bottom" style="background-color: #DCDCDC;">
          <!-- Confirmation button -->
          
          <br>

          <div class="row">
            <div class="col">
              <div class="text-center">
                <a href="" >
                  <img src="<?php echo base_url()?>images/icon-croix.png" alt="logo" style="width:20%" >
                </a>
              </div>
            </div>


            <div class="col"><H4 class="text-center">Ajouter</H4></div>
              <div class="col">
                <div class="text-center">

					<?php echo form_submit(['type'=>'submit',
							'class'=>'btn btn-success rounded-pill',
							'style'=>'width:50%',
					],"Ajouter");?>
					<!--  <a href="" class="text-center">

                    <img src="<?php echo base_url()?>images/icon-check.png" alt="logo" style="width:20%" >
                  </a>-->
                </div>
              </div>
            </div>
        
            <br>

          </div>
		<?php echo form_close(); ?>

	</div>
      </div>
    </div>
  </div>

</body>
</html>
