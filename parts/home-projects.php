<?php
    $project_heading = get_field('project_heading');
    $project_title = get_field('project_title');
    $project_url = get_field('project_url');
    $project_url_text = (isset($project_url['title']) && $project_url['title']) ? $project_url['title'] : '';
    $project_url_link = (isset($project_url['url']) && $project_url['url']) ? $project_url['url'] : '';
    $project_url_target = (isset($project_url['target']) && $project_url['target']) ? $project_url['target'] : '_self';

    if( $project_title ){
?>
    <section class="projects_area pt_200">
        <div class="container">
            <div class="section_title_one">
                <h6 class="title_top"><?php echo $project_heading; ?></h6>
                <h2 class="title_head"><?php echo $project_title; ?></h2>
            </div>
            <?php 
                $args = array(
                    'post_type' => 'projects',
                    'posts_per_page' => 5,
                    'post_status'   => 'publish',
                    'order'          => 'ASC',
                    'orderby'        => 'meta_value',
                );
                $projects = new WP_Query($args);

                if($projects->have_posts()) :
            ?>
                <div class="row projects_inner">
                    <?php while ( $projects->have_posts() ) :
                        $projects->the_post();
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
            <?php endif; ?>
            <?php  if($project_url && $project_url_text && $project_url_link) { ?>
                <br/><br/>
                <div class="text-center">
                    <a href="<?php echo $project_url_link; ?>" target="<?php echo $project_url_target; ?>" class="theme_btn_two hover_style_1">
                    <?php echo $project_url_text; ?>
                    </a>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>