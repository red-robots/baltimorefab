<?php if( get_row_layout() == 'two_column_image_and_text' ) { 
  $content = get_sub_field('content');
  $image = get_sub_field('image');
  $image_position = get_sub_field('image_position');
  $column_class = ( $content && $image ) ? 'col-lg-6':'col-lg-12';
  $image_class = '';
  if($image_position) {
    $image_class ='image-' . $image_position;
  }
  if($content || $image) { ?>
  <section class="two_column_image_and_text two_column_image_and_text--<?php echo $i ?> <?php echo $image_class; ?> product_details_area pt_<?php echo $i ?>00">
    <div class="container">
      <div class="row product_details_inner">
        <?php if ( $content ) { ?>
          <div class="<?php echo $column_class; ?>">
            <div class="p_details_text">
              <?php if ($content) { ?>
                <?php echo anti_email_spam($content); ?>
              <?php } ?>
            </div>
          </div>
        <?php } if ( $image ) { ?>
          <div class="col-lg-6">
            <div class="project_details_img">
              <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>" class="img-fluid" />
          </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <?php } ?>
<?php } ?>
