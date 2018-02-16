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
            $destaquesHome = new WP_Query( $argsPosts );

            if( $destaquesHome->have_posts() ) :
                while( $destaquesHome->have_posts() ) :
                    $destaquesHome->the_post();
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
                endwhile;
                // reset WP_query
                wp_reset_query();
            endif;
            ?>
        </div> <!-- /End destaques -->

        <div class="last-news col-xl-3">
            <ul class="list-lastnews">
                <h3 class="title-box">Principais histórias</h3>
                <?php
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
                $lastNews = new WP_Query( $argsPosts );
                
                if( $lastNews->have_posts() ) :
                    // The Loop
                    while( $lastNews->have_posts() ):
                        $lastNews->the_post();
                ?>
                <li class="lastnews-item">
                    <?php the_post_thumbnail( 'post-thumb-small', [ 'class' => 'thumb-mini' ] ) ?>
                    <span class="date"><?php the_date()?></span>
                    <a href="<?php the_permalink() ?>" class="title"><?php the_title(); ?></a>
                </li>                
                <?php
                    endwhile;
                    // Reset the query
                    wp_reset_query();
                endif;
                ?>
            </ul>

        </div> <!-- /End last news -->
    </section> <!-- /End section home -->

    <section id="sct-2" class="row">
        <div class="col-xl-3">
            <?php
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
            $singlePost = new WP_query( $argsPost );

            if( $singlePost->have_posts() ) :
                while( $singlePost->have_posts() ) :
                    $singlePost->the_post();
            ?>
            <div class="post-wrap-left">
                <div class="content-post">
                    <div class="wrap-thumb">
                        <?php the_post_thumbnail( 'post-thumb-medium-retangle', [ 'class' => 'post-thumb' ] ); ?>
                        <span class="category"><?php the_category( 'single' ) ?></span>
                    </div>
                    <a href="<?php the_permalink() ?>">
                        <h3 class="title-small" title="<?php the_title(); ?>"><?php the_title(); ?></h3>
                        <?php the_excerpt(); ?>
                    </a>
                    <div class="wrap-infos">
                        <!-- Add visualizações -->
                        <span class="views"><i class="fa fa-eye"></i>193</span>
                        <span class="date"><i class="fa fa-clock"></i> <?php the_date() ?></span>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_query();
            endif;
            ?>
        </div> <!-- /End People Post -->
        <div class="col-xl-6">
            <?php 
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
            $healthPosts = new WP_query( $argsPosts );

            if( $healthPosts->have_posts() ) :
                while( $healthPosts->have_posts() ) :
                    $healthPosts->the_post(); 
            ?>
            <div class="post-wrap-center">
                <div class="content-post">
                    <div class="half-left-post col-8">
                        <span class="category"><?php the_category( 'single' ); ?></span>
                        <a href="<?php the_permalink() ?>">
                            <h2 class="title-medium" title="<?php the_title() ?>"><?php the_title(); ?></h2>
                            <?php the_excerpt(); ?>
                        </a>
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
                endwhile;
                // Reset new Query()
                wp_reset_query();
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
        $listPosts = new WP_query( $argsPosts );

        if( $listPosts->have_posts() ) :
            while( $listPosts->have_posts() ) :
                $listPosts->the_post();
        ?>
        <div class="post-item col-xl-3">
            <div class="post-content">
                <div class="wrap-thumb">
                    <?php the_post_thumbnail(); ?>
                    <span class="category"><?php the_category( 'single' ); ?></span>
                </div>
                <a href="<?php the_permalink() ?>">
                    <h3 class="title" title="<?php the_title(); ?>"><?php the_title(); ?></h3>
                </a>
                <div class="wrap-infos">
                    <!-- Add Views -->
                    <span class="views"><i class="fa fa-eye"></i>220</span>
                    <span class="date"><i class="fa fa-clock"></i><?php the_date(); ?></span>
                </div>
            </div>
        </div>
        <?php 
            endwhile;
            // reset wp_query()
            wp_reset_query();
        endif;
        ?>
    </section> <!-- /End section -->
    
    <div class="newsletter container">
        <!-- Add newsletter -->
        <h3 class="title-newsletter">Inscreva-se na nossa newsletter e receba dicas semanalmente!</h3>

        <form action="" class="form-newsletter">
            <div class="wrap-input col-xl-5">
                <label for="user_name" class="desc">Nome</label>
                <input type="text" name="name" id="user_name" class="ipt-form" placeholder="Meu nome" />
            </div>
            <div class="wrap-input col-xl-5">
                <label for="user_email" class="desc">E-mail</label>
                <input type="email" name="email" id="user_email" class="ipt-form" placeholder="meuemail@domain.com" />
            </div>
            <div class="wrap-input col-xl-2">
                <input type="submit" value="Manda ver" id="send_newsletter" class="btn-send">
            </div>
        </form>
        <span class="caution">Não se preocupe, também não gostamos de spam.</span>

        <!-- -->
        <?php 
            /**
             *if( is_active_sidebar( 'widget-newsletter-footer' ) ) {
             *    dynamic_sidebar( 'widget-newsletter-footer' );
             *}
            */
        ?>
    </div>

 </main><!-- /End container main -->

 <?php 
    get_footer();
 ?>