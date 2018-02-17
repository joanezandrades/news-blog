<?php 
/**
 * Inclusão de tags de construção de blocos de conteúdos.
 * 
 * #configs
 * Prefixo nb_ = iniciais do template
 * @version 1.0
*/
?>

<?php 
/**
 * Função que retorna o logotipo customizado
*/
function nb_custom_logo() {

    $logoID = get_theme_mod( 'custom_logo' );
    $logoUrl = wp_get_attachment_image_src( $logoID, 'full' );
    ?>
    
    <img src="<?php echo $logoUrl[0] ?>" alt="" class="logotipo">
    
    <?php
}

/**
 *  Função de construção do .main-header 
*/
function nb_main_header() {
    ?>
    <header class="<?php if( is_home() ) {echo "main-header";} else { echo "main-header main-header-compact";} ?> ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3">
                    <?php nb_custom_logo(); ?>
                </div> <!-- /End logotipo -->

                <div class="col-xl-7">
                    <?php 
                        $argsMenu = array(
                            'menu'          => 'main-menu',
                            'menu_class'    => 'blog-main-menu',
                            'menu_id'       => 'blog-menu',
                            'container'     => ''
                        );
                        wp_nav_menu( $argsMenu );
                    ?>
                    <span id="btn-menu">
                        <i class="fa fa-bars"></i>
                    </span>
                </div><!-- /End Menu -->

                <div class="col-xl-2">
                    <!-- Configs social links-->
                    <?php 
                        $page_config = get_page_by_title( 'configuracoes', OBJECT, 'nb_configs' );
                        $page_id  = $page_config->ID;

                        $pageFacebook = get_post_meta( 784, 'nb_facebook_link', true );
                        $pageInstagram = get_post_meta( 784, 'nb_instagram_link', true );
                        $pageYoutube = get_post_meta( 784, 'nb_youtube_link', true );
                    ?>
                    <!-- Adicionar campos na página de contato -->
                    <div class="header-social-network">
                        <h3 class="title">Conecte-se com a gente</h3>
                        <ul class="social-network-list">
                            <li class="network-page" title="Curta nossa Página no facebook">
                                <a href="<?php echo $pageFacebook; ?>" class="network-link" target="_blank"><i class="fab fa-facebook"></i></i></a>
                            </li>
                            <li class="network-page" title="Siga nosso instagram">
                                <a href="<?php echo $pageInstagram; ?>" class="network-link" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li class="network-page" title="Assine nosso canal no youtube">
                                <a href="<?php echo $pageYoutube; ?>" class="network-link" target="_blank"><i class="fab fa-youtube"></i></a>
                            </li>

                            <?php echo $pageFacebook; ?>
                        </ul>
                    </div>
                    

                </div>
                <h1 class="title-blog" alt="" title="<?php echo bloginfo( 'description' ) ?>"><?php echo bloginfo( 'description' ) ?></h1>
            </div>
        </div>
    </header> <!-- /End .main-header -->
    <?php
}
?>