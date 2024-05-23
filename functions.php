<?php
/*
        _               _                  _____        _     _ _     _   _   _                         
       (_)             | |                | ____|      | |   (_) |   | | | | | |                        
  _ __  _  ___ ___  ___| |_ _ __ __ _ _ __| |__     ___| |__  _| | __| | | |_| |__   ___ _ __ ___   ___ 
 | '_ \| |/ __/ _ \/ __| __| '__/ _` | '_ \___ \   / __| '_ \| | |/ _` | | __| '_ \ / _ \ '_ ` _ \ / _ \
 | |_) | | (_| (_) \__ \ |_| | | (_| | |_) |__) | | (__| | | | | | (_| | | |_| | | |  __/ | | | | |  __/
 | .__/|_|\___\___/|___/\__|_|  \__,_| .__/____/   \___|_| |_|_|_|\__,_|  \__|_| |_|\___|_| |_| |_|\___|
 | |                                 | |                                                                
 |_|                                 |_|                                                                

                                                       
*************************************** WELCOME TO PICOSTRAP ***************************************

********************* THE BEST WAY TO EXPERIENCE SASS, BOOTSTRAP AND WORDPRESS *********************

    PLEASE WATCH THE VIDEOS FOR BEST RESULTS:
    https://www.youtube.com/playlist?list=PLtyHhWhkgYU8i11wu-5KJDBfA9C-D4Bfl

*/
// CHECK PARENT THEME VERSION, so picostrap5 v3 is required
add_action( 'admin_notices', function  () {
    if( (pico_get_parent_theme_version())>=3) return;
	$class = 'notice notice-error';
	$message = __( 'This Child Theme recommends at least Picostrap Version 3 to work properly. Please update the parent theme.', 'picostrap' );
	printf( '<div class="%1$s"><h1>%2$s</h1></div>', esc_attr( $class ), esc_html( $message ) );
} );

// FOR SECURITY: DISABLE APPLICATION PASSWORDS. Remove if needed (unlikely!)
add_filter( 'wp_is_application_passwords_available', '__return_false' );


//MAIN CSS IS IMPORTED BY SASS FOLDER...

//ADD MDB CSS EXTRA STUFF FOR JS & FONTS LOADING IN THE FOOTER
//REMOVE IF YOU DONT WANT TO USE THE ROBOTO FONT,
//OR IF YOU DON'T WAANT FONTAWESOME 6

add_action("wp_head",function(){
    ?>
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
 
    <?php
});

// DE-ENQUEUE PARENT THEME BOOTSTRAP JS BUNDLE
add_action( 'wp_print_scripts', function(){
    wp_dequeue_script( 'bootstrap5' );
}, 100 );

///ADD MDB JS FILES
//enqueue js in footer, async
add_action( 'wp_enqueue_scripts', function() {

    //MAIN MDB JS 
    wp_enqueue_script( 'mdb', get_stylesheet_directory_uri() . "/js/mdb.umd.min.js", array(), null, array('strategy' => 'defer', 'in_footer' => true) );
 
} ,100);


// OPTIONAL: ENQUEUE YOUR CUSTOM JS FILES, IF NEEDED 
/*
add_action( 'wp_enqueue_scripts', function() {	   
    //load the js file only on one page
    if (is_page('mypageslug')) {
        wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array(), null, true); 
    }  
});
*/

// OPTIONAL: ADD MORE NAV MENUS
//register_nav_menus( array( 'third' => __( 'Third Menu', 'picostrap' ), 'fourth' => __( 'Fourth Menu', 'picostrap' ), 'fifth' => __( 'Fifth Menu', 'picostrap' ), ) );
// THEN USE SHORTCODE:  [lc_nav_menu theme_location="third" container_class="" container_id="" menu_class="navbar-nav"]