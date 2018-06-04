<?php



/**



 * The template for displaying the footer



 *



 * Contains the closing of the #content div and all content after.



 *



 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials



 *



 * @package picurt



 */







?>











	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/footer/footer-distributed-with-contact-form.css">



		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/footer/footer-distributed-with-address-and-phones.css">







<?php wp_footer();







$custom_logo_id = get_theme_mod( 'custom_logo' );



$image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>



















<footer class="footer-distributed">







			<div class="footer-left">







				<h3>	<a class="logo" href="<?php echo site_url(); ?>"><img src="<?php echo $image[0];?>" alt=""> <span><?php echo get_bloginfo( 'name' ); ?></span></a>



</h3>







				<p class="footer-links full-res-footer">



					<a href="<?php echo site_url(); ?>">Home</a>



					·



					<a href="<?php echo site_url(); ?>/terms-conditions/">Terms</a>



					·



					<a href="<?php echo site_url(); ?>/privacy">Privacy</a>



					·



					<a href="<?php echo site_url(); ?>/about-us">About</a>



					·



					<a href="<?php echo site_url(); ?>/faqs">Faq</a>



					



				</p>







				<p class="footer-company-name full-res-footer">PICURT ALL RIGHTS RESERVED &copy; 2018-2019</p>







				<div class="footer-icons full-res-footer">



					<a target="_blank" href="https://www.instagram.com/picurt2017/"><i class="fab fa-instagram"></i></a>



					<a target="_blank" href="https://twitter.com/picurt2017"><i class="fab fa-twitter"></i></a>



					<a target="_blank" href="https://www.facebook.com/picurt2017"><i class="fab fa-facebook-f"></i></a>







				</div>







			</div>



			



			<div class="footer-center full-res-footer">







				<div>



					<i class="fa fa-map-marker"></i>



          <p><span>Koramangala 4th block</span> Bangalore, India</p>



				</div>







				<div>



					<i class="fa fa-phone"></i>



					<p>+1 555 123456</p>



				</div>







				<div>



					<i class="fa fa-envelope"></i>



					<p><a href="mailto:info@picurt.com">info@picurt.com</a></p>



				</div>







			</div>







			<div class="footer-right">







				<p>Contact Us</p>



				







				<form style="position: relative;" action="" method="post">



          <div style=" height: 12%; opacity: 1;" class="mail_alert alert alert-danger alert-dismissible fade in">

    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

  </div>



					<input id="form_name" type="text" name="name" placeholder="Name" />



          <div style="position: relative;">

					<input id="form_phone" type="tel" name="phone" placeholder="Phone" />



					<span style="color: #34beba; position: absolute; top: 12px; right: 15px;" id="valid-msg" class="hide"><i class="fas fa-check-circle"></i></span>



					<span style="color: #f4405b; position: absolute; top: 12px; right: 15px;" id="error-msg" class="hide"><i class="fas fa-times-circle"></i></span>



        </div>



					<input id="form_email" type="email" name="email" placeholder="Email" required="required" />



					<textarea id="form_message" name="message" placeholder="Message"></textarea>



					<button onClick="mail()" type="button">Send</button>







				</form>







			</div>







<div class="footer-center mob-res-footer">







				<div>



					<i class="fa fa-map-marker"></i>



					<p><span>Koramangala 4th block</span> Bangalore, India</p>



				</div>







				<div>



					<i class="fa fa-phone"></i>



					<p>+1 555 123456</p>



				</div>







				<div>



					<i class="fa fa-envelope"></i>



          <p><a href="mailto:info@picurt.com">info@picurt.com</a></p>



				</div>







			</div>







	<p class="footer-links mob-res-footer">



					<a href="<?php echo site_url(); ?>">Home</a>



					·



					<a href="<?php echo site_url(); ?>/terms-conditions">Terms</a>



					·



					<a href="<?php echo site_url(); ?>/privacy">Privacy</a>



					·



					<a href="<?php echo site_url(); ?>/about-us">About</a>



					·



					<a href="<?php echo site_url(); ?>/faqs">Faq</a>



					



				</p>







			<p class="footer-company-name mob-res-footer">PICURT ALL RIGHTS RESERVED &copy; 2018-2019</p>







				<div class="footer-icons mob-res-footer">



					<a target="_blank" href="https://www.instagram.com/picurt2017/"><i class="fab fa-instagram"></i></a>



          <a target="_blank" href="https://twitter.com/picurt2017"><i class="fab fa-twitter"></i></a>



          <a target="_blank" href="https://www.facebook.com/picurt2017"><i class="fab fa-facebook-f"></i></a>







				</div>















   



























		</footer>











    



		  



		  



		



		  



		  







		  <script>









var telInput = $("#form_phone"),



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






function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;




    return re.test(String(email).toLowerCase());
}






function mail(){

if(!validateEmail($("#form_email").val())){ $(".mail_alert").css("display", "block");



      $(".mail_alert").html("Please check email..!");

      $('.mail_alert').delay(1500).fadeOut(100); exit(); }

var getCode = telInput.intlTelInput('getSelectedCountryData').dialCode;

 var data = {



  name: $("#form_name").val(),



  email: $("#form_email").val(),



  phone: getCode+$("#form_phone").val(),



  message: $("#form_message").val(),



  nonce:'mail'



};



$.ajax({



  type: "POST",



  url: "<?php bloginfo('template_url'); ?>/ajaxlogin.php",



  data: data,



  success: function(data, status){

data = $.trim(data);

 


     if(data==1){ 



    $(".mail_alert").css("display", "block");



              $(".mail_alert").removeClass("alert-danger");







        $(".mail_alert").addClass("alert-success");



      $(".mail_alert").html("Message Sent..!");

      $('.mail_alert').delay(1000).fadeOut(100);











      



    }else{  $(".mail_alert").css("display", "block");



      $(".mail_alert").html("Fill all details..!");

      $('.mail_alert').delay(1500).fadeOut(100);



 }



  }



});



}





$('.close').click(function() {

        $("#alert").css("display", "none");



        });









</script>



			















</body>



</html>



