<?php
/**
 * Template Name: Careers
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
          <br/>
        </div>
      </div>
    <?php } ?>

      <?php 
          $args = array(
              'post_type' => 'careers',
              'posts_per_page' => -1,
              'post_status'   => 'publish',
              'order'          => 'ASC'
          );
          $services = new WP_Query($args);

          if($services->have_posts()) :
      ?>
        <div class="container">
          <div class="row services_inner">
            <?php while ( $services->have_posts() ) :
                $services->the_post();
                $id = get_the_ID();
                $short_desc = get_field('short_description');
                $icon = get_field('career_icon');
            ?>
                <div class="col-md-6">
                  <div class="service_item">
                      <div class="media service_icon">
                        <?php if( $icon ){
                          echo $icon;
                        }?>
                        <div class="media-body">
                          <?php the_title(); ?>
                        </div>
                      </div>
                      <?php if( $short_desc ){
                        echo '<p>'. $short_desc .'</p>';
                      }?>
                      <a href="<?php echo get_the_permalink($id); ?>" class="theme_btn_two hover_style_1">Apply Now</a>
                  </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
          </div>
        </div>
      <?php endif; ?>

    

  <?php endwhile; ?>  
</section>

<?php
get_footer();
