<?php 
/**
 * The single post template. Used when a single post is queried. For this and all other query templates, index.php is used if the query template is not present.
 * @version 1.0
*/
get_header();
?>

<?php 
if( have_posts() ) :
    while( have_posts() ) :
        the_post();
?>

<main class="container-fluid">
    <div class="wrap-thumb">
        <?php the_post_thumbnail( 'full', [ 'class' => 'post-thumb-full' ] ) ?>
        <div class="wrap-infos container">
            <span class="author"><?php the_author(); ?></span>
            <!-- Add Views -->
            <span class="date"><?php the_date(); ?></span>
        </div>
    </div>

    <div class="post-content container">
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

<?php 
get_footer();
?>