<?php
/**
 * Make Function Pluggable
 *
 * Child Theme can have a function with the same name
 * That function can override this function
 * If the function does not exist use this function
 * Otherwise do nothing the function already exists
 */
if ( ! function_exists( 'nb_after_setup_theme' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function nb_after_setup_theme() {

          // Let WordPress manage the document title.
          add_theme_support( 'title-tag' );

          // Allow admin users add Featured Images
          add_theme_support( 'post-thumbnails' );

          // Define sizes for Featured Images
          add_image_size( 'card-small', 480, 270, true );
          add_image_size( 'card-medium', 600, 400, true );
          add_image_size( 'card-large', 1200, 800, true );

          // Output HTML5 style HTML
          add_theme_support( 'html5', array(
               'caption',
               'comment-form',
               'comment-list',
               'gallery',
               'search-form',)
          );


          // Register Navigation Menus.
          register_nav_menus(
               array(
                'nav-main-header-top' => 'Main Nav, Top of Header',
                'nav-footer' => 'Footer Nav, Lower Footer'
               )
          );

          // Register and Enqueue JavaScript Files
          function nb_enqueue_scripts() {
            wp_enqueue_script( 'nb-script', get_template_directory_uri() . '/js/main.js', [], wp_get_theme()->get('Version'), true );
        }
        add_action( 'wp_enqueue_scripts', 'nb_enqueue_scripts' );

          // Register Enqueue CSS Files
          function nb_enqueue_styles() {

            // wp_enqueue_style( Handle     , Path to File                           , Dependencies ['handle'] , Version Number                , CSS Media Type )
              wp_enqueue_style('nb-style', get_template_directory_uri() . '/style.css', [] , wp_get_theme()->get('Version'), 'all');

          }
          add_action('wp_enqueue_scripts', 'nb_enqueue_styles');


          // Pagination function.
          function nb_paginate() {
             global $paged, $wp_query;
             $abignum = 999999999; //we need an unlikely integer
             $args = array(
                  'base' => str_replace( $abignum, '%#%', esc_url( get_pagenum_link( $abignum ) ) ),
                  'format' => '?paged=%#%',
                  'current' => max( 1, get_query_var( 'paged' ) ),
                  'total' => $wp_query->max_num_pages,
                  'show_all' => False,
                  'end_size' => 2,
                  'mid_size' => 2,
                  'prev_next' => True,
                  'prev_text' => __( '&lt;' ),
                  'next_text' => __( '&gt;' ),
                  'type' => 'list'
             );
             echo paginate_links( $args );
          }


          // Define sizes for Custom Header Image
          // Allow Admin users to set Custom Header Image.
          $custom_header_args = array(
              'width'         => 100,
              'height'        => 40,
              'default-image' => get_template_directory_uri() . '/images/logo.svg',
              'uploads'       => true,
          );
          add_theme_support( 'custom-header', $custom_header_args );

          // Allow Admin users to set Custom Background Color/Image.
          add_theme_support( 'custom-background' );
    }
endif;
add_action( 'after_setup_theme', 'nb_after_setup_theme' );

/**
 * Register widget areas and custom widgets.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function nb_widgets_init() {

    /**
    * Registering "sidebars"
    */

    $nb_404_sidebar = array(
         'name' => 'Error',
         'id' => 'error',
         'description' => 'Widgets placed here will go on the 404 error page ',
         'before_widget' => '<div class="widget">',
         'after_widget' => '</div>',
         'before_title' => '<h3>',
         'after_title' => '</h3>',
    );
    register_sidebar( $nb_404_sidebar );
}
add_action( 'widgets_init', 'nb_widgets_init' );
add_post_type_support( 'page', 'excerpt' );


/* Set up color palette in editor */
function nb_setup_theme_supported_features() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => esc_attr__( 'teal', 'themeLangDomain' ),
            'slug'  => 'teal',
            'color' => '#a6ffee',
        ),
        array(
            'name'  => esc_attr__( 'dark gray', 'themeLangDomain' ),
            'slug'  => 'dark-gray',
            'color' => '#121212',
        ),
        array(
            'name'  => esc_attr__( 'black', 'themeLangDomain' ),
            'slug'  => 'black',
            'color' => '#000',
        ),
        array(
            'name'  => esc_attr__( 'white', 'themeLangDomain' ),
            'slug'  => 'white',
            'color' => '#fff',
        ),
    ) );
}

add_action( 'after_setup_theme', 'nb_setup_theme_supported_features' );

/* Allow SVG */
function nb_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'nb_mime_types');

/**
* Registers an editor stylesheet for the theme.
*/
add_theme_support('editor-styles');



/* Customize Emails */
add_filter('wp_new_user_notification_email', 'nb_welcome_email', 10, 3);

function nb_welcome_email($wp_new_user_notification_email, $user, $blogname)
{
    # change the default email
    $old_message = $wp_new_user_notification_email['message'];
    $wp_new_user_notification_email['message'] = sprintf("Hello!\r\n\r\nI created an account so you can access your invoices and pay for services. Please change your password using the longer of the two links. The shorter link is the login page for my website.\r\n\r\n");
    $wp_new_user_notification_email['message'] .= $old_message;
    $wp_new_user_notification_email['subject'] = sprintf("Website Account Details");
    $wp_new_user_notification_email['headers'] = ["From: Nate Barlow<nbarlow66@gmail.com>", "Reply-To: nbarlow66@gmail.com"];
    return $wp_new_user_notification_email;
}
?>