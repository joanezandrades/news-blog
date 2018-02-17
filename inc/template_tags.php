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

                <div class="col-xl-6">
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

                <div class="col-xl-3">
                    <!-- Add Social Media -->
                    <!-- Adicionar campos na página de contato -->
                </div>
                <h1 class="title-blog" alt="" title="<?php echo bloginfo( 'description' ) ?>"><?php echo bloginfo( 'description' ) ?></h1>
            </div>
        </div>
    </header> <!-- /End .main-header -->
    <?php
}
?>