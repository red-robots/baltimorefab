<?php
/**
 * Template Name: Services
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
              'post_type' => 'services',
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
            <?php
              $shop_post_id = 114; // Shop page in Projects post type
              $shop_post = get_post( $shop_post_id );
              $shop_post_img_url = get_the_post_thumbnail_url($shop_post_id,'full');
              $shop_post_img_id = get_post_thumbnail_id($shop_post_id);
              $shop_post_img_alt = get_post_meta($shop_post_img_id, '_wp_attachment_image_alt', true);

              if( $shop_post_id ){
            ?>
              <div class="col-md-6 cons repair">
                <a href="<?php echo get_the_permalink($shop_post_id); ?>">
                  <div class="pr_slider_item project_item">
                      <img src="<?php echo $shop_post_img_url; ?>" alt="<?php echo esc_html($shop_post_img_alt); ?>">
                      <h4><?php echo get_the_title($shop_post_id); ?></h4>
                  </div>
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php endif; ?>

    <?php } ?>

  <?php endwhile; ?>  
</section>

<?php
get_footer();
