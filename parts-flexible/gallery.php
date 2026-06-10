<?php if( get_row_layout() == 'gallery' ) {  
  $title = get_sub_field('title');
  $content = get_sub_field('textcontent');
  $gallery = get_sub_field('gallery');
  $bgcolor = (get_sub_field('bgcolor')) ? get_sub_field('bgcolor') : '#fcfcfc';
  $textcolor = (get_sub_field('textcolor')) ? get_sub_field('textcolor') : '#2f3030';
  if($title || $content || $gallery) { ?>
  <style>
    #fullwidth_content_repeatable--<?php echo $i ?> h1,
    #fullwidth_content_repeatable--<?php echo $i ?> h2,
    #fullwidth_content_repeatable--<?php echo $i ?> h3,
    #fullwidth_content_repeatable--<?php echo $i ?> h4,
    #fullwidth_content_repeatable--<?php echo $i ?> h5,
    #fullwidth_content_repeatable--<?php echo $i ?> h6,
    #fullwidth_content_repeatable--<?php echo $i ?> p {
      color: <?php echo $textcolor; ?>
    }
  </style>
  <section class="repeatable-content repeatable-content-gallery repeatable--<?php echo get_row_layout() ?> repeatable--<?php echo get_row_layout() ?>-<?php echo $i ?>" style="background-color:<?php echo $bgcolor ?>; color:<?php echo $textcolor ?>">
    <div class="repeatable-inner">
      <?php if ($title || $content) { ?>
        <div class="content-wrapper large-padding large-padding-top">
          <?php if ($title) { ?>
          <h2 class="title fullwidth"><?php echo $title ?></h2>
          <?php } ?>
          <?php if ($content) { ?>
          <div class="content"><?php echo anti_email_spam($content) ?></div>
          <?php } ?>
        </div>
      <?php } ?>

      <?php if ($gallery) { $count = count($gallery); ?>
        <div class="wrapper">
          <div class="gallery-column gallery-count-<?php echo $count ?>">
            <?php foreach ($gallery as $g) { 
              $websiteUrl = get_field('attachment_website', $g['ID']);
            ?>
              <div class="gallery-item">
                <figure>
                  <?php if ($websiteUrl) { ?>
                    <a href="<?php echo $websiteUrl ?>" class="image-anchor-link" target="_blank">
                      <img src="<?php echo $g['url'] ?>" alt="<?php echo $g['title'] ?>" class="gallery">
                    </a>
                  <?php } else { ?>
                    <img src="<?php echo $g['url'] ?>" alt="<?php echo $g['title'] ?>" class="gallery">
                  <?php } ?>
                </figure>
              </div>
            <?php } ?>
          </div>
        </div>  
      <?php } ?>
    </div>
  </section>
  <?php } ?>
<?php } ?>