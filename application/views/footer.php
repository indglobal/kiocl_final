	<section id="sixth-section" class="clearfix">
		<div class="footer">
			<div class="col-sm-5">
				<article>
					<h3><img src="images/logo-new.png" alt="Kiocl Logo" width="40px;">About KIOCL</h3>
					<p>
						KIOCL Ltd , a wholly owned Government of India Enterprise, was established in 1976 to develop the mine and plant facilities to produce 7.5 million tonnes of concentrate per year.
					</p>
				</article>
			</div>
			<div class="col-sm-3 foottwo">
		
				<h3>COMPANY</h3>
				<ul>
					<li><a href="javascript:void(0);">Profile</a></li>
					<li><a href="javascript:void(0);">Vision &amp; Mission</a></li>
					<li><a href="javascript:void(0);">History</a></li>
					<li><a href="javascript:void(0);">The Road Ahead</a></li>
					<li><a href="javascript:void(0);">Objective</a></li>
					<li><a href="javascript:void(0);">Our Chairman</a></li>
					<li><a href="javascript:void(0);">Board of Directors</a></li>
					<li><a href="javascript:void(0);">Top Management</a></li>
					<li><a href="javascript:void(0);">Citizen Charter</a></li>
				</ul>
				
			</div>
			<div class="col-sm-4">

				<h3>PERFORMANCE</h3>
				<ul>
					<li><a href="javascript:void(0);">Profile</a></li>
					<li><a href="javascript:void(0);">Vision &amp; Mission</a></li>
					<li><a href="javascript:void(0);">History</a></li>
					<li><a href="javascript:void(0);">The Road Ahead</a></li>
					<li><a href="javascript:void(0);">Objective</a></li>
					<li><a href="javascript:void(0);">Our Chairman</a></li>
					<li><a href="javascript:void(0);">Board of Directors</a></li>
					<li><a href="javascript:void(0);">Top Management</a></li>
					<li><a href="javascript:void(0);">Citizen Charter</a></li>
				</ul>

			</div>
			<div class="clearfix"></div>
			<div class="connect-with-us">
					<ul class="list-inline">
						<li><a href="javascript:void(0);">Connect with us:</a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
					</ul>
			</div>
		</div>
		<div class="footer-items">
		 <div class="footthree">
    
      <div class="row">
        <div class="col-md-4 disclaimer">
          <p>2009,KIOCL Limited, Bengaluru. | Disclaimer</p>
        </div>
        <div class="col-md-3 indglobe">
        <p>Designed by:<a href="javascript:void(0)">www.indglobal.in</a></p>
        </div>
        <div class="col-md-5 feed">
          <ul class="list-inline">
            <li><a href="javascript:void(0);">HOME</a></li>
            <li><a href="javascript:void(0);">FEEDBACK</a></li>
            <li><a href="javascript:void(0);">RIGHT TO INFORMATION</a></li>
            <li><a href="javascript:void(0);">DOWNLOADS</a></li>
            <li><a href="javascript:void(0);">SITEMAP</a></li>
          </ul>
        </div>
      </div>
    
  </div>
		</div>
	</section>
	</div>
</body>
<script src="<?php echo base_url();?>bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/script.js"></script>
<script src="<?php echo base_url();?>js/jquery.blueimp-gallery.min.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-image-gallery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.cookie.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		if($.cookie("theme") == 'theme-styles'){
			document.getElementById('theme-white').disabled = true;
			document.getElementById('theme-styles').disabled = false;
		}else{
			document.getElementById('theme-white').disabled = false;
			document.getElementById('theme-styles').disabled = true;
		}
		$('#black-theme').click(function(){
			document.getElementById('theme-white').disabled = true;
			document.getElementById('theme-styles').disabled = false;
			$.cookie("theme", "theme-styles");
		});
		$('#normal-theme').click(function(){
			document.getElementById('theme-white').disabled = false;
			document.getElementById('theme-styles').disabled = true;
			$.cookie("theme", "theme-white");
		});
	});

$(document).ready(function(){
	$('.b-cont p,h1,h2,h3,h4,h5,h6,span,text').css('font-size','100%');
});
	$('.fontSize').on('click',function(){
        if($(this).attr('data') == 'plus'){
        	changeFont('pluse');
        }else if($(this).attr('data') == 'mins'){
        	changeFont('min');
        }else if($(this).attr('data') == 'default'){
        	changeFont('def');
        }

	});
	function changeFont(ele){
		if(ele == 'min'){
			myfont = parseInt($('.b-cont').attr('style').split(":")[1].split("%")[0]) - 10;
			fontSize = parseInt($('.b-cont').attr('style').split(":")[1].split("%")[0]) - 10 + "%";
		}else if(ele == 'pluse'){
			myfont = parseInt($('.b-cont').attr('style').split(":")[1].split("%")[0]) + 10;
			fontSize = parseInt($('.b-cont').attr('style').split(":")[1].split("%")[0]) + 10 + "%";
		}else if(ele == 'def'){
			myfont = 100;
			fontSize = '100%';
		}
		if(myfont > 70 && myfont < 130){
	        $('.b-cont').css({'font-size':fontSize});
	        $('.b-cont p,h1,h2,h3,h4,h5,h6,span,text').css({'font-size':fontSize});
    	}
	}
	// $('.background').on('click',function(){
	// 	if($(this).attr('data') == 'black'){
	// 		$('.b-cont').css('color','#ffffff');
	// 		$('.b-cont p,h1,h2,h3,h4,h5,h6,span,text,div').css('color','#ffffff');
	// 		$('.b-cont p,h1,h2,h3,h4,h5,h6,span,text,div').css('background','#333');
	// 	}else{
	// 		$('.b-cont').css('color','#333');
	// 		$('.b-cont p,h1,h2,h3,h4,h5,h6,span,text,div').css('color','#333');
	// 		$('.b-cont p,h1,h2,h3,h4,h5,h6,span,text,div').css('background','#ffffff');
	// 	}
	// });

</script>
</html>