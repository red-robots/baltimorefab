<?php
/**
 * Template Name: Contact
 */

get_header();
?>

<section class="cons_about_area">
  <?php while ( have_posts() ) : the_post(); ?>
    
    <?php if ( get_the_content() ) { ?>
      <div class="container">
        <div class="row align-items-center">
          <?php if( get_the_post_thumbnail() ){ ?>
            <div class="col-lg-6">
              <div class="service_img wow fadeInLeft">
                <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
              </div>
            </div>
          <?php } ?>
          <div class="col-lg-6">
            <div class="cons_about_content pl_100 wow fadeInRight" data-wow-delay="0.2s">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>
    <?php } ?> 

  <?php endwhile; ?>  
</section>

<?php
get_footer();
