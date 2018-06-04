<?php



/*







Template Name: Edit profile







*/







if(!isset($_SERVER['HTTP_REFERER'])){



// redirect them to your desired location



header('location:../index.php');



exit;



}

$ref = site_url()."/profile/";








get_header();







require_once ABSPATH . '/wp-admin/includes/post.php';







$log_name = $current_user->user_login;







$user_id = $wpdb->get_var( "SELECT ID FROM wp_users WHERE user_login = '$log_name'" );



$user_email = $wpdb->get_var( "SELECT user_email FROM wp_users WHERE ID = '$user_id'" );











//echo $user_id;







$featured_img_url = array();











































/* my code */











if ( isset( $_POST[ "submit" ] ) && $_POST[ "log_name" ] != "" ) {















	$user_name = $_POST[ "log_name" ];



	$user_email = $_POST[ "log_email" ];



	$user_city = $_POST[ "log_city" ];



	$user_socialtype = $_POST[ 'log_socialtype' ];



	$user_sociallink = $_POST[ 'log_sociallink' ];



	$user_about = $_POST[ "log_about" ];



	$user_drive = $_POST[ "log_drive" ];



	$user_life = $_POST[ "log_life" ];



	if(isset($_POST[ 'log_artcat' ])){ 



	$user_artcat = implode( ' ', $_POST[ 'log_artcat' ] ); };















	if ( isset( $_FILES[ 'profile' ] ) ) {











		$errors = array();



		$file_name = $_FILES[ 'profile' ][ 'name' ];



		$file_size = $_FILES[ 'profile' ][ 'size' ];



		$file_tmp = $_FILES[ 'profile' ][ 'tmp_name' ];



		$file_type = $_FILES[ 'profile' ][ 'type' ];



		$file_ext = strtolower( end( explode( '.', $_FILES[ 'profile' ][ 'name' ] ) ) );







		$expensions = array( "jpeg", "jpg", "png" );











		if ( in_array( $file_ext, $expensions ) === false ) {



			//$errors[]="extension not allowed, please choose a JPEG or PNG file.";



		}







		if ( $file_size > 10097152 ) {



			$errors[] = 'File size must be excately 10 MB';



		}







		if ( empty( $errors ) == true ) {











			if ( !function_exists( 'wp_handle_upload' ) ) {



				require_once( ABSPATH . 'wp-admin/includes/file.php' );



			}







			$uploadedfile = $_FILES[ 'profile' ];







			$upload_overrides = array( 'test_form' => false );







			$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );







			if ( $file_name != "" ) {







				$user_profile = $movefile[ 'url' ];



			} else {







				$user_profile = get_user_meta( $user_id, 'log_profile', true );







			}











		} else {



			print_r( $errors );



		}



	}



























	$wpdb->update( 'wp_users', array( 'user_email' => $user_email ), array( 'ID' => $user_id ) );



	$user_email = $wpdb->get_var( "SELECT user_email FROM wp_users WHERE ID = '$user_id'" );











	update_usermeta( $user_id, 'log_profile', $user_profile );



	update_usermeta( $user_id, 'log_name', $user_name );



	update_usermeta( $user_id, 'log_email', $user_email );



	update_usermeta( $user_id, 'log_city', $user_city );



	update_usermeta( $user_id, 'log_socialtype', $user_socialtype );



	update_usermeta( $user_id, 'log_sociallink', $user_sociallink );



	update_usermeta( $user_id, 'log_about', $user_about );



	update_usermeta( $user_id, 'log_drive', $user_drive );



	update_usermeta( $user_id, 'log_life', $user_life );



	update_usermeta( $user_id, 'log_artcat', $user_artcat );



	update_usermeta( $user_id, 'log_status', 1 );



























?><script>window.location.assign('<?php echo $_POST['ref']; ?>');</script><?php























}



















// if the form is submitted but the name is empty



if ( isset( $_POST[ "submit" ] ) && $_POST[ "log_name" ] == "" ) {



	echo "<p>You need to fill the required fields.</p>";







}











/* old user details */











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







		<form method="post" action="" enctype="multipart/form-data">

<?php if($_SERVER['HTTP_REFERER']== $ref){ ?> <input type="hidden" name="ref" value="<?php echo $ref; ?>"> <?php } else{ ?> <input type="hidden" name="ref" value="<?php echo get_site_url(); ?>/add-artwork"> <?php } ?>

			<div class="a">



				<div class="headline">



					<h2 class="text-headline">Paint, Share &amp; Meet</h2>



					<h3 class="text-subheadline">Spread you art with Online Art Gallery</h3>



					<div id="profile_img_jq" class="row">



						<div class="small-12 medium-2 large-2 columns">



							<div class="circle">



								<!-- User Profile Image -->



								<img id="pimg" class="profile-pic" src="<?php if($log_profile==""){ bloginfo('template_url'); ?>/img/dummy.png <?php }else { echo $log_profile; } ?>">







								<!-- Default Image -->



								<!-- <i class="fa fa-user fa-5x"></i> -->



							</div>



							<div class="p-image p-image-pos circle-p-image">



								<i id="picn" class="fa fa-camera upload-button"></i>



								<input id="pinp" class="file-upload" type="file" name="profile" accept="image/*" />



							</div>



						</div>



					</div>



				</div>







				<span>



      <input style="margin-top:45px !important;" class="text-body" id="log_name" name="log_name" value="<?php echo $log_name; ?>" type="text" placeholder="Full Name" required>



    </span>



			



				<span>



      <input class="text-body" id="log_email" name="log_email" value="<?php if($log_email==" "){ echo $log_email; }else{ echo $user_email; } ?>" type="email" placeholder="Email-id" >



    </span>



			



				<span>



      <input class="text-body" id="log_city" name="log_city" value="<?php echo $log_city; ?>" type="text" placeholder="Location (i.e city)" >



    </span>



			



				<span>



      <select id="socialtype" name="log_socialtype">



          <option value="" disabled <?php if ($log_socialtype == ""){ echo 'selected="selected"'; } ?> >Select social media type</option>



  <option value="log_fb" <?php if ($log_socialtype == "log_fb"){ echo 'selected="selected"'; } ?> >Facebook</option>



  <option value="log_insta" <?php if ($log_socialtype == "log_insta"){ echo 'selected="selected"'; } ?> >Instagram</option>



  <option value="log_pint" <?php if ($log_socialtype == "log_pint"){ echo 'selected="selected"'; } ?> >Pinterest</option>



  <option value="log_web" <?php if ($log_socialtype == "log_web"){ echo 'selected="selected"'; } ?> >Website</option>



  <option value="log_oth" <?php if ($log_socialtype == "log_oth"){ echo 'selected="selected"'; } ?> >Others</option>



</select>



      <input class="text-body" id="social" name="log_sociallink" type="text" placeholder="Paste social media profile link" value="<?php echo $log_sociallink; ?>" required>



    </span>



			











			</div>







			<div class="b" style="margin-top: -40px;">



				<div class="headline">



					<h2 class="text-headline">Paint, Share &amp; Meet</h2>



					<h3 class="text-subheadline">Spread you art with Online Art Gallery</h3>







				</div>







				<span>



     <textarea style="height: 55px;" class="text-body" id="log_about" name="log_about" type="text" placeholder="One line about you" maxlength="50" ><?php echo $log_about; ?></textarea>



    </span>



			



				<span>



      <textarea style="height: 109px;" class="text-body" id="log_drive" name="log_drive" type="text" placeholder="What drives you to art?" maxlength="300" ><?php echo $log_drive; ?></textarea>



    </span>



			



				<span>



      <textarea style="height: 109px;" class="text-body" id="log_life" name="log_life" type="text" placeholder="What's your philosophy for life?" maxlength="300" ><?php echo $log_life; ?></textarea>



    </span>



			



















			</div>







			<div class="c" style="margin-top: -40px;">



				<div class="headline">



					<h2 class="text-headline">Paint, Share &amp; Meet</h2>



					<h3 class="text-subheadline">Spread you art with Online Art Gallery</h3>







				</div>















				<span>



      <label for="username" class="text-subheadline">Art category you are good at</label>



      <?php



					$categories = get_categories( array( 'taxonomy' => 'portfolio-category', 'hide_empty'  => 0 ) );



					



					$id=1;







								foreach( $categories as $category ) { ?>



								



								



      <div class="squaredFour">



      <input type="checkbox" value="<?php echo $category->term_id; ?>" id="squaredFour<?php echo $id; ?>" name="log_artcat[]" <?php if (in_array("$category->term_id", $log_artcat)){ echo 'checked="checked"';} ?>  />



      <label for="squaredFour<?php echo $id; ?>"></label><p><?php echo $category->cat_name; ?></p>



    </div>



   <?php $id++; }?>



   </span>





<span>

	

 <div style="left: -40px;" class="squaredFour">



      <pre style="overflow: visible;"><input type="checkbox" id="squaredFour9" value="" name=""  /><label style="margin: 15px 10px 19px 0 !important;" for="squaredFour9"></label>I agree to <a target="_blank" style="text-decoration: none; font-size: 14px;" href="<?php echo site_url(); ?>/terms-conditions">Terms</a> and <a target="_blank" style="text-decoration: none; font-size: 14px;" href="<?php echo site_url(); ?>/privacy">Privacy Policies</a></pre>



    </div>



</span>

			











			</div>







			<div style="position: absolute; top: 0; left: 0;" class="alert alert-danger alert-dismissible fade in">



    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>



    <strong>Error!</strong> Please fill all details.



  </div>







			<div id="pic_button">



				<input class="text-small-uppercase" id="back" type="button" value="Back">



				<input class="text-small-uppercase" id="next" type="button" value="Next">



				<input class="text-small-uppercase" id="add" type="button" value="Add Art">



				<input class="text-small-uppercase" id="submit" type="submit" name="submit" value="submit" onClick="return chkform()">







			</div>



		</form>



	</main>











</div>







































<script>



	$( document ).ready( function () {







		var i = 0;



				$( "#add" ).css( "display", "none" );















		$( "#back" ).click( function () {



			i--;



			if ( i == 0 ) {







				$( ".a" ).css( "display", "block" );



				$( ".b, .c" ).css( "display", "none" );



				$( "#submit, #back, #add" ).css( "display", "none" );



				$( "#next" ).css( "display", "inline-block" );



				$( "#artform input[type=button], #artform input[type=submit]" ).css( "width", "100%" );



















			}



			if ( i == 1 ) {







				$( ".b" ).css( "display", "block" );



				$( "#submit, .a, .c" ).css( "display", "none" );



				$( "#back, #next" ).css( "display", "inline-block" );



				$( "#artform input[type=submit], #artform input[type=button]" ).css( "width", "49%" );















			}



			if ( i == 2 ) {



				



				$( ".c" ).css( "display", "block" );



				$( "#next, .a, .b" ).css( "display", "none" );



				$( "#back, #submit" ).css( "display", "inline-block" );



				$( "#artform input[type=submit], #artform input[type=button]" ).css( "width", "49%" );











			}



		



		} );







		$( "#next" ).click( function () {



			i++;



			if ( i == 0 ) {







				$( ".a" ).css( "display", "block" );



				$( ".b, .c" ).css( "display", "none" );



				$( "#submit, #back, #add" ).css( "display", "none" );



				$( "#next" ).css( "display", "inline-block" );



				$( "#artform input[type=button], #artform input[type=submit]" ).css( "width", "100%" );



















			}



			if ( i == 1 ) {







				$( ".b" ).css( "display", "block" );



				$( "#submit, .a, .c" ).css( "display", "none" );



				$( "#back, #next" ).css( "display", "inline-block" );



				$( "#artform input[type=submit], #artform input[type=button]" ).css( "width", "49%" );















			}



			if ( i == 2 ) {



				



				$( ".c" ).css( "display", "block" );



				$( "#next, .a, .b" ).css( "display", "none" );



				$( "#back, #submit" ).css( "display", "inline-block" );



				$( "#artform input[type=submit], #artform input[type=button]" ).css( "width", "49%" );











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







<script>   



           function chkform()



            {







              if ((document.getElementById("log_name").value === "" || document.getElementById("log_city").value === "" || document.getElementById("log_email").value === "" || document.getElementById("socialtype").value === "" || document.getElementById("social").value === "" || document.getElementById("log_about").value === "" || document.getElementById("log_drive").value === "" || document.getElementById("log_life").value === "") || ($('#squaredFour1').prop("checked") == false && $('#squaredFour2').prop("checked") == false && $('#squaredFour3').prop("checked") == false && $('#squaredFour4').prop("checked") == false)) 



              {







				$( ".alert" ).css( "display", "block" );



				  



				  return false;











              }else { return true; }



				



				  								  







        }



</script>







