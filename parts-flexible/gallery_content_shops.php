<?php if( get_row_layout() == 'gallery_content_shops' ) { 
  $gallery = get_sub_field('gallery');
  $content = get_sub_field('content');
  $image = get_sub_field('image');
  $image_position = get_sub_field('image_position');
  $image_class = '';
  if($image_position) {
    $image_class ='image-' . $image_position;
  }
  if($content || $gallery){
  ?>
  <div class="container featured_img_gallery_content featured_img_gallery_content--<?php echo $i ?> <?php echo $image_class; ?>">
    <?php if($i == 1){ echo '<div class="line"></div>'; } ?>
      <section class="product_details_area pt_100 pd-50">
      <div class="container">
        <div class="row product_details_inner">
            <div class="col-lg-6">
              <div class="project_details_img">
                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>" class="img-fluid" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="p_details_text">
                <?php echo $content; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    
  <?php } ?>
  <?php if( $gallery ){ ?>
    <section class="service_details_area pt_50 pd_100">
      <div class="container">
        <div class="row service_details_img">
          <?php foreach ($gallery as $g) { ?>
            <div class="col-md-4 col-sm-6">
              <img src="<?php echo $g['url'] ?>" alt="<?php echo $g['title'] ?>" class="img-fluid" />
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <?php } ?>
    <div class="line"></div>
  </div>
<?php } ?>
