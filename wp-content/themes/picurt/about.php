<?php



/*







Template Name: About us







*/







get_header();



?>



	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/about.css"/>



<style>.intl-tel-input{







width: 100%;







}</style>



<div id="extra" class="page-wrap">







			







			<!-- Main -->



				<section id="main">







					<!-- Banner -->



						<section id="banner" style="background-image: url(<?php echo get_the_post_thumbnail_url( 94, 'full' ); ?>)">



							<div class="inner">



								<h1>Hey, I'm Picurt</h1>



								<p>ABOUT US<a href="https://templated.co"></a></p>



								<ul class="actions">



									<li><a href="#contact" style="background: none" class="button alt scrolly big">Contact</a></li>



								</ul>



							</div>



						</section>







					<!-- Gallery -->



					<?php /*	<section id="galleries">







							<!-- Photo Galleries -->



								<div class="gallery">



									<header class="special">



										<h2>What's New</h2>



									</header>



									<div class="content">



										<?php







		$args = array(



			'post_type' => 'post',



			'posts_per_page' => 8,















		);







		$loop = new WP_Query( $args );



		while ( $loop->have_posts() ): $loop->the_post();



		$featuredImage = get_the_post_thumbnail_url( get_the_ID(), 'full' );



		?>



										<div class="media">



											<a href="images/fulls/01.jpg"><img src="<?php echo  $featuredImage; ?>" alt="" title="This right here is a caption." /></a>



										</div>



										



												<?php endwhile; wp_reset_query();  ?>







										



									</div>



									<footer>



										<a href="gallery.html" class="button big">Full Gallery</a>



									</footer>



								</div>



						</section> */?>







					<!-- Contact -->



						<section id="contact">



							<!-- Social -->



								<div class="social column">



									<h3>About Me</h3>



									<p>Hey there!</p>


<p>
Picurt is a platform connecting Artists to spread colours of their imagination! </p>


<p>
Picurt is an online art gallery to display your artworks and to connect with fellow artist



based on their respective location and art categories. At Picurt, we want you to picture your



art, share your creativity, and paint meeting our ever increasing artist network. We believe



in diversity and culture. We believe in idea of promoting and bringing art from different



parts of world at this online art gallery </p>


<p>
During his Paris voyage, Vincent Van Gogh had frequented the circle of the Australian artist



John Peter Russell, and met fellow students Émile Bernard, Louis Anquetin and Henri de



Toulouse-Lautrec. He often met various artists at places to adapt and to discover new styles



from them, and exhibit his artworks to reach wider audience.</p>


<p>
We may not bring you the masters of that age but we can definitely ease your journey in



finding their present counterparts.</p>



									<!-- <h3>Follow Me</h3>



									<ul class="icons">



										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>



										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>



										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>



									</ul> -->



								</div>







							<!-- Form -->



								<div class="column">



								<div style="opacity: 1; position: absolute; top: 20px; left: 0; height: 12%;" class="alert alert-danger alert-dismissible fade in">



    <a style="text-decoration: none;" href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>



  </div>



									<h3>Get in Touch</h3>



									<form action="#" method="post">



										<div style="margin-bottom: 0px; width: 100%;" class="field half first">



											<label for="name"></label>



											<input name="name" id="for_name" type="text" placeholder="Name">



										</div>



										<div style="margin-bottom: 0px;" class="field half first">



											<label for="email"></label>



											<input name="email" id="for_email" type="email" placeholder="Email">



										</div>



										<div style="position: relative; margin-bottom: 0px;" class="field half">



											<label for="phone"></label>



											<input name="phone" id="for_phone" type="tel" placeholder="Phone">

											<span style="color: #34beba; position: absolute; top: 21px; right: 15px;" id="valid-msg" class="hide"><i class="fas fa-check-circle"></i></span>



					<span style="color: #f4405b; position: absolute; top: 21px; right: 15px;" id="error-msg" class="hide"><i class="fas fa-times-circle"></i></span>



										</div>



										



										



										<div class="field">



											<label for="message"></label>



											<textarea name="message" id="for_message" rows="6" placeholder="Message"></textarea>



										</div>



										<ul class="actions">



											<li><input onClick="mail()" value="Send Message" class="button" type="button"></li>



										</ul>



									</form>



								</div>







						</section>







					<!-- Footer 



						<footer id="footer">



							<div class="copyright">



								&copy; Untitled Design: <a href="https://templated.co/">TEMPLATED</a>. Images: <a href="https://unsplash.com/">Unsplash</a>.



							</div>



						</footer>  -->



				</section>



		</div>







<script>



	

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;




    return re.test(String(email).toLowerCase());
}


	function mail(){



if(!validateEmail($("#for_email").val())){ $(".alert").css("display", "block");



      $(".alert").html("Please check email..!");

      $('.alert').delay(1500).fadeOut(100); exit(); }



var data = {



  name: $("#for_name").val(),



  email: $("#for_email").val(),



	phone: $("#for_phone").val(),



  message: $("#for_message").val(),



	nonce:'mail'



};



$.ajax({



  type: "POST",



  url: "<?php bloginfo('template_url'); ?>/ajaxlogin.php",



  data: data,



  success: function(data, status){ data = $.trim(data);



	  if(data==1){ 



	  



	$(".alert").css("display", "block");



		  		  	$(".alert").removeClass("alert-danger");







		  	$(".alert").addClass("alert-success");



		  $(".alert").html("Message Sent..!")


$('.alert').delay(1000).fadeOut(100);








		  



	  }else{ 	$(".alert").css("display", "block");



			$(".alert").html("Fill all details..!");

			$('.alert').delay(1500).fadeOut(100);



 }



	  return false;



  }



});



}















var telInput = $("#for_phone"),



  errorMsg = $("#error-msg"),



  validMsg = $("#valid-msg");







// initialise plugin



telInput.intlTelInput({



utilsScript:"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"



});







var reset = function() {



  telInput.removeClass("error");



  errorMsg.addClass("hide");



  validMsg.addClass("hide");



};







// on blur: validate



telInput.blur(function() {



  reset();



  if ($.trim(telInput.val())) {



    if (telInput.intlTelInput("isValidNumber")) {



      validMsg.removeClass("hide");



      /* get code here*/



      var getCode = telInput.intlTelInput('getSelectedCountryData').dialCode;



 


    } else {



      telInput.addClass("error");



      errorMsg.removeClass("hide");



    }



  }



});







// on keyup / change flag: reset



telInput.on("keyup change", reset);











</script>



