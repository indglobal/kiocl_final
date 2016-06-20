<!DOCTYPE html>
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url();?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url();?>css/blueimp-gallery.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-image-gallery.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
	<link id="theme-styles" rel="stylesheet" href="<?php echo base_url();?>css/themeStyle.css">
	<link id="theme-white" rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/white.css">
</head>
<body>
<?php 

function buildCategories($parent, $category) {
	 if (isset($category['parent_cats'][$parent])) {
	 	$max_columns = 3; //columns will arrange to any number (as long as it is evenly divisible by 12)
$column = 12/$max_columns; //column number
$total_items = count($category['parent_cats'][$parent]);
$remainder = count($category['parent_cats'][$parent])%$max_columns; //how many items are in the last row
$first_row_item = ($total_items - $remainder); //first item in the last row
$i=0;
	 	foreach ($category['parent_cats'][$parent] as $cat_id) {
	 		
	 		if (!isset($category['parent_cats'][$cat_id])) {
	 			if($category['categories'][$cat_id]['parent_id'] == 0){
	 				if ($i%$max_columns==0) { // if counter is multiple of 3 
                		
 echo "<div class='row'>";
    }  if ($i >= $first_row_item) {  
    	$rems = 12/$remainder;
    echo  "<div class='col-md-$rems'>";
    } else { 
    echo  "<div class='col-md-$column'>";
   } 
	 			echo "<h3 class='menu-title'>".$category['categories'][$cat_id]['cat_name']."</h3>";
	 			echo "</div>";       

    $i++; 

    if($i%$max_columns==0) { 
    echo "</div>"; 
  } 
	 		}
	 			else
	 			{
	 				
	 			echo "<li>\n  <a href='" . base_url().'user/cms/'.$category['categories'][$cat_id]['cat_id']. "'>" . $category['categories'][$cat_id]['cat_name'] . "</a>\n</li> \n";
	 		}

	 		}
	 		 if (isset($category['parent_cats'][$cat_id])) {
	 		 	//print_r($category['categories'][$cat_id]);
	 		 	if ($i%$max_columns==0) { // if counter is multiple of 3 
                		
 echo "<div class='row'>";
    }  if ($i >= $first_row_item) {  
    	$rems = 12/$remainder;
    echo  "<div class='col-md-$rems'>";
    } else { 
    echo  "<div class='col-md-$column'>";
   } 
	 		 	echo "<h3 class='menu-title'>".$category['categories'][$cat_id]['cat_name']."</h3>";
	 		 	 buildCategories($cat_id, $category);
	 		 	echo "</div>";       

    $i++; 

    if($i%$max_columns==0) { 
    echo "</div>"; 
  } 
	 		 }

	 		  
	 	}
	 }

	}
	?>

	<div class="main-container">

		<section class="header" id="first-section">
			<nav>
				<header>
				    <div class="menu row">
				    	<div class="col-sm-2">
				    	<div class="menu-icon menu-icon1 text-center "><a href="#">MENU <span class="glyphicon glyphicon-menu-hamburger"></span></a>
				    	</div>
				    		<div class="head_menus">
				    			<div class="col-xs-6">
				    				<img src="<?php echo base_url();?>/images/small-white-logo-icon.png">
				    			</div>
				    			<div class="col-xs-6 text-right">
				    				<div class="asd menu-icon1">
				    					<a href="#"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
				    				</div>
				    			</div>
				    		</div>
				    	
				    	</div>
				    	
				    	

				    	<div class="col-sm-2">
						</div>
						 <div class="col-md-8 col-sm-12 text-right menu-items">

						 	<div class="row">
						 		<div class="col-sm-7 col-xs-12 text-center">
						 			<div class="row menu_datas">
						 				<div class="col-xs-12 col-sm-4 home_contact">
						 					<p><a href="<?php echo base_url();?>">Home</a> &nbsp;|&nbsp; <a href="<?php echo base_url()?>user/cms/8">Contact Us</a></p>
						 				</div>
						 				<div class="col-xs-12 col-sm-4 screen_read ">
						 					<a href="#"><img src="<?php echo base_url();?>/images/monitor.png">&nbsp;Screen Reader</a>
						 				</div>
						 				<div class="col-xs-12 col-sm-4 fonts_colors">
						 						<ul class="list-inline font_color">
											 		<li class="fontsize fontSize" data='mins' ><a  href="javascript:void(0);">A<sup>-</sup></a></li>
											 		<li class="fontsize fontSize" data='default'><a href="javascript:void(0);">A<sup></sup></a></li>
											 		<li class="fontsize fontSize" data='plus'><a href="javascript:void(0);">A<sup>+</sup></a></li>
											 		<li class="black background" data='black'><a id="black-theme" href="javascript:void(0);">A</a></li>
											 		<li class="grey background" data='grey'><a id="normal-theme" href="javascript:void(0);">A</a></li>
						 						</ul>
						 				</div>
						 			</div>
						 		</div>
						 		<div class="col-sm-5">
						 			<div class="row">
						 				<div class="col-sm-1">
						 							
						 				</div>
						 				<div class="col-sm-11 col-xs-12">
						 					<ul class="list-inline text-center">
						 						<li><select class="select-language">
														<option value="">Please Select</option>
														<option value="">Hindi</option>
														<option value="">English</option>
													</select>
												</li>
							 					<li><div class="search_area">
								 				<input class="inp-search" name="s" placeholder="Search" type="text">
								 				<a class="bttns-search" href="javascript:void(0);"> <img src="<?php echo base_url();?>/images/loupe.gif-2011-04-08.png"></a>
								 				</div>
								 				</li>
						 					</ul>		
						 				</div>
						 			</div>		
						 			
						 		</div>
						 	</div>
						 </div> 

					</div>
			        <div class="show-hide-menu">
			        	<div class="close-menu">X</div>
			        	<?php echo buildCategories(0, $category);?>
					
			        </div>
				    <div>
			    </div>
			</header>
			</nav>
		</section>

	<!-- 			
		<div class="logo">
			<a href="http://1global.tk/kiocl/">
				<table>
					<tr>
						<td><img src="images/logo-new.png" alt="kiocl logo"></td>
						<td>
						<table>
							<tr>
								<td><span class="logo-title">KIOCL Limited</span></td>
							</tr>
							<tr><td><span class="logo-title govt-of-india">(Govt. Of India Enterprise)</span></td></tr>
						</table>
						</td>
					</tr>
				</table>
			</a>
		</div> -->

	<div style="font-size:100%" class="b-cont">
	<section class="home-slider clearfix" id="second-section">
		<div class="slidedata">
			
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->

  <!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">

 
 <?php 
 						$counter=0;
                        foreach($query4 as $slide) { ?>
    <div class="item <?php if($counter == 0) echo "active";?>">
    <div class="carousel-caption">
		<h2><?php echo $slide->title;?></h2>
	</div>
     <img height="308" src="<?php echo base_url().'assets/uploads/slider/'.$slide->url;?>" class="img-responsive">
   
    </div>
    <?php $counter++; } ?>

   
  </div>

  <!-- Controls -->
  	<div class="logoimage">
				<img src="<?php echo base_url();?>images/KIOCL-Logo.png">
	</div>
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
		<!-- <div id="Carousel" class="carousel slider-carousel slide home-page-slider carousel-fade col-lg-8 col-offset-2">

	        <div class="carousel-inner">
	        	<div class="item active">
	        		<div class="carousel-caption">
				        <h3>Premier Pelletizing and Pig Iron complex,Mangaluru</h3>
				     </div>
	             	<img src="images/banner/banner2.jpg" class="img-responsive">
	            </div>
	            <div class="item">
	            	<div class="carousel-caption">
	            		<h3>President of India presented 'RajaBhasha Keerthi shield' to Sri.Malay Chatterjee,CMD</h3>
	            	</div>
	                <img src="images/banner/banner4.jpg" class="img-responsive">
	            </div>
	           <div class="item">
	           		<div class="carousel-caption">
	           			<h3>Flagging off Pellet shipment to Iran under the <strong>Make in India</strong> concept</h3>
	           		</div>
	            	<img src="images/banner/banner5.jpg" class="img-responsive">
	            </div>
	        </div>

	        <a class="left carousel-control" href="#Carousel" data-slide="prev">
	            <span class="glyphicon glyphicon-chevron-left"></span>
	        </a>
	        <a class="right carousel-control" href="#Carousel" data-slide="next">
	            <span class="glyphicon glyphicon-chevron-right"></span>
	        </a>
		</div> -->
	</section>
