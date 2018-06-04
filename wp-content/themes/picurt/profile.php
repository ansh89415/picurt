<?php

/*



Template Name: Profile



*/







if(!isset($_SERVER['HTTP_REFERER'])){

// redirect them to your desired location

header('location:../index.php');

exit;

}


 

get_header();





require_once ABSPATH . '/wp-admin/includes/post.php';



$log_name = $current_user->user_login;



if(isset($_GET['connect'])){

  

  $log_email= $_GET['log_email'];

  

  $log_name = $wpdb->get_var( "SELECT user_login FROM wp_users WHERE user_email = '$log_email'" );



  

  

}



$user_id = $wpdb->get_var( "SELECT ID FROM wp_users WHERE user_login = '$log_name'" );

$log_email = $wpdb->get_var( "SELECT user_email FROM wp_users WHERE ID = '$user_id'" );

    







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













$author_query = array( 'posts_per_page' => '-1', 'post_type' => 'portfolio', 'author' => $user_id, 'order' => 'ASC' );

$author_posts = new WP_Query( $author_query );



$art_title = array();

$art_des = array();

$art_width = array();

$art_height = array();

$art_price = array();

$art_link = array();



while ( $author_posts->have_posts() ): $author_posts->the_post();



      $art_title[] = get_the_title();

$art_des[] = get_the_content();

$featured_img_url[] = get_the_post_thumbnail_url( get_the_ID(), 'full' );

$art_link[]= get_the_permalink(get_the_ID());

  $art_width[] = get_post_meta(get_the_ID(), 'width', true );

$art_height[] = get_post_meta(get_the_ID(), 'height', true );

$art_price[] = get_post_meta(get_the_ID(), 'price', true );



endwhile;







resetpass();

?>



<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCYH563qA5qS3LvBXhlpR2V0bkwkXErq2Q"></script>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/css/profile_dropdown_style.css" />

<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/confrm_popup_style.css">












<!-- Page Container -->

<div id="profile_page" class="w3-content w3-margin-top" style="max-width:1400px;">



  <!-- The Grid -->

  <div class="w3-row-padding">

  

    <!-- Left Column -->

    <div class="w3-third">

    

      <div class="w3-white w3-text-grey w3-card-4">

        <div class="w3-display-container">

          <img src="<?php if($log_profile==""){ bloginfo('template_url'); ?>/img/dummy.png <?php }else { echo $log_profile; } ?>" style="width: 150px;

    height: 150px;

    border-radius: 50%;

    margin: 30px 0 60px 0;" alt="Avatar">

          <div class="w3-display-bottomleft w3-container w3-text-black">

            <h2><?php echo $log_name; ?></h2>

          </div>

        </div>

        <div style="padding-bottom: 0.6rem" class="w3-container">

          <!-- <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Designer</p> -->

          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $log_city; ?></p>

<?php if ( $user_id==get_current_user_id() ) {  ?>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $log_email; ?></p>
<?php } ?>
          <hr>



          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>



             <?php

          $categories = get_categories( array( 'taxonomy' => 'portfolio-category', 'hide_empty'  => 0 ) );

          

          $id=1;



                foreach( $categories as $category ) { ?>

                

            <?php if (in_array("$category->term_id", $log_artcat)){ ?>

            <p style="display: inline; margin: 0 5px;">#<?php echo $category->cat_name; ?>

            </p>

            <?php } } ?>







        

        

        

        <?php if ( $user_id==get_current_user_id() ) {  ?>

          <div id="settings" style="width: 100%;" class="dropdown">



  <section class="main">
        <div class="wrapper-demo">
          <div id="dd" class="wrapper-dropdown-3" tabindex="1">
            <i style="padding: 0 10px;" class="fas fa-cogs"></i><span>Settings</span>
            <ul class="dropdown">
              <li><a id="edit_profile" href="<?php echo site_url(); ?>/editprofile" ><i class="fas fa-user-edit"></i>Edit Profile</a></li>
              <li><a id="edit_profile" href="<?php echo site_url(); ?>/add-artwork" ><i class="fas fa-images"></i>Add Artwork</a></li>
              <li><a id="reset_pass" href="#"><i class="fas fa-key"></i>Change Password</a></li>
              <li><a id="sign_out" href="<?php echo wp_logout_url( home_url() ); ?>"><i class="fas fa-power-off"></i>Sign Out</a>
</li>
              <li><a href="#0" class="cd-popup-trigger"><i class="fas fa-trash-alt"></i>



  Delete Account</a>





              </li>
            </ul>
          </div>
        ​</div>
      </section>



<div class="cd-popup" role="alert">
  <div class="cd-popup-container">
    <p>Are you sure you want to delete this element?</p>
    <ul class="cd-buttons">
      <li ><a id="cnfrm_del_yes" href="#0">Yes</a></li>
      <input type="hidden" id="user_del_nonce" name="delete_account" value="<?php echo wp_create_nonce('delete-account'); ?>"/>
      <li><a href="#0">No</a></li>
    </ul>
    <a href="#0" class="cd-popup-close img-replace">Close</a>
  </div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->


          






   



    

   

      </div>

       <?php }else{ ?><div style="width: 40%; margin: 40px auto; " class="dropdown"><button style="border-radius:15px; padding: 10px 40px; border-color:#000; outline: none;  background-color: #000; "  type="button" data-toggle="dropdown">Connect</button></div> <?php } ?>



        



     

         

        </div>

      </div>



    <!-- End Left Column -->

    </div>



    <!-- Right Column -->

    <div class="w3-twothird">

    

      <div id="pro_abt" style="padding-top: 1rem" class="w3-container w3-card w3-white w3-margin-bottom">

       <!-- <h2 class="w3-text-grey w3-padding-16"><i class="fas fa-users fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Profile</h2> -->

        <div  class="w3-container">

          <h5 class="w3-opacity"><b>About me</b></h5>

          <p>"<?php echo $log_about; ?>"</p>

          <hr>

        </div>

        <div class="w3-container">

          <h5 class="w3-opacity"><b>What drives you to art?</b></h5>

          <p>"<?php echo $log_drive; ?>"</p>

          <hr>

        </div>

        <div class="w3-container">

          <h5 class="w3-opacity"><b>What’s your philosophy for life?</b></h5>

          <p>"<?php echo $log_life; ?>"</p><br>

        </div>

      </div>



      <div  class="w3-container w3-card w3-white">

<!--        <h2 class="w3-text-grey w3-padding-16"><i class="fas fa-images fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Artwork</h2>

-->       

       <div style="padding: 0;" class="col-sm-12 ">





<div class="col-sm-4 pro_art">

<a target="_blank" href="<?php echo $art_link[0];?>"><img class="pro_imgn" src="<?php echo $featured_img_url[0]; ?>"></a></div>

     <div class="col-sm-4 pro_art"><a target="_blank" href="<?php echo $art_link[1];?>"> <img class="pro_imgn" src="<?php echo $featured_img_url[1]; ?>"></a></div>

<div class="col-sm-4 pro_art"><a target="_blank" href="<?php echo $art_link[2];?>"><img class="pro_imgn" src="<?php echo $featured_img_url[2]; ?>"></a></div>



    

    </div>

       

       

       

       

      </div>



    <!-- End Right Column -->

    </div>

    

  <!-- End Grid -->

  </div>

  

  <!-- End Page Container -->

</div>



<script src="<?php echo bloginfo('template_url'); ?>/js/confirm_popup_main.js"></script>


<script type="text/javascript">
      
     

      $("#dd").click(function() {

 
           // all dropdowns
          $('.wrapper-dropdown-3').toggleClass('active');
 
      });


     $("#reset_pass").click(function() {

 
           // all dropdowns
          $('#r_p').show();
 
      });



    </script>

