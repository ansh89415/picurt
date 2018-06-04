<?php

/*



Template Name: Artists



*/









get_header();











$log_name = $current_user->user_login;



$user_id = $wpdb->get_var( "SELECT ID FROM wp_users WHERE user_login = '$log_name'" );

$log_email = $wpdb->get_var( "SELECT user_email FROM wp_users WHERE ID = '$user_id'" );



$user_add = get_user_meta( $user_id, 'log_add', true );





?>



<style>

@media screen and (max-width: 600px) {

.loader {

  



      left: 0!important;
    top: 0!important;
    right: 0!important;
    bottom: 0!important;
    margin: auto!important;


}


}


.loader {
        position: fixed;
    z-index: 10;
    left: 47%;
    top: 40%;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #8eb0ee;
    border-right: 16px solid #34beba;
    border-bottom: 16px solid #f4405b;
  width: 90px;
  height: 90px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

	.autocomplete {

		/*the container must be positioned relative:*/

		position: relative;

		display: inline-block;

	}

	

	.autocomplete input {

		border: 1px solid transparent;

		background-color: #f1f1f1;

		padding: 5px;

		font-size: 16px;

		margin: 0;

		box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);

	}

	

	.autocomplete select {

		border: 1px solid #ccc;

		background-color: #fff;

		padding: 5px;

		font-size: 16px;

		margin: 0;

		box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);

		border-radius: 5px;

		margin: 0 10px;

	}

	

	#myInput {

		border: 1px solid #ccc;

		background-color: #fff;

		padding: 5px;

		font-size: 16px;

		margin: 0;

		box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);

		border-radius: 5px;

		margin: 0 10px;

	}

	

	.autocomplete input[type=text] {

		background-color: #f1f1f1;

		width: 100%;

		margin: 0 10px;

	}

	

	.autocomplete input[type=submit] {

		background-color: #34beba;

		color: #fff;

		cursor: pointer;

		display: inline-block;

		width: 15%;

		border-radius: 5px;

		margin: 0 10px;

	}

	

	.autocomplete-items {

		position: absolute;

		border: 1px solid #d4d4d4;

		border-bottom: none;

		border-top: none;

		z-index: 99;

		/*position the autocomplete items to be the same width as the container:*/

		top: 100%;

		left: 0;

		right: 0;

	}

	

	.autocomplete-items div {

		padding: 10px;

		cursor: pointer;

		background-color: #fff;

		border-bottom: 1px solid #d4d4d4;

	}

	

	.autocomplete-items div:hover {

		/*when hovering an item:*/

		background-color: #e9e9e9;

	}

	

	.autocomplete-active {

		/*when navigating through the items using the arrow keys:*/

		background-color: DodgerBlue !important;

		color: #ffffff;

	}

	

	.load_artist{

		

		width: 100px;

	}

</style>













<div><img style="width: 100%;" src="<?php echo get_the_post_thumbnail_url( 94, 'full' ); ?>">

</div>













<!-- <div class="container-fluid" style="margin: 10px 0;"> -->


<div class="loader"></div>


	<form style="margin-top: 15px;" autocomplete="off" action="" method="post">

		<div class="autocomplete" style="width:100%; margin: 0 0px;">

				<h2 id="filter_heading" style="display: inline-block;">Artist Near You</h2>



			<select name="artist_cat" style="display: inline; width: 180px;">

				<option value="" disabled selected hidden  >Select Category</option>

								<option value=""  >All</option>



				<?php

					$categories = get_categories( array( 'taxonomy' => 'portfolio-category', 'hide_empty'  => 0 ) );



								foreach( $categories as $category ) { 

					echo '<option value="'.$category->term_id.'">' . $category->cat_name . '</option>';



				}

				?>



			</select>

			<input style="display: inline; width: 150px;" id="myInput" type="text" name="myCountry" placeholder="City">

			<input type="submit" value="Apply">



		</div>

	</form>

</div>



<div id="artwork_page" class="container-fluid">





	<div id="artist" class="row">





		<?php



$artistcat = $_POST['artist_cat'];



		$args = array(

			'role' => 'Subscriber',

			'meta_key' => 'log_city',

			'meta_value' => $_POST[ 'myCountry' ],

			'number' => 1,

			'offset' => 0,

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



				$log_artcat = explode( ' ', $log_str_artcat );





				?>













		<div class="col-sm-3 col-lg-3 col-md-6">

			<div class="border_box">



				<div class="img" style="background-image: url(<?php bloginfo('template_url'); ?>/img/back.jpg); background-size:cover;"><img src="<?php if($log_profile==""){ bloginfo('template_url'); ?>/img/dummy.png <?php }else { echo $log_profile; } ?>">

				</div>



				<div class="text">

					<h4>

						<?php echo $log_name; ?>

					</h4>

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

						"

						<?php echo $log_about; ?>"

					</p>

					<p class="location"><img src="<?php bloginfo('template_url'); ?>/img/GPS.png">

						</span>

						<span>

							<?php echo $log_city; ?>

						</span>

					</p>



					<form method="get" action="<?php echo site_url();?>/profile">



						<input type="hidden" name="log_email" value="<?php echo $log_email; ?>">



						<p><input class="connect" type="submit" name="connect" value="Connect">

						</p>

					</form>







				</div>

			</div>





		</div>





		<?php $i++; }  count($authorList); ?>

		



		<?php } ?>









	</div>

			<input id="tempurl" type="hidden" value="<?php bloginfo('template_url'); ?>">

			<input id="country" type="hidden" value="<?php echo $_POST[ 'myCountry' ] ?>">

			<input id="artistcat" type="hidden" value="<?php echo $artistcat; ?>">







	<div style="text-align: center; margin: 50px 0;" class="container-fluid"><button style="border-radius: 10px; padding: 10px; outline: none; letter-spacing: 1px; text-transform: uppercase; font-size: 12px; color: #000; " class="load_artist" onclick="load_artist()" value="1" type="button">Load More</button>

	</div>



</div>









<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCYH563qA5qS3LvBXhlpR2V0bkwkXErq2Q"></script>

<script type="text/javascript">

	function initialize() {

		var options = {

			types: [ '(cities)' ],

		};



		var input = document.getElementById( 'myInput' );



		var autocomplete = new google.maps.places.Autocomplete( input, options );

	}

	google.maps.event.addDomListener( window, 'load', initialize );







	var source, destination;

	var directionsDisplay;

	var directionsService = new google.maps.DirectionsService();

	google.maps.event.addDomListener( window, 'load', function () {

		new google.maps.places.SearchBox( document.getElementById( 'txtSource' ) );

		new google.maps.places.SearchBox( document.getElementById( 'txtDestination' ) );

		directionsDisplay = new google.maps.DirectionsRenderer( {

			'draggable': true

		} );

	} );

</script>



<script>

	

	function load_artist(of) {

		

		var of = $(".load_artist").val();

		var tempurl = $( "#tempurl" ).val();

		var country = $( "#country" ).val();

		var artistcat = $( "#artistcat" ).val();

		var off =Number(of)+1;

		$(".load_artist").val(off);

		$('.loader').show();

		$.ajax( {

			type: "POST",

			url: "<?php bloginfo('template_url'); ?>/ajaxartist.php",

			data: {

				temp_url:tempurl, offset:of, my_Country:country, artist_cat:artistcat

			},

			cache: false,

			success: function ( data, status ) {

				data = $.trim( data );

				$('.loader').hide();

				$( '#artist' ).append( data );





				if ( data === 'Login' ) {} else {}

			}



		} );









	}

</script>

<script type="text/javascript">
    
   


$( document ).ready(function() {
    $('.loader').hide();
});


</script>



<?php

