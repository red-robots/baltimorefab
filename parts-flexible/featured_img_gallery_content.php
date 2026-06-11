<?php if( get_row_layout() == 'featured_img_gallery_content' ) { 
  $featured_image = get_sub_field('featured_image');
  $gallery = get_sub_field('gallery');
  $content = get_sub_field('content');
  $image = get_sub_field('image');
  $image_position = get_sub_field('image_position');
  $image_class = '';
  if($image_position) {
    $image_class ='image-' . $image_position;
  }
  if($featured_image || $gallery || $content){
  ?>
    <section class="featured_img_gallery_content featured_img_gallery_content--<?php echo $i ?> service_details_area pt_50 <?php echo $image_class; ?>">
      <div class="container">
        <div class="row service_details_img">
          <?php if($featured_image){ ?>
            <div class="col-lg-12">
              <img src="<?php echo $featured_image['url'] ?>" alt="<?php echo $featured_image['title'] ?>" class="img-fluid" />
            </div>
          <?php } if( $gallery ){ ?>
            <?php foreach ($gallery as $g) { ?>
              <div class="col-md-4 col-sm-6">
                <img src="<?php echo $g['url'] ?>" alt="<?php echo $g['title'] ?>" class="img-fluid" />
              </div>
            <?php } ?>
          <?php } ?>
        </div>
        <?php if( $content ){ ?>
          <div class="service_details_text">
            <div class="row">
              <div class="col-lg-7 col-md-7">
                <div class="left">
                  <?php echo $content; ?>
                </div>
              </div>
              <div class="col-lg-5 col-md-5">
                <div class="right_brochure">
                  <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>" class="img-fluid" />
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </section>
  <?php } ?>
<?php } ?>
