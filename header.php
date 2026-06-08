<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if ( is_singular(array('post')) ) {
global $post;
$post_id = $post->ID;
$thumbId = get_post_thumbnail_id($post_id);
$featImg = wp_get_attachment_image_src($thumbId,'full'); ?>
<!-- SOCIAL MEDIA META TAGS -->
<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
<meta property="og:url"   content="<?php echo get_permalink(); ?>" />
<meta property="og:type"  content="article" />
<meta property="og:title" content="<?php echo get_the_title(); ?>" />
<meta property="og:description" content="<?php echo (get_the_excerpt()) ? strip_tags(get_the_excerpt()):''; ?>" />
<?php if ($featImg) { ?>
<meta property="og:image" content="<?php echo $featImg[0] ?>" />
<?php } ?>
<!-- end of SOCIAL MEDIA META TAGS -->
<?php } ?>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="<?php bloginfo("template_url") ?>/css/jquery.fancybox.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div id="page" class="site body_wrapper">
    <div id="preloader">
      <div class="product_name">LOADING</div>
    </div>
    <?php
      $logo_white = get_field('white_logo', 'option');
      $logo = get_field('colored_logo', 'option');
    ?>
    <a class="skip-link sr" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>
    <header id="masthead" class="header_tranparent">
      <div class="header_top">
        <div class="container"></div>
      </div>
      <nav id="header" class="navbar navbar-expand-lg white_menu">
        <div class="container">
          <?php if($logo_white){ ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand sticky_logo">
              <img src="<?php echo $logo_white['url']; ?>" alt="<?php bloginfo( 'name' ); ?>">
              <img src="<?php echo $logo['url']; ?>" alt="<?php bloginfo( 'name' ); ?>">
            </a>
          <?php }else{ ?>
            <?php the_custom_logo(); ?>
          <?php } ?>

          <nav id="site-navigation" class="main-navigation collapse navbar-collapse" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'items_wrap'=>'<ul id="%1$s" class="%2$s">%3$s</ul>', 'menu_class' => 'navbar-nav menu ml-166') ); ?>
          </nav>

          <div class="menu-toggle list-unstyled navbar-nav navright menu_btn" aria-expanded="false" aria-controls="#primary-navigation">
            <li class=""></li>
            <span class="sr">Menu Toggle</span>
            <span class="bar"><span></span></span>
          </div>
        </div>
      </nav>
    </header>
    <!-- Mobile Menu -->
    <?php
        $menu_items = wp_get_nav_menu_items('Mobile Menu');

        if ( !empty($menu_items) ) {
    ?>
    <div class="mobile-primary-navigation mobile_menu d-flex flex-wrap align-items-center">
      <div class="close_btn">X</div>
      <?php
        echo '<ul class="list-unstyled mb_menu wd_scroll">';
          foreach ( $menu_items as $menu_item ) {
              $parent_ids = wp_list_pluck( $menu_items, 'menu_item_parent' );
              $has_children = in_array( $menu_item->ID, $parent_ids );
              $parent_class = $has_children ? 'menu-item-has-children' : '';

              // Parent Link
              if ($menu_item->menu_item_parent == 0) {
                echo '<li class="'. $parent_class .'"><a href="' . esc_url($menu_item->url) . '">' . ($menu_item->title) . '</a>';

                // Loop through the same menu to find matching children
                if ($has_children ) {
                  echo '<ul class="list-unstyled">';
                  foreach ($menu_items as $sub_item) {
                    if ($sub_item->menu_item_parent == $menu_item->ID) {
                        echo '<li><a href="' . esc_url($sub_item->url) . '">' . esc_html($sub_item->title) . '</a></li>';
                    }
                  }
                  echo '</ul>'; // End of sub-menu
                }
              echo '</li>';
              }
          }
          echo '</ul>';
        } 
      ?>
    </div>
    <div class="body_capture"></div>
    <!-- Mobile Menu - END -->

		<?php get_template_part('parts/hero'); ?>
    <div id="content" class="site-content">
