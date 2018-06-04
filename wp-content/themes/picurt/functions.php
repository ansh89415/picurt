<?php



/**



 * picurt functions and definitions



 *



 * @link https://developer.wordpress.org/themes/basics/theme-functions/



 *



 * @package picurt



 */















show_admin_bar( false );











function add_login_logout_register_menu( $items, $args ) {



	



	



	



 if ( $args->theme_location != 'menu-1' ) {



 return $items;



 }







 if ( is_user_logged_in() ) {











	  $items .= ' <li id="menu-item-647"><a href="' . site_url() . '/profile">' . __( 'Profile' ) . '</a></li>';











 } else {



 $items .= '<li id="menu-item-104" class="signform"><a href="#">' . __( 'Sign In/ Sign Up' ) . '</a></li>';



 }



	 







	







 return $items;



}







add_filter( 'wp_nav_menu_items', 'add_login_logout_register_menu', 199, 2 );































add_action( 'init', 'pic_signin_member');















// logs a member in after submitting a form







function pic_signin_member() {







 





	if(isset($_POST['user_login']) && wp_verify_nonce($_POST['pic_login_nonce'], 'pic-login-nonce')) {







		// this returns the user ID and other info from the user name



		$user = get_userdatabylogin($_POST['user_login']);







		if(!$user) {



			// if the user name doesn't exist



			pic_errors()->add('empty_username', __('Invalid username'));



		}







		if(!isset($_POST['user_pass']) || $_POST['user_pass'] == '') {



			// if no password was entered



			pic_errors()->add('empty_password', __('Please enter a password'));



		}







		// check the user's login with their password



		if(!wp_check_password($_POST['user_pass'], $user->user_pass, $user->ID)) {



			// if the password is incorrect for the specified user



			pic_errors()->add('empty_password', __('Incorrect password'));



		}







		// retrieve all error messages



		$errors = pic_errors()->get_error_messages();







		// only log the user in if there are no errors



		if(empty($errors)) {







			 $login_data = array();



    $login_data['user_login'] = $_POST['user_login'];



    $login_data['user_password'] = $_POST['user_pass'];







    $user_verify = wp_signon( $login_data, false );







    if ( is_wp_error($user_verify) )



    {



        echo "<script>alert('Invalid login details')</script>";



     } else



    {







$log_status = get_user_meta( $user->ID, 'log_status', true );



if ($log_status==1) {



	# code...



	echo('profile');



} else {



	# code...



	echo('Login');



}







 



       exit();



     }







			do_action('wp_login', $_POST['user_login']);



















		}



	}



}















function pic_reset_member() {



	







  	if (isset( $_POST["old_pass"] ) && wp_verify_nonce($_POST['user_pass_nonce'], 'user-pass-nonce')) {



		$old_pass		= $_POST["old_pass"];



		$new_pass		= $_POST["new_pass"];



		$new_pass_confirm 	= $_POST["new_pass_confirm"];







      $user = wp_get_current_user();







		// this is required for username checks



		require_once(ABSPATH . WPINC . '/registration.php');







		if($old_pass == '' || $new_pass == '' || $new_pass_confirm == '' ) {



			// passwords do not match



			pic_errors()->add('password_empty', __('Please enter a password'));



		}







if(!wp_check_password($_POST['old_pass'], $user->user_pass, $user->ID)) {



			// if the password is incorrect for the specified user



			pic_errors()->add('empty_password', __('Incorrect password'));



		}















		if($new_pass != $new_pass_confirm) {



			// passwords do not match



			pic_errors()->add('password_mismatch', __('Passwords do not match'));



		}







		$errors = pic_errors()->get_error_messages();







		// only create the user in if there are no errors



		if(empty($errors)) {











			wp_set_password( $new_pass, $user->ID );







			







        echo ('Reset');







			







		}else{



			



pic_show_error_messages();		



		}











	}



}











































if ( ! function_exists( 'picurt_setup' ) ) :



	/**



	 * Sets up theme defaults and registers support for various WordPress features.



	 *



	 * Note that this function is hooked into the after_setup_theme hook, which



	 * runs before the init hook. The init hook is too late for some features, such



	 * as indicating support for post thumbnails.



	 */



	function picurt_setup() {



		/*



		 * Make theme available for translation.



		 * Translations can be filed in the /languages/ directory.



		 * If you're building a theme based on picurt, use a find and replace



		 * to change 'picurt' to the name of your theme in all the template files.



		 */



		load_theme_textdomain( 'picurt', get_template_directory() . '/languages' );







		// Add default posts and comments RSS feed links to head.



		add_theme_support( 'automatic-feed-links' );







		/*



		 * Let WordPress manage the document title.



		 * By adding theme support, we declare that this theme does not use a



		 * hard-coded <title> tag in the document head, and expect WordPress to



		 * provide it for us.



		 */



		add_theme_support( 'title-tag' );







		/*



		 * Enable support for Post Thumbnails on posts and pages.



		 *



		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/



		 */



		add_theme_support( 'post-thumbnails' );







		// This theme uses wp_nav_menu() in one location.



		register_nav_menus( array(



			'menu-1' => esc_html__( 'Primary', 'picurt' ),



		) );







		/*



		 * Switch default core markup for search form, comment form, and comments



		 * to output valid HTML5.



		 */



		add_theme_support( 'html5', array(



			'search-form',



			'comment-form',



			'comment-list',



			'gallery',



			'caption',



		) );







		// Set up the WordPress core custom background feature.



		add_theme_support( 'custom-background', apply_filters( 'picurt_custom_background_args', array(



			'default-color' => 'ffffff',



			'default-image' => '',



		) ) );







		// Add theme support for selective refresh for widgets.



		add_theme_support( 'customize-selective-refresh-widgets' );







		/**



		 * Add support for core custom logo.



		 *



		 * @link https://codex.wordpress.org/Theme_Logo



		 */



		add_theme_support( 'custom-logo', array(



			'height'      => 250,



			'width'       => 250,



			'flex-width'  => true,



			'flex-height' => true,



		) );



	}



endif;



add_action( 'after_setup_theme', 'picurt_setup' );







/**



 * Set the content width in pixels, based on the theme's design and stylesheet.



 *



 * Priority 0 to make it available to lower priority callbacks.



 *



 * @global int $content_width



 */



function picurt_content_width() {



	$GLOBALS['content_width'] = apply_filters( 'picurt_content_width', 640 );



}



add_action( 'after_setup_theme', 'picurt_content_width', 0 );







/**



 * Register widget area.



 *



 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar



 */



function picurt_widgets_init() {



	register_sidebar( array(



		'name'          => esc_html__( 'Sidebar', 'picurt' ),



		'id'            => 'sidebar-1',



		'description'   => esc_html__( 'Add widgets here.', 'picurt' ),



		'before_widget' => '<section id="%1$s" class="widget %2$s">',



		'after_widget'  => '</section>',



		'before_title'  => '<h2 class="widget-title">',



		'after_title'   => '</h2>',



	) );



}



add_action( 'widgets_init', 'picurt_widgets_init' );







/**



 * Enqueue scripts and styles.



 */



function picurt_scripts() {



	wp_enqueue_style( 'picurt-style', get_stylesheet_uri() );







	wp_enqueue_script( 'picurt-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );







	wp_enqueue_script( 'picurt-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );







	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {



		wp_enqueue_script( 'comment-reply' );



	}



}



add_action( 'wp_enqueue_scripts', 'picurt_scripts' );















function picurt_myscripts() {



	wp_enqueue_style( 'picurt-bootstrapmin-css', get_template_directory_uri() .       '/css/bootstrap.min.css');



wp_enqueue_style( 'picurt-bootstrap-css', get_template_directory_uri() .       '/css/bootstrap.css');



wp_enqueue_style( 'picurt-picurt-font-css', get_template_directory_uri() .       '/css/picurt_font.css');















	wp_enqueue_script( 'picurt-form-index-js', get_template_directory_uri() . '/js/form_index.js', array(), '20151215', true );







	wp_enqueue_script( 'picurt-profile-index-js', get_template_directory_uri() . '/js/profile_index.js', array(), '20151215', false );







wp_enqueue_script( 'picurt-picurt-js', get_template_directory_uri() . '/js/picurt.js', array(), '20151215', false );







//wp_enqueue_script( 'picurt-reg-form-js', get_template_directory_uri() . '/js/reg_form_index.js', array(), '20151215', true );







wp_enqueue_script( 'picurt-imageload-js', get_template_directory_uri() . '/js/imagesloaded.js', array(), '20151215', true );











	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {



		wp_enqueue_script( 'comment-reply' );



	}



}



add_action( 'wp_enqueue_scripts', 'picurt_myscripts' );







/**



 * Implement the Custom Header feature.



 */



require get_template_directory() . '/inc/custom-header.php';







/**



 * Custom template tags for this theme.



 */



require get_template_directory() . '/inc/template-tags.php';







/**



 * Functions which enhance the theme by hooking into WordPress.



 */



require get_template_directory() . '/inc/template-functions.php';







/**



 * Customizer additions.



 */



require get_template_directory() . '/inc/customizer.php';







/**



 * Load Jetpack compatibility file.



 */



if ( defined( 'JETPACK__VERSION' ) ) {



	require get_template_directory() . '/inc/jetpack.php';



}







































/*  login and registration form     */











function form(){ ?>







	<div id="id01" class="modal" >







  <form class=" animate"  method="post" >











	 <div class="form-structor">



       	<div id="alert" style="position: absolute; top: 0; left: 0; z-index: 50; height: 125px; " class="alert alert-danger alert-dismissible  in">



	       <span onclick="document.getElementById('alert').style.display='none';  " class="close" title="Close Modal">&times;</span>



    <pre style="background-color: #f5f5f500; border: none;"></pre>



  </div>



	       <span onclick="document.getElementById('id01').style.display='none';  " class="close" title="Close Modal">&times;</span>







	<div class="signup">



		<h2 class="form-title" id="signup"><span>or</span>Sign up</h2>



		<div class="form-holder">



			<input name="user_login" id="user_sup_name" type="text" class="input" placeholder="Username" />



			<input name="user_email" id="user_sup_email" type="email" class="input" placeholder="Email" />



			<input name="user_pass" id="user_sup_pas" type="password" class="input" placeholder="Password" />



			<input name="user_pass_confirm" id="user_sup_cpas" type="password" class="input" placeholder="Confirm Password" />



			        <input type="hidden" id="user_sup_nonce" name="pic_register_nonce" value="<?php echo wp_create_nonce('pic-register-nonce'); ?>"/>











		</div>



		<button name="sign-up" id="signupBtn" class="submit-btn" type="button">Sign up</button>







	</div>







	<?php //pic_signin_member(); ?>



	<div class="login slide-up">



		<div class="center">



		    <p class="reg_suc"><?php echo "Sucessfully register, Now login"; ?></p>







			<h2 class="form-title" id="login"><span>or</span>Log in</h2>



			<div class="form-holder">



			<input name="user_login" id="user_sin_name" type="text" class="input" placeholder="Username" />



			<input name="user_pass" id="user_sin_pass" type="password" class="input" placeholder="Password" />



				<input type="hidden" id="user_sin_nonce" name="pic_login_nonce" value="<?php echo wp_create_nonce('pic-login-nonce'); ?>"/>







			</div>



			<button class="submit-btn" type="button" id="loginBtn" >Log in</button>



      <a href="<?php echo site_url(); ?>/reset-password" title="Lost Password">Forget Username</a></br>
      <a href="<?php echo site_url(); ?>/reset-password" title="Lost Password">Forget Password</a>







		</div>



	</div>







</div>



		</form>







</div>











<?php }























function resetpass(){ ?>







	<div id="r_p" class="modal" >







  <form class=" animate"  method="post" >











	 <div class="form-structor">



       	<div id="alert" style="position: absolute; top: 0; left: 0; z-index: 50; height: 125px; " class="alert alert-danger alert-dismissible  in">



	       <span onclick="document.getElementById('alert').style.display='none';  " class="close" title="Close Modal">&times;</span>



    <pre style="background-color: #f5f5f500; border: none;">sdcscsdsdc</pre>



  </div>



	       <span onclick="document.getElementById('r_p').style.display='none';  " class="close" title="Close Modal">&times;</span>







	<div class="signup">



		<h2 class="form-title" id="signup"><span>or</span>Reset Your Password</h2>



		<div class="form-holder">



			<input  id="old_sup_pass" type="password" class="input" placeholder="Old Password" />



			<input  id="new_sup_pas" type="password" class="input" placeholder="New Password" />



			<input  id="new_sup_cpas" type="password" class="input" placeholder="Confirm Password" />



			        <input type="hidden" id="user_pass_nonce"  value="<?php echo wp_create_nonce('user-pass-nonce'); ?>"/>











		</div>



		<button name="sign-up" id="resetBtn" class="submit-btn" type="button">Submit</button>







	</div>















</div>



		</form>







</div>











<?php }







// registration form fields











// register a new user







function pic_add_new_member() {



	







  	if (isset( $_POST["user_login"] ) && wp_verify_nonce($_POST['pic_register_nonce'], 'pic-register-nonce')) {



		$user_login		= $_POST["user_login"];



		$user_email		= $_POST["user_email"];



		$user_pass		= $_POST["user_pass"];



		$pass_confirm 	= $_POST["user_pass_confirm"];















		// this is required for username checks



		require_once(ABSPATH . WPINC . '/registration.php');







		if(username_exists($user_login)) {







			// Username already registered



			pic_errors()->add('username_unavailable', __('Username already taken'));



		}



		if(!validate_username($user_login)) {



			// invalid username



			pic_errors()->add('username_invalid', __('Invalid username'));



		}



		if($user_login == '') {



			// empty username



			pic_errors()->add('username_empty', __('Please enter a username'));



		}



		if(!is_email($user_email)) {



			//invalid email



			pic_errors()->add('email_invalid', __('Invalid email'));



		}



		if(email_exists($user_email)) {



			//Email address already registered



			pic_errors()->add('email_used', __('Email already registered'));



		}



		if($user_pass == '') {



			// passwords do not match



			pic_errors()->add('password_empty', __('Please enter a password'));



		}



		if($user_pass != $pass_confirm) {



			// passwords do not match



			pic_errors()->add('password_mismatch', __('Passwords do not match'));



		}







		$errors = pic_errors()->get_error_messages();







		// only create the user in if there are no errors



		if(empty($errors)) {











			$new_user_id = wp_insert_user(array(



				'user_login'		=> $user_login,



					'user_pass'	 		=> $user_pass,



					'user_email'		=> $user_email,



					'user_registered'	=> date('Y-m-d H:i:s'),



					'role'				=> 'subscriber'



				)



			);



			if($new_user_id) {







				// send an email to the admin alerting them of the registration



				wp_new_user_notification($new_user_id);







				// log the new user in



				 wp_set_auth_cookie($user_login, $user_pass, true);



				wp_set_current_user($new_user_id, $user_login);



				do_action('wp_login', $user_login);







				// send the newly created user to the home page after logging them in



				//wp_redirect('http://localhost/picurt/');







        echo ('Signup');







			}







		}else{



			



pic_show_error_messages();		



		}











	}



}







































 // used for tracking error messages



function pic_errors(){



    static $wp_error; // Will hold global variable safely



    return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));



}







function pic_show_error_messages() {



	if($codes = pic_errors()->get_error_codes()) {







		    // Loop error codes and display errors



		   foreach($codes as $code){



		        $message = pic_errors()->get_error_message($code);



		        echo    $message."\n"  ;







		    }



		;



	}



}



















function insert_attachment( $file_handler, $post_id, $setthumb = 'true' ) {



	// check to make sure its a successful upload



	if ( $_FILES[ $file_handler ][ 'error' ] !== UPLOAD_ERR_OK )__return_false();







	require_once( ABSPATH . "wp-admin" . '/includes/image.php' );



	require_once( ABSPATH . "wp-admin" . '/includes/file.php' );



	require_once( ABSPATH . "wp-admin" . '/includes/media.php' );







	$attach_id = media_handle_upload( $file_handler, $post_id );







	if ( $setthumb )update_post_meta( $post_id, '_thumbnail_id', $attach_id );



	return $attach_id;



}















function theme_prefix_setup() {



	



	add_theme_support( 'custom-logo', array(



		'height'      => 100,



		'width'       => 400,



		'flex-width' => true,



	) );







}



add_action( 'after_setup_theme', 'theme_prefix_setup' );






add_filter( 'wp_mail_from', 'wpse_new_mail_from' );     
function wpse_new_mail_from( $old ) {
    return 'info@picurt.com'; // Edit it with your email address
}

add_filter('wp_mail_from_name', 'wpse_new_mail_from_name');
function wpse_new_mail_from_name( $old ) {
    return 'Picurt'; // Edit it with your/company name
}





add_filter("retrieve_password_message", "mapp_custom_password_reset", 99, 4);

function mapp_custom_password_reset($message, $key, $user_login, $user_data )    {

  $message .= '<h3>Your User Name: <span style="color:#f50e30">'.$user_login.'</span></h3><br>



If you have any further issues, please email us to info@picurt.com

PICURT';


  return $message;

}






















