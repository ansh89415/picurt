<?php
/*

Template Name: Add artwork

*/

if(!isset($_SERVER['HTTP_REFERER'])){
// redirect them to your desired location
header('location:../index.php');
exit;
}

get_header();

require_once ABSPATH . '/wp-admin/includes/post.php';

//user details start

$log_name = $current_user->user_login;

$user_id = $wpdb->get_var( "SELECT ID FROM wp_users WHERE user_login = '$log_name'" );
$log_email = $wpdb->get_var( "SELECT user_email FROM wp_users WHERE ID = '$user_id'" );

//user details end

//arays define start

$featured_img_url = array();
$art_cat = array();
$art_title = array();
$art_des = array();
$art_width = array();
$art_height = array();
$art_price = array();

//arrays define end







// if author post exist get title and description  start



$author_query = array( 'posts_per_page' => '-1', 'post_type' => 'portfolio', 'author' => $user_id, 'order' => 'ASC' );
$author_posts = new WP_Query( $author_query );



while ( $author_posts->have_posts() ): $author_posts->the_post();

$art_title[] = get_the_title();
$art_des[] = get_the_content();

endwhile;

// if author post exist get title and description  end







//add Ist artwork start

if ( isset( $_POST[ "add1" ] ) ) {



	$post_ida = post_exists( $art_title[ 0 ], $art_des[ 0 ] );
	
			$arta_cat = $_POST[ 'arta_cat' ];
			$titlea = $_POST[ 'titlea' ];
			$descriptiona = $_POST[ 'descriptiona' ];
			$widtha = $_POST[ 'widtha' ];
			$heighta = $_POST[ 'heighta' ];
			$pricea = $_POST[ 'pricea' ];
			


		$posta = array(
			'ID' => $post_ida,
			'post_type' => 'portfolio',
			'post_title' => $titlea,
			'post_content' => $descriptiona,
			'post_status' => 'publish', // Choose: publish, preview, future, etc.
                           
     
		);


	//if author post exist start

	if ( $post_ida ) {


		$file = $_FILES[ "arta" ][ "name" ];

		if ( $file != "" ) {
			if ( has_post_thumbnail( $post_ida ) ) {
				$attachment_id = get_post_thumbnail_id( $post_ida );
				wp_delete_attachment( $attachment_id, true );
			}
			insert_attachment( "arta", $post_id = $post_ida, $setthumb = 'false' );


		}

		// Update the post into the database
		wp_update_post( $posta );
		
		
		$terms = array();
		$terms= array( $arta_cat );
		wp_set_post_terms( $post_ida, $terms, 'portfolio-category');


	}

	//if author post exist end

	//if author post not exist start
	else {



		wp_insert_post( $posta );
		
		// Pass  the value of $post to WordPress the insert function
		// http://codex.wordpress.org/Function_Reference/wp_insert_post
		// Do the wp_insert_post action to insert it
		do_action( 'wp_insert_post', 'wp_insert_post' );


		$author_query = array( 'posts_per_page' => '-1', 'post_type' => 'portfolio', 'author' => $user_id, 'order' => 'ASC' );
		$author_posts = new WP_Query( $author_query );
		$art_title = array();


		while ( $author_posts->have_posts() ): $author_posts->the_post();

		$art_title[] = get_the_title();


		endwhile;



		$post_ida = post_exists( $art_title[ 0 ] );



$terms = array();
		$terms= array( $arta_cat );
		wp_set_post_terms( $post_ida, $terms, 'portfolio-category');
		



		$file = $_FILES[ "arta" ][ "name" ];

		if ( $file != "" ) {
			if ( has_post_thumbnail( $post_ida ) ) {
				$attachment_id = get_post_thumbnail_id( $post_ida );
				wp_delete_attachment( $attachment_id, true );
			}
			insert_attachment( "arta", $post_id = $post_ida, $setthumb = 'false' );

		}


	}
	
	$imga_path = get_the_post_thumbnail_url( $post_ida, 'full' );
list($wa, $ha) = getimagesize($imga_path);
	$ra = $ha/$wa;
if ($ra < 1.3) {
	
    // Landscape
				update_post_meta( $post_ida, 'st_sf_th', 'portfolio-long' );

} else {
    // Portrait or Square
				update_post_meta( $post_ida, 'st_sf_th', 'portfolio-squrex2' );

}

	//if author post not exist end
			update_post_meta( $post_ida, 'port-bg', '#000000a1' );
				update_post_meta( $post_ida, 'port-text-color', '#fff' );


			update_post_meta( $post_ida, 'art_cat_id', $arta_cat );
		update_post_meta( $post_ida, 'width', $widtha );
		update_post_meta( $post_ida, 'height', $heighta );
		update_post_meta( $post_ida, 'price', $pricea );
	
	if($_POST['add1']== "Submit"){
			
?><script>window.location.assign('<?php echo get_site_url(); ?>/profile');</script><?php
			
		}

}

//add Ist artwork end

//add 2nd artwork start

if ( isset( $_POST[ "add2" ] ) ) {

	$post_idb = post_exists( $art_title[ 1 ], $art_des[ 1 ] );
	
			$artb_cat = $_POST[ 'artb_cat' ];
			$titleb = $_POST[ 'titleb' ];
			$descriptionb = $_POST[ 'descriptionb' ];
			$widthb = $_POST[ 'widthb' ];
			$heightb = $_POST[ 'heightb' ];
			$priceb = $_POST[ 'priceb' ];

		$postb = array(
			'ID' => $post_idb,
			'post_type' => 'portfolio',
			'post_title' => $titleb,
			'post_content' => $descriptionb,
			'post_status' => 'publish', // Choose: publish, preview, future, etc.
			
		
		);

	//if author post exist start

	if ( $post_idb ) {



		$file = $_FILES[ "artb" ][ "name" ];

		if ( $file != "" ) {
			if ( has_post_thumbnail( $post_idb ) ) {
				$attachment_id = get_post_thumbnail_id( $post_idb );
				wp_delete_attachment( $attachment_id, true );
			}
			insert_attachment( "artb", $post_id = $post_idb, $setthumb = 'false' );


		}


		// Update the post into the database
		wp_update_post( $postb );
	
		$terms = array();
		$terms= array( $artb_cat );
		wp_set_post_terms( $post_idb, $terms, 'portfolio-category');

	 }

	//if author post exist end

	//if author post not exist start
	else {

		wp_insert_post( $postb );
		
		// Pass  the value of $post to WordPress the insert function
		// http://codex.wordpress.org/Function_Reference/wp_insert_post
		// Do the wp_insert_post action to insert it
		do_action( 'wp_insert_post', 'wp_insert_post' );


		$author_query = array( 'posts_per_page' => '-1', 'post_type' => 'portfolio', 'author' => $user_id, 'order' => 'ASC' );
		$author_posts = new WP_Query( $author_query );
		$art_title = array();


		while ( $author_posts->have_posts() ): $author_posts->the_post();

		$art_title[] = get_the_title();

		endwhile;



		$post_idb = post_exists( $art_title[ 1 ] );

$terms = array();
		$terms= array( $artb_cat );
		wp_set_post_terms( $post_idb, $terms, 'portfolio-category');
		

		$file = $_FILES[ "artb" ][ "name" ];

		if ( $file != "" ) {
			if ( has_post_thumbnail( $post_idb ) ) {
				$attachment_id = get_post_thumbnail_id( $post_idb );
				wp_delete_attachment( $attachment_id, true );
			}
			insert_attachment( "artb", $post_id = $post_idb, $setthumb = 'false' );


		}


	}

	
		$imgb_path = get_the_post_thumbnail_url( $post_idb, 'full' );
list($wb, $hb) = getimagesize($imgb_path);
	$rb = $hb/$wb;
if ($rb < 1.3) {
	
    // Landscape
				update_post_meta( $post_idb, 'st_sf_th', 'portfolio-long' );

} else {
    // Portrait or Square
				update_post_meta( $post_idb, 'st_sf_th', 'portfolio-squrex2' );

}
	//if author post not exist end

update_post_meta( $post_idb, 'port-bg', '#000000a1' );
				update_post_meta( $post_idb, 'port-text-color', '#fff' );
	update_post_meta( $post_idb, 'art_cat_id', $artb_cat );
		update_post_meta( $post_idb, 'width', $widthb );
		update_post_meta( $post_idb, 'height', $heightb );
		update_post_meta( $post_idb, 'price', $priceb );
	
	if($_POST['add2']== "Submit"){
			
?><script>window.location.assign('<?php echo get_site_url(); ?>/profile');</script><?php
			
		}
	
}

//add 2nd artwork end

//add 3rd artwork start

if ( isset( $_POST[ "add3" ] ) ) {


	$post_idc = post_exists( $art_title[ 2 ], $art_des[ 2 ] );

		$artc_cat = $_POST[ 'artc_cat' ];
			$titlec = $_POST[ 'titlec' ];
			$descriptionc = $_POST[ 'descriptionc' ];
			$widthc = $_POST[ 'widthc' ];
			$heightc = $_POST[ 'heightc' ];
			$pricec = $_POST[ 'pricec' ];


		$postc = array(
			'ID' => $post_idc,
			'post_type' => 'portfolio',
			'post_title' => $titlec,
			'post_content' => $descriptionc,
			'post_status' => 'publish', // Choose: publish, preview, future, etc.
	
		);
	
	
	//if author post exist start

	if ( $post_idc ) {




		$file = $_FILES[ "artc" ][ "name" ];

		if ( $file != "" ) {
			if ( has_post_thumbnail( $post_idc ) ) {
				$attachment_id = get_post_thumbnail_id( $post_idc );
				wp_delete_attachment( $attachment_id, true );
			}
			insert_attachment( "artc", $post_id = $post_idc, $setthumb = 'false' );


		}


		// Do some minor form validation to make sure there is content
		



		// Update the post into the database
		wp_update_post( $postc );
		$terms = array();
		$terms= array( $artc_cat );
		wp_set_post_terms( $post_idc, $terms, 'portfolio-category');



	}

	//if author post exist end

	//if author post not exist start
	else {



		wp_insert_post( $postc );
		
		// Pass  the value of $post to WordPress the insert function
		// http://codex.wordpress.org/Function_Reference/wp_insert_post
		// Do the wp_insert_post action to insert it
		do_action( 'wp_insert_post', 'wp_insert_post' );


		$author_query = array( 'posts_per_page' => '-1', 'post_type' => 'portfolio', 'author' => $user_id, 'order' => 'ASC' );
		$author_posts = new WP_Query( $author_query );
		$art_title = array();


		while ( $author_posts->have_posts() ): $author_posts->the_post();

		$art_title[] = get_the_title();

		endwhile;



		$post_idc = post_exists( $art_title[ 2 ] );

		$terms = array();
		$terms= array( $artc_cat );
		wp_set_post_terms( $post_idc, $terms, 'portfolio-category');
		




		$file = $_FILES[ "artc" ][ "name" ];

		if ( $file != "" ) {
			if ( has_post_thumbnail( $post_idc ) ) {
				$attachment_id = get_post_thumbnail_id( $post_idc );
				wp_delete_attachment( $attachment_id, true );
			}
			insert_attachment( "artc", $post_id = $post_idc, $setthumb = 'false' );


		}



	}

	
		$imgc_path = get_the_post_thumbnail_url( $post_idc, 'full' );
list($wc, $hc) = getimagesize($imgc_path);
	$rc = $hc/$wc;
if ($rc < 1.3) {
	
    // Landscape
				update_post_meta( $post_idc, 'st_sf_th', 'portfolio-long' );

} else {
    // Portrait or Square
				update_post_meta( $post_idc, 'st_sf_th', 'portfolio-squrex2' );

}
	//if author post not exist end
update_post_meta( $post_idc, 'port-bg', '#000000a1' );
				update_post_meta( $post_idc, 'port-text-color', '#fff' );
update_post_meta( $post_idc, 'art_cat_id', $artc_cat );
		update_post_meta( $post_idc, 'width', $widthc );
		update_post_meta( $post_idc, 'height', $heightc );
		update_post_meta( $post_idc, 'price', $pricec );
 if($_POST['add3']== "Submit"){
			
?><script>window.location.assign('<?php echo get_site_url(); ?>/profile');</script><?php
			
		}}

//add 3rd artwork end



// if author post already exist get details to display start


$author_query = array( 'posts_per_page' => '-1', 'post_type' => 'portfolio', 'author' => $user_id, 'order' => 'ASC' );
$author_posts = new WP_Query( $author_query );

unset($art_title);
unset($art_des);

while ( $author_posts->have_posts() ): $author_posts->the_post();

$featured_img_url[] = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$art_cat[] = get_post_meta( get_the_ID(), 'art_cat_id', true );
$art_title[] = get_the_title();
$art_des[] = get_the_content();
$art_width[] = get_post_meta( get_the_ID(), 'width', true );
$art_height[] = get_post_meta( get_the_ID(), 'height', true );
$art_price[] = get_post_meta( get_the_ID(), 'price', true );


endwhile;

// if author post already exist get details to display end







?>









<div style="background-image: url(<?php bloginfo('template_url'); ?>/img/formbg.jpg);
    background-repeat: no-repeat;
    background-size: 100% 100%;
    width: 100%;
    height: 86%;
    position: absolute;" id="artform">

	<main>
		<figure>
			<picture>

				<img src="<?php bloginfo('template_url'); ?>/img/formsideimg.jpg" alt="Citymap illustration"/>
			</picture>
		</figure>

		<form class="d" method="post" action="" enctype="multipart/form-data">


			<div class="add_art" style="margin: 30px 0;">
				<div class="headline">
					<h2 class="text-headline">Paint, Share &amp; Meet</h2>
					<h3 class="text-subheadline">Spread you art with Online Art Gallery</h3>
					<h3 class="text-subheadline">Artwork 1</h3>

					<div id="profile_img_jq" class="row">
						<div class="small-12 medium-2 large-2 columns">
							<div class="square">
								<!-- User Profile Image -->
								<img id="aimg" class="profile-pic" src="<?php if($featured_img_url[0]==""){ bloginfo('template_url'); ?>/img/dummy.png <?php }else { echo $featured_img_url[0]; } ?>">

								<!-- Default Image -->
								<!-- <i class="fa fa-user fa-5x"></i> -->
							</div>
							<div class="p-image squre-p-image">
								<i id="aicn" class="fa fa-camera upload-button"></i>
								<input id="ainp" class="file-upload" type="file" name="arta" accept="image/*" />
							</div>

						</div>
						
						<div class="small-12 medium-8 large-8 columns">
							<select id="socialtype" class="artcat" name="arta_cat" required>
								<option value="" disabled <?php if ($art_cat[0] == ""){ echo 'selected="selected"'; } ?>>Art Category</option>

							<?php 	$categories = get_categories( array( 'taxonomy' => 'portfolio-category', 'hide_empty'  => 0 ) );

								foreach( $categories as $category ) { 
								echo	'<option value="'.$category->term_id.'"'.(($art_cat[0] == $category->term_id) ? "selected": "").' > '.$category->name.' </option>';

									
										 } ?>
								
							</select>
						</div>
					</div>
				</div>

				<span>
      <input style="margin-top:45px !important;" class="text-body" id="titlea" name="titlea" type="text" placeholder="Artwork Name" maxlength="25" value="<?php echo $art_title[0]; ?>" required>
    </span>
			


				<span>
     <textarea style="height: 55px;" class="text-body" id="descriptiona" name="descriptiona" type="text" placeholder="Description" maxlength="50"  required><?php echo $art_des[0]; ?></textarea>
    </span>
			


				<span>
      <input style="width: 48%;" class="text-body" id="widtha" name="widtha" type="number" placeholder="Width (inch)" value="<?php echo $art_width[0]; ?>" required>x<input style="width: 49%;" class="text-body" id="heighta" name="heighta" type="number" placeholder="Height (inch)" value="<?php echo $art_height[0]; ?>" required>

    </span>
			


				<span>
      <input style="width: 100%;" class="text-body" id="pricea" name="pricea" type="number" placeholder="Price in ($)" value="<?php echo $art_price[0]; ?>" required>
    </span>
			




			</div>


			<div id="pic_button">
				<i id="dbk" class="back fas fa-arrow-circle-left"></i>
				<input class="text-small-uppercase" id="submit" type="submit" name="add1" value="Add Art">
								<input class="text-small-uppercase" id="submit" type="submit" name="add1" value="Submit">

				<i id="dnx" class="next fas fa-arrow-circle-right"></i>

			</div>

		</form>

		<form class="e" method="post" action="" enctype="multipart/form-data">



			<div class="add_art" style="margin: 30px 0;">
				<div class="headline">
					<h2 class="text-headline">Paint, Share &amp; Meet</h2>
					<h3 class="text-subheadline">Spread you art with Online Art Gallery</h3>
					<h3 class="text-subheadline">Artwork 2</h3>

					<div id="profile_img_jq" class="row">
						<div class="small-12 medium-2 large-2 columns">
							<div class="square">
								<!-- User Profile Image -->
								<img id="bimg" class="profile-pic" src="<?php if($featured_img_url[1]==""){ bloginfo('template_url'); ?>/img/dummy.png <?php }else { echo $featured_img_url[1]; } ?>">

								<!-- Default Image -->
								<!-- <i class="fa fa-user fa-5x"></i> -->
							</div>
							<div class="p-image squre-p-image">
								<i id="bicn" class="fa fa-camera upload-button"></i>
								<input id="binp" class="file-upload" type="file" name="artb" accept="image/*" />
							</div>
						</div>
						<div class="small-12 medium-8 large-8 columns">
							<select id="socialtype" class="artcat" name="artb_cat" required>
								<option value="" disabled <?php if ($art_cat[1] == ""){ echo 'selected="selected"'; } ?>>Art Category</option>
								
							<?php 	$categories = get_categories( array('taxonomy' => 'portfolio-category', 'hide_empty'  => 0, ) );

								foreach( $categories as $category ) { 
								echo	'<option value="'.$category->term_id.'"'.(($art_cat[1] == $category->term_id) ? "selected": "").' > '.$category->name.' </option>';

									
										 } ?> 
								
							</select>
						</div>
					</div>
				</div>

				<span>
      <input style="margin-top:45px !important;" class="text-body" id="titleb" name="titleb" type="text" placeholder="Artwork Name" maxlength="25" value="<?php echo $art_title[1]; ?>" required>
    </span>
			


				<span>
     <textarea style="height: 55px;" class="text-body" id="descriptionb" name="descriptionb" type="text" placeholder="Description" maxlength="50"  required><?php echo $art_des[1]; ?></textarea>
    </span>
			


				<span>
      <input style="width: 48%;" class="text-body" id="widthb" name="widthb" type="number" placeholder="Width (inch)" value="<?php echo $art_width[1]; ?>" required>x<input style="width: 49%;" class="text-body" id="heightb" name="heightb" type="number" placeholder="Height (inch)" value="<?php echo $art_height[1]; ?>" required>

    </span>
			


				<span>
      <input style="width: 100%;" class="text-body" id="priceb" name="priceb" type="number" placeholder="Price in ($)" value="<?php echo $art_price[1]; ?>" required>
    </span>
			




			</div>


			<div id="pic_button">
				<i id="ebk" class="back fas fa-arrow-circle-left"></i>
				<input class="text-small-uppercase" id="submit" type="submit" name="add2" value="Add Art">
								<input class="text-small-uppercase" id="submit" type="submit" name="add2" value="Submit">

				<i id="enx" class="next fas fa-arrow-circle-right"></i>

			</div>
		</form>


		<form class="f" method="post" action="" enctype="multipart/form-data">


			<div class="add_art" style="margin: 30px 0;">
				<div class="headline">
					<h2 class="text-headline">Paint, Share &amp; Meet</h2>
					<h3 class="text-subheadline">Spread you art with Online Art Gallery</h3>
					<h3 class="text-subheadline">Artwork 3</h3>

					<div id="profile_img_jq" class="row">
						<div class="small-12 medium-2 large-2 columns">
							<div class="square">
								<!-- User Profile Image -->
								<img id="cimg" class="profile-pic" src="<?php if($featured_img_url[2]==""){ bloginfo('template_url'); ?>/img/dummy.png <?php }else { echo $featured_img_url[2]; } ?>">

								<!-- Default Image -->
								<!-- <i class="fa fa-user fa-5x"></i> -->
							</div>
							<div class="p-image squre-p-image">
								<i id="cicn" class="fa fa-camera upload-button"></i>
								<input id="cinp" class="file-upload" type="file" name="artc" accept="image/*" />
							</div>
						</div>

						<div class="small-12 medium-8 large-8 columns">
							<select id="socialtype" class="artcat" name="artc_cat" required>
								<option value="" disabled <?php if ($art_cat[2] == ""){ echo 'selected="selected"'; } ?>>Art Category</option>
								
							<?php 	$categories = get_categories( array('taxonomy' => 'portfolio-category', 'hide_empty'  => 0, ) );

								foreach( $categories as $category ) { 
								echo	'<option value="'.$category->term_id.'"'.(($art_cat[2] == $category->term_id) ? "selected": "").' > '.$category->name.' </option>';

									
										 } ?> 
								
							</select>
						</div>
					</div>
				</div>

				<span>
      <input style="margin-top:45px !important;" class="text-body" id="titlec" name="titlec" type="text" placeholder="Artwork Name" maxlength="25" value="<?php echo $art_title[2]; ?>" required>
    </span>
			


				<span>
     <textarea style="height: 55px;" class="text-body" id="descriptionc" name="descriptionc" type="text" placeholder="Description" maxlength="50"  required><?php echo $art_des[2]; ?></textarea>
    </span>
			


				<span>
      <input style="width: 48%;" class="text-body" id="widthc" name="widthc" type="number" placeholder="Width (inch)" value="<?php echo $art_width[2]; ?>" required>x<input style="width: 49%;" class="text-body" id="heightc" name="heightc" type="number" placeholder="Height (inch)" value="<?php echo $art_height[2]; ?>" required>

    </span>
			


				<span>
      <input style="width: 100%;" class="text-body" id="pricec" name="pricec" type="number" placeholder="Price in ($)" value="<?php echo $art_price[2]; ?>" required>
    </span>
			




			</div>

			<div id="pic_button">
				<i id="fbk" class="back fas fa-arrow-circle-left"></i>
				<input class="text-small-uppercase" id="submit" type="submit" name="add3" value="Add Art">
								<input class="text-small-uppercase" id="submit" type="submit" name="add3" value="Submit">

				<i id="fnx" class="next fas fa-arrow-circle-right"></i>

			</div>
		</form>


	</main>


</div>


<?php
$post_ida = post_exists( $art_title[ 0 ], $art_des[ 0 ] );
if ( $post_ida ) {
	?>
	<script>
		var d = 1;
		$( "#dnx" ).css( "display", "inline-block" );
	</script>
	<?php
	$post_idb = post_exists( $art_title[ 1 ], $art_des[ 1 ] );
	if ( $post_idb ) {
		?>
		<script>
			var e = 1;
		</script>
		<?php

		$post_idc = post_exists( $art_title[ 2 ], $art_des[ 2 ] );
		if ( $post_idc ) {
			?>
			<script>
				var f = 1;
			</script>
			<?php
		}

	}


}
?>





<script>
	$( document ).ready( function () {

		var i = 0;
		$( "#submit, #add" ).css( {
			"display": "inline-block",
			"width": "35%"
		} );






		$( ".back" ).click( function () {
			i--;


			if ( i == 0 ) {

				$( ".d" ).css( "display", "block" );
				$( ".e, .f" ).css( "display", "none" );
				$( ".back" ).css( "display", "none" );
				$( "#dnx" ).css( "display", "inline-block" );
				$( "#submit" ).css( {
					"display": "inline-block",
					"width": "35%"
				} );






			}


			if ( i == 1 ) {

				$( ".e" ).css( "display", "block" );
				$( ".d, .f" ).css( "display", "none" );
				$( "#ebk" ).css( "display", "inline-block" );
				$( "#enx" ).css( "display", "inline-block" );
				$( "#submit" ).css( {
					"display": "inline-block",
					"width": "35%"
				} );



			}


		} );

		$( ".next" ).click( function () {
			i++;



			if ( i == 1 ) {

				$( ".e" ).css( "display", "block" );
				$( ".d, .f" ).css( "display", "none" );
				$( "#ebk" ).css( "display", "inline-block" );
				if ( e == 1 ) {
					$( "#enx" ).css( "display", "inline-block" );
				}
				$( "#submit" ).css( {
					"display": "inline-block",
					"width": "35%"
				} );



			}


			if ( i == 2 ) {

				$( ".f" ).css( "display", "block" );
				$( ".e, .d" ).css( "display", "none" );
				$( ".next" ).css( "display", "none" );
				$( "#fbk" ).css( "display", "inline-block" );
				$( "#submit" ).css( {
					"display": "inline-block",
					"width": "35%"
				} );

			}
		} );





	} );
</script>





<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCYH563qA5qS3LvBXhlpR2V0bkwkXErq2Q"></script>
<script type="text/javascript">
	function initialize() {
		var input = document.getElementById( 'log_city' );
		var autocomplete = new google.maps.places.Autocomplete( input );
	}
	google.maps.event.addDomListener( window, 'load', initialize );
</script>


