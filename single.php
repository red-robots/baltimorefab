<?php
/**
 * The template for displaying all pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bellaworks
 */

global $post;
$postType = get_post_type();
$repeatable_blocks = get_field('flexible_content');

get_header(); ?>

<section class="about_main_area">
  <?php while ( have_posts() ) : the_post(); ?>
    
    <?php if ( get_the_title() ) { ?>
    
      <div class="container">
        <div class="about_inner">
          <h6 class="title_top"><?php echo $postType; ?></h6>
          <h2 class="title_head"><?php the_title(); ?></h2>
          <? if( get_the_cotnent() ){
            the_content();
          } ?>
          <br/>
        </div>
      </div>

      <?php if ($repeatable_blocks) { ?>
        <?php include( locate_template('repeatable-blocks.php') ); ?>
      <?php } ?>

    <?php } ?>

  <?php endwhile; ?>  
</section>

<?php
get_footer();
