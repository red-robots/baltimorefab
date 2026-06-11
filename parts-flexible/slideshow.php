<?php if( get_row_layout() == 'slideshow' ) {
  $slides = get_sub_field('slideshow');

  if($slides) {
  $count = ($slides) ? count($slides) : 0;
?>
    <section class="main_slider_area repeatable repeatable-<?php echo get_row_layout() ?> slider-hero" data-group="<?php echo get_row_layout() ?>" id="repeatable-<?php echo get_row_layout() ?>--<?php echo $i ?>">
      <div class="slider-progress">
        <div class="slider_progress_bar"></div>
      </div>
      <div class="main_slider">
        <?php foreach($slides as $s) { 
          $image = $s['url'];
          if($image) {
        ?>
          <div class="slider_item" style="background-image:url('<?php echo $image; ?>')">
            <div class="overlay_bg"></div>
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