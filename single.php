<?php 
/**
 * The single post template. Used when a single post is queried. For this and all other query templates, index.php is used if the query template is not present.
 * @version 1.0
 * @author JoanezAndrades
*/
get_header();
?>

<?php 
if( have_posts() ) :
    while( have_posts() ) :
        the_post();
?>

<main class="content-article container-fluid">
    <header class="header-post">
        <div class="background-thumb" style="background-image: url('<?php the_post_thumbnail_url( 'full' );?>')">
            <?php //the_post_thumbnail( 'full', [ 'class' => 'post-thumb-full' ] )?>
        </div>
        <div class="wrap-infos container">
            <!-- Add Views -->
            <span class="views"><i class="icon fa fa-eye"></i>193</span>
            <span class="author"><i class="icon fa fa-user"></i><?php the_author(); ?></span>
            <span class="date"><i class="icon fa fa-clock"></i><?php the_date(); ?></span>
        </div>
    </header>

    <div class="article container">
        <h1 class="title-post"><?php the_title(); ?></h1>
        <?php the_content(); ?>

        <div class="social-share">
            <!-- add social bar -->
        </div>
    </div>
</main> <!-- /End Main Post -->
<?php 
    endwhile;
endif;
?>

<div class="wrap-comments container">
    <!-- add Comments -->
    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>
</div>

<?php 
get_footer();
?>