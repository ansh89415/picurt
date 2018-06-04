<?php



require( '../../../wp-load.php' );



require_once( ABSPATH . WPINC . '/registration.php');

 
   if(isset($_POST['user_login']) && wp_verify_nonce($_POST['pic_login_nonce'], 'pic-login-nonce')) {

 
pic_signin_member();

      

   

   

}



   if (isset( $_POST["user_login"] ) && wp_verify_nonce($_POST['pic_register_nonce'], 'pic-register-nonce')) {

   

pic_add_new_member();

   

}



   if (isset( $_POST["old_pass"] ) && wp_verify_nonce($_POST['user_pass_nonce'], 'user-pass-nonce')) {

   

pic_reset_member();

   

}


   if(wp_verify_nonce($_POST['user_delete_nonce'], 'delete-account')) {

 
if ( is_user_logged_in() ) {
   
   

   require_once(ABSPATH.'wp-admin/includes/user.php' );
   $current_user = wp_get_current_user();
   //wp_delete_user( $current_user->ID );

   

 }

echo "Delete";




    

}


if ($_POST["nonce"]=='mail') {

 
   if ($_POST["name"]!='' && $_POST["email"]!='' && $_POST["phone"]!='') {

$from = "info@picurt.com";
$to = "himanshu89415raghav@gmail.com";

         $subject = "Picurt";

         

         $message = "Name:".$_POST['name']."\n Message:".$_POST["message"]."\n Phone:".$_POST["phone"];

         

         $header = "From:".$from."\r\n";

         $header .= "MIME-Version: 1.0\r\n";

         $header .= "Content-type: text/html\r\n";

         

         $retval = mail ($to,$subject,$message,$header);

      }

         

         if( $retval == true ) {

            echo 1;

         }else {

            echo 0;

         }}