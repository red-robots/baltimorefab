<?php
/**
 * Template Name: About Us
 */

get_header();
$repeatable_blocks = get_field('flexible_content');
?>

<?php if ($repeatable_blocks) { ?>
  <?php include( locate_template('repeatable-blocks.php') ); ?>
<?php } ?>

<section class="about_main_area">
  <?php while ( have_posts() ) : the_post(); ?>
    
    <?php if ( get_the_content() ) { ?>
      <div class="container">
        <div class="about_inner">
          <?php the_content(); ?>
        </div>
        <?php if( get_the_post_thumbnail() ){ ?>
          <div class="about_img">
            <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
          </div>
        <?php } ?>
      </div>
    <?php } ?> 

  <?php endwhile; ?>  
</section>

<?php get_template_part('parts/home-services'); ?>

<?php get_template_part('parts/clients'); ?>

<?php
get_footer();
