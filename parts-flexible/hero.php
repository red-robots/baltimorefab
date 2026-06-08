<?php if( get_row_layout() == 'hero' ) {
  $hero_type = get_sub_field('hero_type');
  if( $hero_type=='static' ) {
    $static = get_sub_field('static');
    $hero_image = ( isset($static['image']) && $static['image'] ) ? $static['image'] : '';
    $hero_text = ( isset($static['text']) && $static['text'] ) ? $static['text'] : '';
    if($hero_image) { ?>
    <section class="main_slider_area repeatable repeatable-<?php echo get_row_layout() ?> slider-hero" data-group="<?php echo get_row_layout() ?>" id="repeatable-<?php echo get_row_layout() ?>--<?php echo $i ?>">
      <div class="slider-progress">
        <div class="slider_progress_bar"></div>
      </div>
      <div data-group="<?php echo get_row_layout() ?>" id="repeatable-<?php echo get_row_layout() ?>--<?php echo $i ?>" class="repeatable repeatable-<?php echo get_row_layout() ?> static-hero main_slider">
        <div class="slider_item" style="background-image:url('<?php echo $hero_image['url'] ?>');">
          <div class="overlay_bg"></div>
          <?php if($hero_text) { ?>
            <div class="container">
              <div class="slider_text">
                <?php echo anti_email_spam($hero_text) ?>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <?php } ?>
  <?php } else if($hero_type=='slider') {
    $slides = get_sub_field('slider');
    $global_text = get_sub_field('is_global_slide_text');
    $global_content = get_sub_field('global_slide_text_content');
    $global_button= get_sub_field('global_slide_button');
    $global_button_text = (isset($global_button['title']) && $global_button['title']) ? $global_button['title'] : '';
    $global_button_link = (isset($global_button['url']) && $global_button['url']) ? $global_button['url'] : '';
    $global_button_target = (isset($global_button['target']) && $global_button['target']) ? $global_button['target'] : '_self';

    if($slides) { 
    $count = ($slides) ? count($slides) : 0; ?>
    <section class="main_slider_area repeatable repeatable-<?php echo get_row_layout() ?> slider-hero" data-group="<?php echo get_row_layout() ?>" id="repeatable-<?php echo get_row_layout() ?>--<?php echo $i ?>">
      <div class="slider-progress">
        <div class="slider_progress_bar"></div>
      </div>
      <div class="main_slider">
        <?php foreach($slides as $s) { 
          $image = $s['image'];
          $caption = $s['slide_text'];
          $slide_button = get_sub_field('button');
          $slide_button_text = (isset($slide_button['title']) && $slide_button['title']) ? $slide_button['title'] : '';
          $slide_button_link = (isset($slide_button['url']) && $slide_button['url']) ? $slide_button['url'] : '';
          $slide_button_target = (isset($slide_button['target']) && $slide_button['target']) ? $slide_button['target'] : '_self';

          if($image) { ?>
          <div class="slider_item" style="background-image:url('<?php echo $image['url'] ?>')">
            <div class="overlay_bg"></div>
            <div class="container">
              <div class="slider_text">
                <?php if($global_text) { ?>
                  <h2><?php echo anti_email_spam($global_content) ?></h2>
                  <?php if($global_button && $global_button_text && $global_button_link) { ?>
                    <a href="<?php echo $global_button_link; ?>" class="theme_btn theme_btn_3 hover_style_1" target="<?php echo $global_button_target; ?>"><?php echo $global_button_text; ?></a>
                  <?php } ?>
                <?php }else{ ?>
                  <h2><?php echo anti_email_spam($caption) ?></h2>
                  <?php if($slide_button && $slide_button_text && $slide_button_link) { ?>
                    <a href="<?php echo $slide_button_link; ?>" class="theme_btn theme_btn_3 hover_style_1" target="<?php echo $slide_button_target; ?>"><?php echo $slide_button_text; ?></a>
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
    </section>
    <?php } ?>
  <?php } ?>
<?php } ?>