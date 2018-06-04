<?php



/**



 * The header for our theme



 *



 * This is the template that displays all of the <head> section and everything up until <div id="content">



 *



 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials



 *



 * @package picurt



 */















?>























<!doctype html>



<html <?php language_attributes(); ?>>







<head>



	<meta charset="<?php bloginfo( 'charset' ); ?>">



	<meta name="viewport" content="width=device-width, initial-scale=1">



	<link rel="profile" href="https://gmpg.org/xfn/11">







	<link href='https://fonts.googleapis.com/css?family=Kelly Slab' rel='stylesheet'>



<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch" rel="stylesheet">



<link href="https://fonts.googleapis.com/css?family=Niconne" rel="stylesheet">



<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>







<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">



<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>











<script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.js">$.noConflict();</script>



<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/6.4.1/css/intlTelInput.css">



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/6.4.1/js/intlTelInput.min.js">$.noConflict();</script>



<style>



 .hide {



    display: none;



 }



</style>















	<?php  wp_head();



	



	$custom_logo_id = get_theme_mod( 'custom_logo' );



$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );



	



	?>



</head>







<body onscroll="loader()"  id="myPage">



	<!-- header section start -->



	<header>



	



		<div id="navbar">







			<div class="container-fluid">







				<div class="row row-margin">



					<div class="col-sm-6">



	<a class="logo" href="<?php echo site_url(); ?>"><img src="<?php echo $image[0];?>" alt=""> <span><?php echo get_bloginfo( 'name' ); ?></span></a>



<li id="toggler" onClick="mob_resp()" class="right"><i class="fas fa-bars"></i></li>







					</div>



					<div class="full-res col-sm-6">







							<?php



								wp_nav_menu( array(



									'theme_location' => 'menu-1', 'container' => '', 'menu_class' =>'right',



									));	



						



								?>



								























					</div>















				</div>







				







			</div>







<div class="mob-res">



<div onClick="mob_resp()" class="res-off right"><i class="fas fa-times"></i></div>



							<?php



								wp_nav_menu( array(



									'theme_location' => 'menu-1', 'container' => '', 'menu_class' =>'right',



									));	



						



								?>



								























					</div>







		</div>



























<?php  



		



		



		



	







global $current_user;



      get_currentuserinfo();



		



		



		form();



		



		



		



		



		?>	



		



			



				



					



						



							



									



<script>



	



	$( "#menu-item-647" ).click($(this).css( "display", "none" ));



		//$( "#menu-item-104" ).css( "display", "inline-block" );







//mobile responsive start



function mob_resp(){



  



$(".mob-res").toggle();



            $("#navbar li").css("display", "block");



        



  $("#navbar ul").removeClass("right");



  



}



// mobile responsive end







	



</script> <?php















	



















		?>



	</header>




<script src="<?php echo bloginfo('template_url'); ?>/js/reg_form_index.js"></script>






<script>



var templateDir = "<?php bloginfo('template_directory') ?>";



var siteUrl = "<?php echo site_url(); ?>";







</script>







