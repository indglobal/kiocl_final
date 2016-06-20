<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> ITI </title>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>	
	<link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="plugins/bootstrap/css/bootstrap.theme.css" rel="stylesheet">
	<link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/menu-left.css" rel="stylesheet">
</head>
<body>

<div class="fullWidth">
	

	<?php 
		include_once 'header.php';
	?>
	<?php
		include_once 'topMenu.php';
	?>

	<div class="containerWidth homeSlider" style="padding:0px 15px">
			
			<div class="imageBack"> .</div>
	</div>

	<?php 
		include_once 'bottomMenu.php';
	?>

	<div class="containerWidth backgroundBody">	
		<div class="row margin-Bottom">
		  <div class="col-md-3">
		  
		  			


			    <div class="nav-side-menu">
    
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">


                 <li >
                  <i class="glyphicon glyphicon-play"></i> DEFENCE PRODUCTS <span class="arrow"></span>
                </li>
                <ul class="sub-menu collapse" id="products" style="display:inherit">
                     <li><a href="defence">ORDERWIRE SECRECY</a></li>
                    <li><a href="mil">MIL PCM SECRECY</a></li>
                    <li><a href="anada">ANADA MK II BEU</a></li>
                    <li><a href="stm1">STM1 ENCRYPTOR</a></li>
                    <li><a href="beu">BEU IP</a></li>
                    <li><a href="fax">FAX ENCRYPTOR</a></li>
                   
                

                 


            </ul>
     </div>
</div>






		  		
		  </div>

		  <div class="col-md-9 submenu">
		  <h1><span class="submenuOne">MIL PCM SECRECY</span></h1>

		  <div class="row">
		  	<div class="col-md-9">
		  	
		  	<p class="text-justify">Mil PCM Secrecy: MIL PCM Secrecy is a ruggedised encryptor to encryprt and decrypt 2 Mbps / E1 data of PCM Format. It can accept various types of Signalling format like CAS, CCS, PRI, ADPCM, ATM etc., It can work from Internal, External or Recovered clock. It uses Proprietary algorithm. It meets stingent Defence Envirommental Specifications of JSS 55555 and EMI/EMC Specifications of MIL STD 461C. It works from 230V AC or -48v DC. Normally works from AC and in case of failure automatically swithches over to DC working. </p> 
		  	
		  	
		  
		  	
		  
		  	</div>
			<div class="col-md-3">
			<img src="images/mil.jpg">
			</div>
		  </div>
		  </div>

		</div>

		
		
		

	</div>


	<?php 
		include_once 'footer.php';
	?>


</div>

<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>