<?php 
/**
 * The main template. If your Theme provides its own templates, index.php must be present.
 * @version 1.0
*/
get_header();
?>

 <main class="container-fluid">
    <section id="homepage" class="row">    
        <div id="slider-homepage" class="slider-homepage col-xl-9">
            <?php
            
            global $post;
            $argsPosts = array(
                'posts_per_page'    => 3,
                'offset'            => 0,
                'post_type'         => 'post',
                'category'          => '',
                'category_name'     => '',
                'orderby'           => 'date',
                'order'             => 'DESC',
                'post_status'       => 'publish'
            );
            $arrayPosts = get_posts( $argsPosts );

            if( $arrayPosts ) :
                foreach( $arrayPosts as $post ) :
                    setup_postdata( $post );
            ?>
            <div class="slider-item">
                <?php the_post_thumbnail( 'post-thumb-big', [ 'class' => 'thumbnail-destaque'] ) ?>
                <div class="content-post">
                    <span class="category-post"><?php the_category( 'single' ); ?></span>
                    <h1 class="title-post"><?php the_title(); ?></h1>

                    <a href="<?php the_permalink() ?>" class="link-post">saiba mais</a>
                </div>
            </div>

            <?php
                wp_reset_postdata();
                endforeach;
            endif;
            ?>
        </div> <!-- /End destaques -->

        <div class="last-news col-xl-3">
            <ul class="list-lastnews">
                <h3 class="title-box">Principais histórias</h3>
                <?php
                global $post;
                $argsLastNews = array(
                    'posts_per_page'    => 3,
                    'offset'            => 2,
                    'post_type'         => 'post',
                    'category'          => '',
                    'category_name'     => '',
                    'orderby'           => 'date',
                    'order'             => 'DESC',
                    'post_status'       => 'publish'
                );
                $lastNews = get_posts( $argsPosts );
                
                if( $lastNews ) :
                    foreach( $lastNews as $post ) :
                        setup_postdata( $post );
                ?>
                <li class="lastnews-item">
                    <?php the_post_thumbnail( 'post-thumb-small', [ 'class' => 'thumb-mini' ] ) ?>
                    <span class="date"><?php the_date()?></span>
                    <p class="title"><?php the_title(); ?></p>
                </li>                
                <?php
                    endforeach;
                endif;
                ?>
            </ul>

        </div> <!-- /End last news -->
    </section> <!-- /End section home -->

    <section id="sct-2" class="row">
        <div class="col-xl-3">
            <?php
            global $post;
            $argsPost = array(
                'posts_per_page'        => 1,
                'offset'                => 0,
                'post_type'             => 'post',
                'category'              => 'people',
                'category_name'         => 'people',
                'orderby'               => '',
                'order'                 => '',
                'post_status'           => 'publish'
            );
            $singlePost = get_posts( $argsPost );

            if( $singlePost ) :
                foreach( $singlePost as $post ) :
                    setup_postdata( $post );
            ?>
            <div class="post-wrap-left">
                <div class="content-post">
                    <div class="wrap-thumb">
                        <?php the_post_thumbnail( 'post-thumb-medium-retangle', [ 'class' => 'post-thumb' ] ); ?>
                        <span class="category"><?php the_category( 'single' ) ?></span>
                    </div>
                    <h3 class="title-small"><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
                    <div class="wrap-infos">
                        <!-- Add visualizações -->
                        <span class="views"><i class="fa fa-eye"></i>193</span>
                        <span class="date"><i class="fa fa-clock"></i> <?php the_date() ?></span>
                    </div>
                </div>
            </div>
            <?php
                wp_reset_postdata();
                endforeach;
            endif;
            ?>
        </div> <!-- /End People Post -->
        <div class="col-xl-6">
            <?php 
            global $post;
            $argsPosts = array(
                'posts_per_page'        => 1,
                'offset'                => 0,
                'post_type'             => 'post',
                'category'              => 'health',
                'category_name'         => 'health',
                'orderby'               => 'date',
                'order'                 => 'DESC',
                'post_status'           => 'publish'
            );
            $healthPosts = get_posts( $argsPosts );

            if( $healthPosts ) :
                foreach( $healthPosts as $post ) :
                    setup_postdata( $post ); 
            ?>
            <div class="post-wrap-center">
                <div class="content-post">
                    <div class="half-left-post col-8">
                        <span class="category"><?php the_category( 'single' ); ?></span>
                        <h2 class="title-medium"><?php the_title(); ?></h2>
                        <?php the_excerpt(); ?>
                        <div class="wrap-infos">
                            <!-- add views -->
                            <span class="views"><i class="fa fa-eye"></i>220</span>
                            <span class="date"><i class="fa fa-clock"></i><?php the_date(); ?></span>
                        </div>
                    </div>
                    <div class="wrap-thumb col-4">
                        <?php the_post_thumbnail( 'post-thumb-medium-tower', [ 'class' => 'post-thumb'] ); ?>
                    </div>
                </div>
            </div>
            <?php
                wp_reset_postdata();
                endforeach;
            endif;
            ?>
        </div><!-- /End wrap-wide -->
        <div class="col-xl-3">
            <div class="adsense">
            </div>
        </div> <!-- /End wrap adsense -->
    </section> <!-- /End section mid -->

    <!-- Adsense big - 800x100px -->
    <div class="adsense-800x100">
        <p>Adsense 800x100</p>
    </div>
    
    <section id="sct-3" class="row">
        <?php
        $argsPosts = array(
            'posts_per_page'        => 4,
            'offset'                => 0,
            'post_type'             => 'post',
            'category'              => '',
            'category_name'         => '',
            'orderby'               => 'date',
            'order'                 => 'DESC',
            'post_status'           => 'publish'
        );
        $listPosts = get_posts( $argsPosts );

        if( $listPosts ) :
            foreach( $listPosts as $post ) :
                setup_postdata( $post );
        ?>
        <div class="post-item col-xl-3">
            <div class="post-content">
                <div class="wrap-thumb">
                    <?php the_post_thumbnail(); ?>
                    <span class="category"><?php the_category( 'single' ); ?></span>
                </div>
                <h3 class="title"><?php the_title(); ?></h3>
                <div class="wrap-infos">
                    <!-- Add Views -->
                    <span class="views"><i class="fa fa-eye"></i>220</span>
                    <span class="date"><i class="fa fa-clock"></i><?php the_date(); ?></span>
                </div>
            </div>
        </div>
        <?php 
            endforeach;
        endif;
        ?>
    </section> <!-- /End section -->
    
    <div class="newsletter">
        <!-- Add newsletter -->
        <?php 
            if( is_active_sidebar( 'widget-newsletter-footer' ) ) {
                dynamic_sidebar( 'widget-newsletter-footer' );
            }
        ?>
    </div>

 </main><!-- /End container main -->

 <?php 
    get_footer();
 ?>