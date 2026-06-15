  <?php  
    $phone = get_field('global_phone', 'option');
    $email = get_field('global_email', 'option');
    $address = get_field('global_address', 'option');
    $mhic = get_field('global_mhic', 'option');
    $va_license = get_field('global_va_license', 'option');
  ?>
  <footer id="colophon" class="site-footer footer-area" role="contentinfo">
    <div class="footer_top">
      <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
              <div class="f_widget f_about_widget">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="f_logo">
                    <img src="<?php echo get_template_directory_uri() ?>/images/logo1.png" alt="">
                  </a>
              </div>
            </div>
            <div class="col-lg-3 offset-md-1 col-sm-5">
                <div class="f_widget f_link_widget">
                    <h3 class="f_title">Who we are</h3>
                    <?php if( has_nav_menu('footer') ) { 
                      wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu','link_before'=>'<span>','link_after'=>'</span>','items_wrap'=>'<ul id="%1$s" class="list-unstyled f_link">%3$s</ul>', 'container' => '') ); ?>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="f_widget f_contact_info_widget">
                    <h3 class="f_title">Contact Us</h3>
                    <?php if($phone){ ?>
                      <ul class="list-unstyled contact_info_link">
                        <li>Phone: <a href="tel:<?php echo format_phone_number($phone); ?>"><?php echo $phone; ?></a></li>
                        <?php if($email){ ?>
                          <li>Email: <a href="mailto:<?php echo anti_email_spam($email); ?>"><?php echo anti_email_spam($email); ?></a></li>
                        <?php } if($address){ ?>
                          <li>Address: <span><?php echo $address; ?></span></li>
                        <?php } if($mhic){ ?>
                          <li>MHIC: <span><?php echo $mhic; ?></span>	</li>
                        <?php } if($va_license){ ?>
                          <li>VA License: <span><?php echo $va_license; ?></span>	</li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="footer_bottom border_top">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-sm-7">
                  <p class="copy_text">&copy; <?php echo date('Y') ?> <?php echo get_bloginfo('name') ?></p>
              </div>
              <div class="col-sm-5 text-right">
                  <a href="#" class="go_top">go back up <i class="fas fa-angle-up"></i></a>
              </div>
          </div>
      </div>
    </div>
  </footer>

</div><!-- .site -->
<?php wp_footer(); ?>
</body>
</html>
