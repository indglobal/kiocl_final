<?php include('header.php'); ?>


	<section class="clearfix" id="third-section">
	    <h3 class="whats-new">Whats New</h3>
		<div class="testimonial-slider">
		    <div id="myCarousel" class="carousel slide testimonial" data-ride="carousel">
		        <div class="carousel-inner">
		        <?php
 $counters=0;
                        foreach($query5 as $whatsnew) { ?>
    <div class="item <?php if($counters == 0) echo "active";?>">
		                <section>
		                	<h3><?php echo  $whatsnew->heading;?></h3>
		                	
				               <?php echo  $whatsnew->whatsnew_content;?>
		                	
		                	<p class="download_car"><a href="javascript:void(0);">Click To DownLoad <img src="./images/list-double-arrows.png"></a></p>
		                </section>
		            </div>
		            <?php $counters++; } ?>
		       
		    </div>
		   <!--  <div class="text-center view-all"><a href="#">View All</a></div> -->
		    <!-- Carousel controls -->
		        <a class="carousel-control left control" id="testone" href="#myCarousel" data-slide="prev">
		            <span class="glyphicon glyphicon-chevron-left"></span>
		        </a>
		        <a class="carousel-control right control" id="testone" href="#myCarousel" data-slide="next">
		            <span class="glyphicon glyphicon-chevron-right"></span>
		        </a>
		</div>
	</section>

	<section class="clearfix" id="fourth-section">
		<div class="col-xs-12 col-sm-4">

			<h3 class="four_head">About Kiocl</h3>
			
			<p><?php $about = get_Submenucontent_val(11); echo $about[0]['content'];?></p>
			
			<div class="read-more"><a href="about-us.php" class="read-more read-more-links-mob">Read More</a></div>

		</div>

		<div class="col-xs-12 col-sm-4 chair_details">
			<img src="images/malay_chatterjee.jpg" alt="" width="100%">
			<div class="director-name">
				<h2>Sri Malay Chatterjee</h2>
				<h4>Chairman-Cum-Managing Director</h4>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4">
		
				<h3 class="four_head">CMD's Profile</h3>
			<p>
				<p><?php $abouts = get_Submenucontent_val(12); echo $abouts[0]['content'];?></p>
				
			</p>
			<div class="read-more"><a href="cmd-profile.php" class="read-more read-more-links-mob">Read More</a></div>
					</div>
		<!-- <div class="clearfix read-more-links">
			<div class="col-sm-4 hidden-xs"><a href="about-us.php" class="read-more">Read More</a></div>
			<div class="col-sm-4 hidden-xs"></div>
			<div class="col-sm-4 hidden-xs"><a href="cmd-profile.php" class="read-more">Read More</a></div>
		</div> -->
	</section>

	<section class="clearfix" id="fifth-section">
		<div class="container overview-images">
			<div class="row">
			<?php 
                      foreach($query7 as $sliderr) { ?>
				<div class="col-sm-6 col-md-3 col-xs-12 img-container">
					<div>
						<img src="<?php echo base_url().'assets/uploads/'.$sliderr->url;?>" alt="">
					</div>
					<div class="blur-section">
						
						<div class="blur-content">
							<?php echo $sliderr->title;?>
						</div>
					
						<div class="gallery_main galryy">
						<button href="javascript:void(0);" class="gall_button galclix btn mybtn">Gallery</button>
						
						
						<div class="listgal">
							<ul class="list-inline gallartylist">

								<li><a href="">1</a> </li>
								<li><a href="">2</a> </li>
								<li><a href="">3</a> </li>
								<li><a href="">4</a> </li>
								
							</ul>
						</div>
							
						<!-- <a href="products.php" class="blur-links">Products >></a> -->
					</div>
				</div>
				</div>
				<?php } ?>
				
			<!-- 	<div class="col-sm-6 col-md-3 col-xs-12">
					<div>
						<div id="blueimp-gallery" class="blueimp-gallery">
					    <div class="slides"></div>
					    <h3 class="title"></h3><a class="prev"><</a><a class="next">></a><a class="close">X</a><a class="play-pause"></a>
					    <ol class="indicator"></ol>
					    <div class="modal fade">
					        <div class="modal-dialog">
					            <div class="modal-content">
					                <div class="modal-header">
					                    <button type="button" class="close" aria-hidden="true">&times;</button>
					                    <h4 class="modal-title"></h4>
					                </div>
					                <div class="modal-body next modal-body-home"></div>
					                <div class="modal-footer">
					                    <button type="button" class="btn btn-default pull-left prev">
					                        <i class="glyphicon glyphicon-chevron-left"></i>
					                        Previous
					                    </button>
					                    <button type="button" class="btn btn-primary next">
					                        Next
					                        <i class="glyphicon glyphicon-chevron-right"></i>
					                    </button>
					                </div>
					            </div>
					        </div>
					    </div>
						</div>

						<div id="links" class="text-center">
						    <a href="images/gallery/01.JPG" title="Sri Malay Chatterjee, CMD  and  officials on the occasion of Babasaheb Dr. BR Ambedkar's 125th Birth Anniversary at Corporate Office, Bengaluru on 14.04.16." data-gallery>
						        <img src="images/our_gallery.jpg" alt="">
						    </a>
						    <a href="images/gallery/02.JPG" title="CMD addressing on the occasion of in house sensitization program on prevention of sexual harassment at work places on 30.03.16 at corporate office, Bengaluru." data-gallery>
						    </a>
						    <a href="images/gallery/03.JPG" title="Smt Anjalai Ramanna, Advocate, during interactive session on prevention of sexual harassment at work places on 30.03.16 at corporate office, Bengaluru" data-gallery>
						    </a>
						    <a href="images/gallery/04.JPG" title="Shri Malay Chatterjee, CMD  addressing the gathering on the occasion of company day at  Mangaluru on 02.04.2016." data-gallery>
						    </a>
						    <a href="images/gallery/05.JPG" title="Shri Malay Chatterjee, CMD inaugurating the First Aid   Centre & OHS Cell at Pellet Plant, Mangaluru on 02.04.2016" data-gallery>
						    </a>
						    <a href="images/gallery/06.JPG" title="Classical Musical concert on the occasion of company day by Smt Jayalakshmi S Bhat at Corporate Office on 02.04.2016" data-gallery>
						    </a>
						    <a href="images/gallery/07.JPG" title="Shri N Vidyananda, D(P&P) lighting the lamp on the occasion of 41st Company Day at Corporate Office Bengaluru on 02.04.2016" data-gallery>
						    </a>
						    <a href="images/gallery/08.JPG" title="Sri Malay Chatterjee, CMD  addressed the gathering during the Second memorial lecture on Founder Chairman on 1.4.2016 at Corporate office, Bengaluru." data-gallery>
						    </a>
						    <a href="images/gallery/09.JPG" title="Dr Ramachandra TV, Scientist, Indian Institute of Science,   inaugurating the KC Khanna Memorial Lecture Series-II at corporate office,Bengaluru on 01.04.16" data-gallery>
						    </a>
						    <a href="images/gallery/10.JPG" title="Sri.Malay Chatterjee CMD inaugurating Hindi conference organised by TOLIC,Bangalore in association with M/s FCI on 30.03.2016 at Bangalore." data-gallery>
						    </a>
						    <a href="images/gallery/11.JPG" title="Shri Harbans Singh, DG, Geological Survey India visited  corporate office, Bengaluru on 27.04.2016." data-gallery>
						    </a>
						    <a href="images/gallery/12.JPG" title="Shri Malay Chatterjee,  CMD lighting the lamp on the occasion of Institute of Economic studies  seminar on Economic Development at Goa on 23.04.2016." data-gallery>
						    </a>
						    <a href="images/gallery/13.JPG" title="Shri Malay Chatterjee,  CMD addressing the gathering on  "Economic Development" at the Institute of Economic studies  seminar held at Goa on 23.04.2016." data-gallery>
						    </a>
						    <a href="images/gallery/14.JPG" title="Shri Malay Chatterjee,  CMD received the "Certificate of Excellence" at the Institute of Economic studies  seminar held at Goa on 23.04.2016." data-gallery>
						    </a>
						</div>
					</div>
					<div class="blur-section">
						<img src="images/our_gallery_blurr.jpg" alt="">
						<div class="blur-content">
							<!Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. -->
						<!-- </div> -->
						<!-- <a href="images/gallery/01.JPG" title="Sri Malay Chatterjee, CMD  and  officials on the occasion of Babasaheb Dr. BR Ambedkar's 125th Birth Anniversary at Corporate Office, Bengaluru on 14.04.16." data-gallery class="blur-links">Our Gallery >></a>
					</div> -->
				<!-- </div>  -->
			</div>
		</div>
	</section>
</div>
<?php include('footer.php'); ?>



<script>
						$(document).ready(function(){
							$('ul.gallartylist').hide();
							$('.galclix').on('click',function(){
								$('ul.gallartylist').toggle(400);
							});
						});
							
						</script>