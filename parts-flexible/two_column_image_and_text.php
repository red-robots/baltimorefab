<?php if( get_row_layout() == 'two_column_image_and_text' ) { 
  $content = get_sub_field('content');
  $button = get_sub_field('button');
  $image = get_sub_field('image');
  $image_position = get_sub_field('image_position');
  $column_class = ( $content && $image ) ? 'half':'full';
  if($image_position) {
    $column_class .=' image-' . $image_position;
  }
  $video_url = get_sub_field('video_url');
  if($video_url['url']) {
    $column_class .=' cons_video_area';
  }
  if($content || $image) { ?>
  <section class="two_column_image_and_text two_column_image_and_text--<?php echo $i ?> <?php echo $column_class; ?> cons_work_area">
    <style>
      .two_column_image_and_text--<?php echo $i ?> h2,
      .two_column_image_and_text--<?php echo $i ?> p { color:<?php echo $textcolor ?>; }
      <?php if ($button_text_color) { ?>
        .two_column_image_and_text--<?php echo $i ?> .button a {
          color: <?php echo $button_text_color ?>;
          background-color: <?php echo $button_bg_color ?>;
          border: 1px solid <?php echo $button_border_color ?>;
        }
        .two_column_image_and_text--<?php echo $i ?> .button a:hover {
          color: <?php echo $button_text_color_hover ?>;
          border: 1px solid <?php echo $button_bg_color_hover ?>;
          background-color: <?php echo $button_bg_color_hover ?>;
        }
      <?php } ?>
    </style>
    <?php if ( $content ) { ?>
      <div class="textcol large-padding cons_work_left">
        <div class="cons_about_content">
          <?php if ($content) { ?>
            <div class="content"><?php echo anti_email_spam($content) ?></div>
            <?php                      
              $button_text = (isset($button['title']) && $button['title']) ? $button['title'] : '';
              $button_link = (isset($button['url']) && $button['url']) ? $button['url'] : '';
              $button_target = (isset($button['target']) && $button['target']) ? $button['target'] : '_self';

              if($button && $button_text && $button_link) {
            ?>
              <div class="button button-custom">
                <a href="<?php echo $button_link; ?>" target="<?php echo $button_target; ?>" class="text_btn">
                  <?php echo $button_text; ?>
                </a>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    <?php } if ( $image ) { ?>
      <div class="imagecol cons_work_right">
        <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>" />
        <?php if( $video_url['url'] ){
          echo '<a href="'. $video_url['url'] .'" class="video_icon" target="'. $video_url['target'] .'"><span><i class="fas fa-play"></i></span></a>';
        } ?>
      </div>
    <?php } ?>
  </section>
  <?php } ?>
<?php } ?>
