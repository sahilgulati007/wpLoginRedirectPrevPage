// redirect after login
function sg_register_redirect( $redirect, $user ) {
    //return wc_get_page_permalink( 'shop' );
     //$location = $_SERVER['HTTP_REFERER'];
	//global $session;
	$location=$_SESSION['actualLink'];
        wp_safe_redirect($location);
        exit();
}
 
add_filter( 'woocommerce_login_redirect', 'sg_register_redirect',5, 2 );

// store the last page url in session
function the_dramatist_fire_on_wp_initialization() {
    // Do stuff. Say we will echo "Fired on the WordPress initialization".
    //global $wp;
    //echo 'Fired on the WordPress initialization';
    //global $session;
    //
    if(is_page(210)){
    	//echo 'in';
    	$location = $_SERVER['HTTP_REFERER'];
    	//echo $location;
    	$_SESSION['actualLink'] =$location;
    	
    	//$session->set_userdata( 'loginredirecturl', $location );
    }
}
add_action( 'wp', 'the_dramatist_fire_on_wp_initialization' );
