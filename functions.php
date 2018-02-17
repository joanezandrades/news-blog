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
                'id'            => 'widget-newsletter-footer',
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

/**
 * Criando post_type: config_blog
 * Esse post type é exclusivo para configuração de redes sociais etc..
*/
add_action( 'init', 'nb_configs' );
function nb_configs(){
    
    $pluralName = "Páginas de Configurações";
    $singularName = "Página de Configuração";

    $labels = array(
        'name'          => $pluralName,
        'singular_name' => $singularName,
        'add_new'       => 'Nova ' . $singularName,
        'add_new_item'  => 'Adicionar ' . $singularName,
        'edit_item'     => 'Editar ' . $singularName,
        'menu_name'     => 'Configurações de contato'
    );

    $supports = array(
        'title'
    );

    $args_nb_configs = array(
        'labels'    => $labels,
        'supports'  => $supports,
        'public'    => true,
        'menu-icon' => ''
    );

    register_post_type( 'nb_configs', $args_nb_configs );
}

/**
 * Criação da página de configurações.
 * ***CORRIGIR BUG***
 * Quando habilitado o "wp_insert_post()" está criando vários posts, quando deveria cria apenas um.
*/
// Gather post data.
$my_post = array(
    'ID'            => 0,
    'post_title'    => 'Configurações',
    'post_status'   => 'publish',
    'post_type'     => 'nb_configs', // Criar post type
    'slug'          => 'configuracoes',
);
 
// Insert the post into the database.
// wp_insert_post( $my_post, $wp_error );


/**
 * Registro das redes sociais
 * Campos: Página no Facebook - Instagram - Youtube
 * Post type: pages->contato
 * 
 * prefixo nb_ = newsblog_;
*/

/**
 * Função callback
 * recebe a variável $post para referência do ID quando salvar no banco
*/
function cb_inputs_social_network( $post ) {

    $postID = get_post_meta( $post->ID ); // Referência ao ID do post

    // Variáveis p/ guardar os dados
    $nb_facebook        = $postID['nb_facebook_link'][0];
    $nb_instagram       = $postID['nb_instagram_link'][0];
    $nb_youtube         = $postID['nb_youtube_link'][0];
    ?>

    <!-- Campos -->
    <div class="wrap-input">
        <label for="nb_facebook_link">Insira o endereço da Página/Perfil do Facebook:</label>
        <input type="text" class="ipt" name="nb_facebook_link" value="<?php if( !empty( $nb_facebook ) ) { echo $nb_facebook; } ?>">
    </div>
    <div class="wrap-input">
        <label for="nb_instagram_link">Insira o endereço do seu perfil no instagram:</label>
        <input type="text" class="ipt" name="nb_instagram_link" value="<?php if( !empty( $nb_instagram ) ) { echo $nb_instagram; } ?>">
    </div>
    <div class="wrap-input">
        <label for="nb_youtube_link">Insira o endereço do seu canal no youtube:</label>
        <input type="text" class="ipt" name="nb_youtube_link" value="<?php if( !empty( $nb_youtube ) ) { echo $nb_youtube; } ?>">
    </div>
    <?php
}

/**
 * Salvando esses no banco de dados
 * recebe o $post_id para salvar a referência no banco
*/
function save_inputs_social_network( $post_id ) {

    if( isset( $_POST['nb_facebook_link'] ) ) {
        update_post_meta( $post_id, 'nb_facebook_link', sanitize_text_field( $_POST['nb_facebook_link'] ) );
    }
    if( isset( $_POST['nb_instagram_link'] ) ) {
        update_post_meta( $post_id, 'nb_instagram_link', sanitize_text_field( $_POST['nb_instagram_link'] ) );
    }
    if( isset( $_POST['nb_youtube_link'] ) ) {
        update_post_meta( $post_id, 'nb_youtube_link', sanitize_text_field( $_POST['nb_youtube_link'] ) );
    }
}
add_action( 'save_post', 'save_inputs_social_network' );

/**
 * Registrando os campos
*/
function nb_reg_social_networks() {
    
    add_meta_box(
        'nb_social_network',
        'Adicione os links das suas redes sociais',
        'cb_inputs_social_network',
        'nb_configs',
        'advanced',
        'default'
    );
}
add_action( 'add_meta_boxes', 'nb_reg_social_networks' );


// Include do template tags
require_once( '/inc/template_tags.php' );
?>