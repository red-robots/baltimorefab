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

get_header(); ?>

<section class="about_main_area">
  <?php while ( have_posts() ) : the_post(); ?>
    
    <?php if ( get_the_title() ) { ?>
    
      <div class="container">
        <div class="about_innerl dark_text">
            <h6 class="title_top">JOB DESCRIPTION</h6>
            <h2 class="title_head"><?php the_title(); ?></h2>
            <?php if( get_the_content() ){
              the_content();
            } ?>
          <?php
              $apply_now= get_field('apply_button');    
              $apply_now_text = (isset($apply_now['title']) && $apply_now['title']) ? $apply_now['title'] : '';
              $apply_now_link = (isset($apply_now['url']) && $apply_now['url']) ? $apply_now['url'] : '';
              $apply_now_target = (isset($apply_now['target']) && $apply_now['target']) ? $apply_now['target'] : '_self';

              if($apply_now && $apply_now_text && $apply_now_link) {
            ?>
              <a href="<?php echo $apply_now_link; ?>" target="<?php echo $apply_now_target; ?>" class="theme_btn_two hover_style_1">
                <?php echo $apply_now_text; ?>
              </a>
            <?php } ?>
        </div>
      </div>

    <?php } ?>

  <?php endwhile; ?>  
</section>

<?php
get_footer();
