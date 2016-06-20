<?php include ('header.php'); ?>
<div style="font-size:100%" class="b-cont">
<div class="service_page">
<div class="container-fluid">
	<!--<div class="about-us-banner">
		<img src="images/banner/banner2.jpg" alt="" width="100%">
	</div>-->
	<div class="content row">
			<?php include ('sidebar.php'); ?>
			<div class="col-sm-9">
				<div class="service_data">
				<?php $abouts = get_Submenucontent_val($segment);  if(isset($abouts[0]['content'])) { ?>
					<h3 class="title"><span><?php echo $abouts[0]['cat_name'];?></span></h3>

					<?php echo $abouts[0]['content'];?>
					<?php } else echo "Please add Content"; ?>
				</div>
			</div>
	</div>
	</div>
	</div>
<?php include ('footer.php'); ?>