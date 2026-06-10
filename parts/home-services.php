<?php
    $services = get_field('services_info');
    $services_url = get_field('services_see_all');
    $services_url_text = (isset($services_url['title']) && $services_url['title']) ? $services_url['title'] : '';
    $services_url_link = (isset($services_url['url']) && $services_url['url']) ? $services_url['url'] : '';
    $services_url_target = (isset($services_url['target']) && $services_url['target']) ? $services_url['target'] : '_self';

    if( $services ){
?>
    <section class="cons_service_area_six">
        <div class="container">
            <div class="row">
                <?php foreach ($services as $service) {
                    $img_url = $service['services_logo']['url'];
                    $img_alt = $service['services_logo']['alt'];
                    $title = $service['services_title'];
                    $content = $service['services_content'];
                    $link = $service['services_link'];

                    if($title || $content) {
                ?>
                    <div class="col-md-6">
                        <a href="<?php echo $link; ?>">
                            <div class="cons_service_quality_item text-center">
                                <?php if( $img_url ){ ?>
                                    <img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>">
                                <?php } ?>
                                <h4><?php echo $title; ?></h4>
                                <?php echo anti_email_spam($content); ?>
                            </div>
                        </a>
                    </div>
                <?php }
                } ?>
                <?php  if($services_url && $services_url_text && $services_url_link) { ?>
                    <br/><br/>
                    <div class="col-md-6">
                        <a href="<?php echo $services_url_link; ?>" target="<?php echo $services_url_target; ?>" class="full_btn theme_btn_two hover_style_1 crosshatch">
                        <?php echo $services_url_text; ?>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>