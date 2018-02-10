<?php 
/**
 * The theme functions registers
 * @version 1.0
*/

if( ! function_exists( 'news_blog_setup' ) ){

    add_action( 'after_setup_theme', 'news_blog_setup' );
    function news_blog_setup() {

        /**
         * -> Add image Sizes
         * -> Add Register nav and menus
         * -> Custom excerpt length
         * -> Add Load de styles
         * -> Add Load de scripts
         * -> Add Widgets
        */
    
        /**
         * Add Supports
        */
        // -> Thumbnails
        add_theme_support( 'post-thumbnails' );
    
        // -> Posts Formats
        $postsFormat = array(
            'link',
            'video',
            'quote',
            'image',
            'gallery'
        );
        add_theme_support( 'post-formats', $postsFormat );
    
        // -> Custom Logo
        $customLogo = array(
            'flex-width'    => true,
            'flex-height'   => true
        );
        add_theme_support( 'custom-logo', $customLogo );
    
        // -> HTML5 Support
        $html5Support = array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        );
        add_theme_support( 'html5', $html5Support );
    
    
        /**
         * Add Image Sizes
         * PS: talvez os nomes devem ser repensados
        */
        add_image_size( 'post-thumb-big', 1000, 440, true );
        add_image_size( 'post-thumb-medium', 325, 200, true );
        add_image_size( 'post-thumb-medium-retangle', 325, 280, true );
        add_image_size( 'post-thumb-medium-tower', 220, 410, true );
        add_image_size( 'post-thumb-small', 290, 145, true );

        /**
         * Register Menus
        */
        $navMenus = array(
            'main-menu'     => __( 'Main menu', 'main-menu' ),
            'footer-menu'   => __( 'Footer menu', 'footer-menu' )
        );
        register_nav_menus( $navMenus );

        /**
         * custom excerpt
        */
        function custom_excerpt_length( $length ) {
            
            return 10;
        }
        add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

        /**
         * WP Enqueue stylesheets
        */
        add_action( 'wp_enqueue_scripts', 'news_blog_stylesheets' );
        function news_blog_stylesheets() {

            wp_enqueue_style( 'reset-css', get_template_directory_uri() . '/libs/css/reset.css', array(), 'all' );
            wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/libs/css/bootstrap/bootstrap.min.css', array(), '4.0.0', 'all' );
            wp_enqueue_style( 'bootstrap-grids', get_template_directory_uri() . '/libs/css/bootstrap/bootstrap-grid.min.css', array(), '4.0.0', 'all' );
            wp_enqueue_style( 'slick-slider', get_template_directory_uri() . '/libs/css/slick.css', array(), 'all' );
            wp_enqueue_style( 'main-style', get_template_directory_uri() . '/libs/css/main-style.css', array(), '1.0.0', 'all' );
        }


        /**
         * WP Enqueue scripts
        */
        add_action( 'wp_enqueue_scripts', 'news_blog_scripts' );
        function news_blog_scripts(){
            // jQuery
            wp_enqueue_script( 'jquery', get_template_directory_uri() . '/libs/js/jquery-3.1.0.min.js', array(), null, true );

            // jQuery UI
            wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/libs/js/jquery-ui.min.js', array(), null, true );

            // slick slider
            wp_enqueue_script( 'slick-slider', get_template_directory_uri() . '/libs/js/slick.js', array('jquery'), null, true );

            // functions js
            wp_enqueue_script( 'main-js', get_template_directory_uri() . '/libs/js/functions.js', array('jquery'), null, true );
        }

        /**
         * Register sidebars - Widgets
         * 
         * #1 - Widgets adsense
         * #2 - Widget Newsletter
        */
        add_action( 'widgets_init','widget_newsletter' );
        function widget_newsletter() {

            $args = array(
                'name'          => __( 'Sidebar name', 'Newsletter widget' ),
                'id'            => 'widget-newsletter',
                'description'   => 'Adicione sua newsletter aqui!',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '<h3 class=""></title>',
                'after_title'   => '</h3>'
            );
            register_sidebar( $args );
        }
    }

};

// Include do template tags
require_once( '/inc/template_tags.php' );
?>