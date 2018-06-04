<?php

/**

 * Template part for displaying posts

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package picurt

 */



?>





<meta name="viewport" content="width=device-width, initial-scale=1">



<link href="https://fonts.googleapis.com/css?family=Niconne" rel="stylesheet">





		

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/picurt_font.css"/>



<style>





@font-face {

  font-family: 'picurt_font';

  src: url('<?php bloginfo('template_url');?>/fonts/picurt/picurt_font.eot?97675899');

  src: url('<?php bloginfo('template_url');?>/fonts/picurt/picurt_font.eot?97675899#iefix') format('embedded-opentype'),

       url('<?php bloginfo('template_url');?>/fonts/picurt/picurt_font.woff2?97675899') format('woff2'),

       url('<?php bloginfo('template_url');?>/fonts/picurt/picurt_font.woff?97675899') format('woff'),

       url('<?php bloginfo('template_url');?>/fonts/picurt/picurt_font.ttf?97675899') format('truetype'),

       url('<?php bloginfo('template_url');?>/fonts/picurt/picurt_font.svg?97675899#picurt_font') format('svg');

  font-weight: normal;

  font-style: normal;

}











/*---- responsive -----*/











  @media screen and (max-width: 600px) {



.post-thumbnail{

	height: 60%!important;

}

.icon-cancel, .icon-resize {
    
    display: none;
}



  }







  /*---- responsive -----*/

	

	.footer-distributed {

		

		display: none !important;

		

	}

	



/*single image start */

.post-thumbnail img{



	max-width: 100%;

    max-height: 100%;

    position: absolute;

    top: 0;

    left: 0;

    right: 0;

    bottom: 0;

    margin: auto;

	height: auto;

	width: auto;

}



.post-thumbnail{



	padding: 0 0px;

	text-align: center;

	height: 70%;

	



}

	#pic_single .row{

		margin: 0px;

	}



	.pic_icons{



		padding: 40px 0;

		margin: 0;



	}



	.icon-resize{



		margin: 0 20px;

	}



.icon-cancel, .icon-resize{



		font-size: 30px;

	color: #000;

	cursor: pointer;

	}

	

	.icon-diagonal{

		font-size: 30px;

	color: #000;

		    position: absolute;

    left: 60px;

    top: 20px;

		display: none;

		cursor: pointer;

	}



	.icon-download, .icon-share, .icon-facebook, .icon-twitter, .icon-pinterest, .icon-tumblr, .icon-envelope{



		font-size: 20px;

		margin: 0 10px;

		cursor: pointer;



	}



	.picic{

		display: none;



	}





	.icon-next, .icon-back{



		font-size: 20px;

		color: #000;

		position: absolute;



	}



	.icon-back{



		left: 70px;



	}

	.icon-next{



		right: 70px;



	}

	

	

	.single_content{

		

		margin: 20px 0;

	}

	

	.single_content h5{

		

		display: inline-block;

		margin: 0 10px;

		font-weight: bold;

    font-size: 14px;



		

	}

	

	.name_color{

				  color: #4990e2;

		font-size: 17px;



	}

	

	.single_content p{

				margin: 0 10px;



		

	}

	

	.single_profile{

		

		    width: 25px;

    height: 25px;

    border-radius: 15px;

		

		

		

	}

	

	.single_box{

		

		background-color: #e2e2e2;

    border-radius: 10px;

    padding: 10px 0px;

		

	}

	

	.single_content ul{

		

		list-style-type: none;

		padding: 0;

		

	}



	.single_content li{

		

		    display: inline-block;

    border: solid;

    border-radius: 25px;

    padding: 0 14px;

    margin: 0 10px;

		    border-width: 2px;



		

	}

	

	.single_content li:nth-child(2){

	

		border-color:#15d2c9; 

		color: #15d2c9;

	}

	.single_content li:nth-child(1){

	

		border-color:#f4405b; 

		color: #f4405b;

	

	}

	

	.content {

		position: relative;

		

	}

	

	.sing_heading{

		

		font-family: 'Niconne', cursive;

		font-size: 60px;

	}

	

	.a{

		

		text-decoration: none;

		color: #000;

	}

	

	

/*single image end */





</style>



	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">







<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>









<?php $user_id = get_post_field( 'post_author', get_the_ID() );

	

	

	$log_profile = get_user_meta( $user_id, 'log_profile', true );

$log_name = get_user_meta( $user_id, 'log_name', true );

$log_email = get_user_meta( $user_id, 'log_email', true );

	$art_width = get_post_meta(get_the_ID(), 'width', true );

$art_height = get_post_meta(get_the_ID(), 'height', true );

	$art_price = get_post_meta(get_the_ID(), 'price', true );

	$art_cat = get_post_meta(get_the_ID(), 'art_cat_id', true );



	

	

 ?>









<div id="pic_single" class="pic_container">

<div class="row pic_icons">



	<div class="col-sm-11"><div><span onClick="fullscreen()" class="icon-resize"></span><a class="a" href="<?php echo get_the_post_thumbnail_url(); ?>" download><span class="icon-download"></a></span><span class="icon-share"></span><a href="http://www.facebook.com/sharer.php?u='<?php echo get_the_post_thumbnail_url(); ?>'"><span class="icon-facebook picic"></span></a><a href="http://twitter.com/share?url='<?php echo get_the_post_thumbnail_url(); ?>'"><span class="icon-twitter picic"></span></a><a href="http://pinterest.com/pin/create/button/?url='<?php echo get_the_post_thumbnail_url(); ?>'"><span class="icon-pinterest picic"></span></a><a href="mailto:?Subject=Simple Share Buttons&amp;Body='<?php echo get_the_post_thumbnail_url(); ?>'"><span class="icon-envelope picic"></span></a></div></div>

	<div class="col-sm-1 right">

<a href="<?php echo site_url(); ?>/artwork"><!-- <span class="icon-cancel"></span> --></a></div>



</div>



	<div id="pic_img_height" class="row">

	<span onClick="fullscreencancel()" class="icon-diagonal"></span>

	<div id="prev" class="col-sm-1">

<?php

$next_post = get_next_post();

if($next_post) {

   echo '<a rel="prev" href="' . get_permalink($next_post->ID) . '"><span  class="icon-back"></span></a>';

} ?>



</div>



		<div class="col-sm-5 full_thumb"><?php picurt_post_thumbnail(); ?></div>

				<div id="next" class="col-sm-1"><?php

$prev_post = get_previous_post();

if($prev_post) {

   echo '<a rel="next" href="' . get_permalink($prev_post->ID) . '"><span  class="icon-next"></span></a>';

}

?>

</div>





		<div class="col-sm-5 full_content">



<div class="content">



			<header class="entry-header">

		<?php

		if ( is_singular() ) :

			the_title( '<h2 class="entry-title sing_heading">', '</h2>' );

		else :

			the_title( '<h2 class="entry-title sing_heading"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		endif;



		if ( 'post' === get_post_type() ) : ?>

		<div class="entry-meta">

			<?php

				//picurt_posted_on();

				//picurt_posted_by();

			?>

		</div><!-- .entry-meta -->

		<?php

		endif; ?>

	</header><!-- .entry-header -->







			<div class="single_content"><img class="single_profile" src="<?php if($log_profile==""){ bloginfo('template_url'); ?>/img/dummy.png <?php }else { echo $log_profile; } ?>"><h5 class="name_color"><form method="get" action="<?php echo site_url();?>/profile" >

					

					<input type="hidden" name="log_email" value="<?php echo $log_email; ?>"><input style="border: none; background: none;" class="connect" type="submit" name="connect" value="<?php echo $log_name; ?>"></form></div>

		

		

		<div class="single_box">

		<div class="single_content"><h5>Size:</h5>

			<p><?php echo $art_width; ?>" x <?php echo $art_height; ?>"</p></div>

		



			<div class="entry-content single_content">

			<h5>Description</h5>

		<?php

			the_content( sprintf(

				wp_kses(

					/* translators: %s: Name of current post. Only visible to screen readers */

					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'picurt' ),

					array(

						'span' => array(

							'class' => array(),

						),

					)

				),

				get_the_title()

			) );



			wp_link_pages( array(

				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'picurt' ),

				'after'  => '</div>',

			) );

		?>

	</div><!-- .entry-content -->

		

		<div class="single_content"><h5>Price:</h5>

			<p>$<?php echo $art_price; ?></p></div>



		</div>

		

		<div class="single_content"><ul><li><h4><?php $categories = get_categories( array( 'taxonomy' => 'portfolio-category', 'hide_empty'  => 0 ) );



								foreach( $categories as $category ) { if($art_cat==$category->term_id){ echo $category->name; } } ?></h4></li></ul>

			</div>

			</div>



</div>



	</div>







</div>







	<script>

	

		

		$(document).ready(function(){

			

			

			

			$("body").css("background-color", "#f1f1f1");

		    $(".icon-share").mouseenter(function(){

		        $(".picic").css("display", "inline-block");

		    });





		    $(".pic_icons").mouseleave(function(){

		        $(".picic").css("display", "none");

		            });



var img_ht=$(".post-thumbnail").height()/(2);

			var marg_t=$(".post-thumbnail>img").css('bottom');



			

$(".icon-next").css("top", img_ht);

$(".icon-back").css("top", img_ht);

			$(".content").css("bottom", marg_t);







		});

		

		

		

		

				$("body").keydown(function(e) {

  if(e.keyCode == 37) { // left

     $('#prev span').trigger('click');



	  

  }

  else if(e.keyCode == 39) { // right

   

	    $('#next span').trigger('click');



  }

});

		

		

		

		var c = getCookie('test');

		

		

		if(c =='1'){



			fullscreen();

	



			

		}else if(c =='0'){

			fullscreencancel();

			

			

		}

		

function fullscreen(){ 

	

setCookie('test','1','1');



	

					$(".pic_icons").css("display", 'none');



				$(".full_content").css("display", 'none');

		$(".full_thumb").removeClass("col-sm-5");



	$(".full_thumb").addClass("col-sm-10");

						$(".post-thumbnail").css("height", '100%');



			$(".icon-diagonal").css("display", 'block');

	var img_ht=$(".post-thumbnail").height()/(2);

			var marg_t=$(".post-thumbnail>img").css('bottom');



			

$(".icon-next").css("top", img_ht);

$(".icon-back").css("top", img_ht);

			$(".content").css("bottom", marg_t);







	

}

		

		

		function fullscreencancel(){

			

			setCookie('test','0','1');



			

			$(".pic_icons").css("display", 'block');



				$(".full_content").css("display", 'block');

		$(".full_thumb").removeClass("col-sm-10");



	$(".full_thumb").addClass("col-sm-5");

						$(".post-thumbnail").css("height", '70%');

			

						$(".icon-diagonal").css("display", 'none');

			var img_ht=$(".post-thumbnail").height()/(2);

			var marg_t=$(".post-thumbnail>img").css('bottom');



			

$(".icon-next").css("top", img_ht);

$(".icon-back").css("top", img_ht);

			$(".content").css("bottom", marg_t);



		}

		

		function setCookie(cname, cvalue, exdays) {

    var d = new Date();

    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));

    var expires = "expires="+d.toUTCString();

    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";

}



function getCookie(cname) {

    var name = cname + "=";

    var ca = document.cookie.split(';');

    for(var i = 0; i < ca.length; i++) {

        var c = ca[i];

        while (c.charAt(0) == ' ') {

            c = c.substring(1);

        }

        if (c.indexOf(name) == 0) {

            return c.substring(name.length, c.length);

        }

    }

    return "";

}

		

	

		</script>





<script type="text/javascript">

	

var w = $(window).width();

if (w<1000) {



$(".full_thumb").removeClass("col-sm-5");

$(".full_thumb").addClass("col-sm-12");

$(".full_content").removeClass("col-sm-5");

$(".full_content").addClass("col-sm-12");

$("#prev, #next").hide();

$(".post-thumbnail").css("height", "100%");

$(".post-thumbnail img").css("width", "100%");



}





</script>





























	<footer class="entry-footer">

		<?php //picurt_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->

