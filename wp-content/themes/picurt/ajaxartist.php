<?php

require( '../../../wp-load.php' );

require_once( ABSPATH . WPINC . '/registration.php');

$tempurl = $_POST['temp_url'];
$offset = $_POST['offset'];
$country = $_POST[ 'my_Country' ];
$artistcat = $_POST[ 'artist_cat' ];

	$args = array(
			'role' => 'Subscriber',
			'meta_key' => 'log_city',
			'meta_value' => $country,
			'number' => 1,
			'offset' => $offset,
			'meta_query' => array(
		array(
			'key' => 'log_artcat',
			'value' => $artistcat,
			'compare' => 'LIKE',
		)
	)
			
		);

		// The Query
		$user_query = new WP_User_Query( $args );
$i=0;
		// User Loop
		if ( !empty( $user_query->get_results() ) ) {
			foreach ( $user_query->get_results() as $user ) {

		


$user_id = $user->ID;
$authorList[$i]=$user_id;


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

$div.= '<div class="col-sm-3 col-lg-3 col-md-6"><input type="hidden" value="'.$user_id.'"><div class="border_box"><div class="img" style="background-image: url('.$tempurl.'/img/back.jpg); background-size:cover;"><img src="'.(($log_profile=="") ? $tempurl.'/img/dummy.png': $log_profile ).'"></div><div class="text"><h4>'.$log_name.'</h4><ul class="lca">';
	
					$categories = get_categories( array( 'taxonomy' => 'portfolio-category', 'hide_empty'  => 0 ) );
					
					$id=1;

								foreach( $categories as $category ) { 
								
						 if (in_array("$category->term_id", $log_artcat)){ 
						$div.='<li class="box">#'.$category->cat_name.'</li>';
						 } } 
	
	$div.='</ul><p>"'.$log_about.'"</p><p class="location"><img src="'.$tempurl.'/img/GPS.png"></span><span>'.$log_city.'</span></p><form method="get" action="'.site_url().'/profile"><input type="hidden" name="log_email" value="'.$log_email.'"><p><input class="connect" type="submit" name="connect" value="Connect"></p></form></div></div></div>';
				

				
		echo $div;	}; };
				
				
				



?>






		
		

		



		
	