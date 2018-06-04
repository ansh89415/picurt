<?php
/*

Template Name: Homepage

*/




get_header();




$id = 86;
$post = get_post( $id );
$content = apply_filters( 'the_content', $post->post_content );
echo $content;


?>




<div id="artwork_page" class="container-fluid">

	<h2>Top Artworks <a href="<?php echo site_url(); ?>/artwork">View More</a></h2>

	<div id="artwork" class="row">


		<?php

		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => 4,
			'meta_key' => 'rank',
			'meta_value' => 'top'



		);

		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ): $loop->the_post();
		$featuredImage = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		?>

		<div class="col-sm-3 col-lg-3 col-md-6">

			<div class="border_box">

				<div class="img"><img src="<?php echo  $featuredImage; ?>">
				</div>

				<div class="text">
					<a target="_blank" href="<?php the_permalink($post->ID)?>"><p><?php echo the_title(); ?> <span></span>
						</p></a>
				</div>
			</div>


		</div>



		<?php endwhile; wp_reset_query();  ?>

	</div>








	<h2>Top Artists<a href="<?php echo site_url(); ?>/artists">View More</a></h2>

	<div id="artist" class="row">


		<?php



		$args = array(
			'role' => 'Subscriber',
			'meta_key' => 'rank',
			'meta_value' => 'top'
		);

		// The Query
		$user_query = new WP_User_Query( $args );

		// User Loop
		if ( !empty( $user_query->get_results() ) ) {
			foreach ( $user_query->get_results() as $user ) {


				$user_id = $user->ID;


$log_profile = get_user_meta( $user_id, 'log_profile', true );
$log_name = get_user_meta( $user_id, 'log_name', true );
$log_email = get_user_meta( $user_id, 'log_email', true );
$log_city = get_user_meta( $user_id, 'log_city', true );
$log_socialtype = get_user_meta( $user_id, 'log_socialtype', true );
$log_sociallink = get_user_meta( $user_id, 'log_sociallink', true );
$log_about = get_user_meta( $user_id, 'log_about', true );
$log_drive = get_user_meta( $user_id, 'log_drive', true );
$log_life = get_user_meta( $user_id, 'log_life', true );
$log_str_artcat = get_user_meta( $user_id, 'log_artcat', true );

$log_artcat = explode(' ', $log_str_artcat);


				?>

		
		<div class="col-sm-3 col-lg-3 col-md-6">

			<div class="border_box">

				<div class="img" style="background-image: url(<?php bloginfo('template_url'); ?>/img/back.jpg); background-size:cover;"><img src="<?php if($log_profile==""){ bloginfo('template_url'); ?>/img/dummy.png <?php }else { echo $log_profile; } ?>">
				</div>

				<div class="text">
					<h4>
						<?php echo $log_name; ?></h4>
						<ul class="lca">
						 <?php
					$categories = get_categories( array( 'taxonomy' => 'portfolio-category', 'hide_empty'  => 0 ) );
					
					$id=1;

								foreach( $categories as $category ) { ?>
								
						<?php if (in_array("$category->term_id", $log_artcat)){ ?>
						<li class="box">#<?php echo $category->cat_name; ?>
						</li>
						<?php } } ?>



					</ul>
					<p>
						"<?php echo $log_about; ?>"
					</p>
					<p class="location"><img src="<?php bloginfo('template_url'); ?>/img/GPS.png"></span><span><?php echo $log_city; ?></span></p>
					
					<form method="get" action="<?php echo site_url();?>/profile" >
					
					<input type="hidden" name="log_email" value="<?php echo $log_email; ?>">
					
					<p><input class="connect" type="submit" name="connect" value="Connect"></p>
					</form>

					

				</div>
			</div>


		</div>
		
		
		
		



		<?php
		}
		} else {
			echo 'No users found.';
		}
		?>







	</div>





	<h2>Artist's Spotlight</h2>

	<div id="spotlight" class="row">
		<div class="border_box">


			<?php

			
			$args = array(
			'role' => 'Subscriber',
			'meta_key' => 'spotlight',
			'meta_value' => 'yes'
		);

		// The Query
		$user_query = new WP_User_Query( $args );
			
			if ( !empty( $user_query->get_results() ) ) {
			foreach ( $user_query->get_results() as $user ) {


				$user_id = $user->ID;
				
				$log_profile = get_user_meta( $user_id, 'log_profile', true );
$log_name = get_user_meta( $user_id, 'log_name', true );
$log_email = get_user_meta( $user_id, 'log_email', true );
$log_city = get_user_meta( $user_id, 'log_city', true );
$log_socialtype = get_user_meta( $user_id, 'log_socialtype', true );
$log_sociallink = get_user_meta( $user_id, 'log_sociallink', true );
$log_about = get_user_meta( $user_id, 'log_about', true );
$log_drive = get_user_meta( $user_id, 'log_drive', true );
$log_life = get_user_meta( $user_id, 'log_life', true );
$log_str_artcat = get_user_meta( $user_id, 'log_artcat', true );

$log_artcat = explode(' ', $log_str_artcat);
				
			?>

<?php 
$author_query = array( 'posts_per_page' => '-1', 'post_type' => 'portfolio', 'author' => $user_id, 'order' => 'ASC' );
$author_posts = new WP_Query( $author_query );
			while ( $author_posts->have_posts() ): $author_posts->the_post();

			
			?>

			<div class="col-sm-3 col-lg-3 col-md-6">



			<div class="img1"><img src="<?php echo  get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>">
			</div>



			</div>

<?php
endwhile;
/* old user details */

?>




			<div class="col-sm-3 col-lg-3 col-md-6">


				<div class="img2"><img src="<?php if($log_profile==""){ bloginfo('template_url'); ?>/img/dummy.png <?php }else { echo $log_profile; } ?>">
				</div>

				<div class="text">
					<h4>
						<?php echo $log_name; ?></h4>
						<ul class="lc">
						
						 <?php
					$categories = get_categories( array( 'taxonomy' => 'portfolio-category', 'hide_empty'  => 0 ) );
					
					$id=1;

								foreach( $categories as $category ) { ?>
								
						<?php if (in_array("$category->term_id", $log_artcat)){ ?>
						<li class="box">#<?php echo $category->cat_name; ?>
						</li>
						<?php } } ?>
					</ul>
					<p>
						"<?php echo $log_about; ?>"
					</p>
					<p class="location"><img src="<?php bloginfo('template_url'); ?>/img/GPS.png ?>"></span><span><?php echo $log_city; ?></span></p>
					
					<p><input class="connect" type="button" value="Connect"></p>

				</div>

			</div>

		</div>

		<?php } }  ?>




	</div>








</div>



<?php
get_footer();
