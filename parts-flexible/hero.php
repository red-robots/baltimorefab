<?php if( get_row_layout() == 'hero' ) {
  $hero_type = get_sub_field('hero_type');
  if( $hero_type=='static' ) {
    $static = get_sub_field('static');
    $hero_image = ( isset($static['hero_image']) && $static['hero_image'] ) ? $static['hero_image'] : '';
    $hero_image_focal = ( isset($static['hero_image_focal']) && $static['hero_image_focal'] ) ? str_replace('_', ' ', $static['hero_image_focal']) : 'center';
    $hero_text = ( isset($static['hero_text']) && $static['hero_text'] ) ? $static['hero_text'] : '';
    if($hero_image) { ?>
    <div data-group="<?php echo get_row_layout() ?>" id="repeatable-<?php echo get_row_layout() ?>--<?php echo $i ?>" class="repeatable repeatable-<?php echo get_row_layout() ?> static-hero">
      <div class="hero-image-inner">
        <div class="heroImage" style="background-image:url('<?php echo $hero_image['url'] ?>');background-position:<?php echo $hero_image_focal ?>"></div>
        <?php if($hero_text) { ?>
        <div class="heroText">
          <div class="text"><?php echo anti_email_spam($hero_text) ?></div>
        </div>
        <?php } ?>
      </div>
    </div>
    <?php } ?>
  <?php } else if($hero_type=='slider') {
    $slides = get_sub_field('slider');
    $global_text = get_sub_field('is_global_slide_text');
    $global_content = get_sub_field('global_slide_text_content');
    $global_button_text = get_sub_field('global_slide_button_text');
    $global_button_url = get_sub_field('global_slide_button');

    if($slides) { 
    $count = ($slides) ? count($slides) : 0; ?>
    <section class="main_slider_area repeatable repeatable-<?php echo get_row_layout() ?> slider-hero" data-group="<?php echo get_row_layout() ?>" id="repeatable-<?php echo get_row_layout() ?>--<?php echo $i ?>">
      <div class="slider-progress">
        <div class="slider_progress_bar"></div>
      </div>
      <?php if($count==1) { ?>
        <?php foreach($slides as $s) {
          $image = $s['image'];
          $caption = $s['slide_text'];
          if($image) { ?>
          <div class="static-hero">  
            <div class="hero-image-inner">
              <div class="heroImage" style="background-image:url('<?php echo $image['url'] ?>');background-position:<?php echo $hero_image_focal ?>"></div>
              <?php if($caption) { ?>
                <div class="heroText">
                  <div class="text"><?php echo anti_email_spam($caption) ?></div>
                </div>
              <?php } ?>
            </div>
          </div>
          <?php } ?>  
        <?php } ?>  
      <?php } else { ?>
        <div class="main_slider">
          <?php foreach($slides as $s) { 
            $image = $s['image'];
            $caption = $s['slide_text'];
            $slide_button_text = $s['slide_button_text'];
            $slide_button = $s['slide_button'];

            if($image) { ?>
            <div class="slider_item" style="background-image:url('<?php echo $image['url'] ?>')">
              <div class="overlay_bg"></div>
              <div class="container">
                <div class="slider_text">
                  <?php if($global_text) { ?>
                    <h2><?php echo anti_email_spam($global_content) ?></h2>
                    <?php if($global_button_text){ ?>
                      <a href="<?php echo $global_button_url; ?>" class="theme_btn theme_btn_3 hover_style_1"><?php echo $global_button_text; ?></a>
                    <?php } ?>
                  <?php }else{ ?>
                    <h2><?php echo anti_email_spam($caption) ?></h2>
                    <?php if($slide_button_text){ ?>
                      <a href="<?php echo $slide_button; ?>" class="theme_btn theme_btn_3 hover_style_1"><?php echo $slide_button_text; ?></a>
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
            </div>
            <?php } ?>
          <?php } ?>  
        </div>
        <?php if ($count>1) { ?>
          <div class="slider_nav">
            <i class="fas fa-angle-left slider_left_arrow slick-arrow"></i>
            <i class="fas fa-angle-right slider_right_arrow slick-arrow"></i>
          </div>
        <?php } ?>
      <?php } ?>
    </section>
    <?php } ?>
  <?php } ?>
<?php } ?>