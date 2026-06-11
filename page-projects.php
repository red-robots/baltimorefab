<?php
/**
 * Template Name: Projects
 */

get_header(); ?>

<section class="about_main_area">
  <?php while ( have_posts() ) : the_post(); ?>
    
    <?php if ( get_the_content() ) { ?>
    
      <div class="container">
        <div class="about_inner">
          <?php the_content(); ?>
          <br/>
        </div>
      </div>

      <?php 
          $args = array(
              'post_type' => 'projects',
              'posts_per_page' => 6,
              'post_status'   => 'publish',
              'order'          => 'ASC'
          );
          $services = new WP_Query($args);

          if($services->have_posts()) :
      ?>
        <div class="container">
          <div class="row projects_inner">
            <?php while ( $services->have_posts() ) :
                $services->the_post();
                $id = get_the_ID();
                $featured_img_url = get_the_post_thumbnail_url($id,'full');
                $featured_img_id = get_post_thumbnail_id($id);
                $featured_img_alt = get_post_meta($featured_img_id, '_wp_attachment_image_alt', true);
            ?>
                <div class="col-md-6 cons repair">
                  <a href="<?php echo get_the_permalink($id); ?>">
                    <div class="pr_slider_item project_item">
                        <img src="<?php echo $featured_img_url; ?>" alt="<?php echo esc_html($featured_img_alt); ?>">
                        <h4><?php the_title(); ?></h4>
                    </div>
                  </a>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
          </div>
        </div>
      <?php endif; ?>

    <?php } ?>

  <?php endwhile; ?>  
</section>

<?php
get_footer();
