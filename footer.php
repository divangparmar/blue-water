<?php
/**
 * The template for displaying the footer
 *
 * @package Blue_Water
 */

// Get Footer Theme Options
$footer_phone = get_field('footer_phone', 'option') ? get_field('footer_phone', 'option') : get_field('header_phone', 'option');
$footer_email = get_field('footer_email', 'option') ? get_field('footer_email', 'option') : get_field('header_email', 'option');
$footer_hours_1 = get_field('footer_hours_1', 'option') ? get_field('footer_hours_1', 'option') : '';
$footer_hours_2 = get_field('footer_hours_2', 'option') ? get_field('footer_hours_2', 'option') : '';
$footer_newsletter_text = get_field('footer_newsletter_text', 'option') ? get_field('footer_newsletter_text', 'option') : '';
$footer_copyright = get_field('footer_copyright_text', 'option');

$footer_facebook = get_field('header_facebook', 'option');
$footer_twitter = get_field('header_twitter', 'option');
$footer_instagram = get_field('header_instagram', 'option');
$footer_google = get_field('header_google', 'option');
?>

<!-- Contact Section Start -->
<section class="contact-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 col-md-6">
            <div class="contact-title">
               <h4>Contact Us</h4>
            </div>
            <ul class="contact-link">
               <?php if ($footer_phone): ?>
                  <li><a
                        href="tel:<?php echo esc_attr(str_replace(' ', '', $footer_phone)); ?>"><?php echo esc_html($footer_phone); ?></a>
                  </li>
               <?php endif; ?>
               <?php if ($footer_email): ?>
                  <li><a href="mailto:<?php echo esc_attr($footer_email); ?>"><?php echo esc_html($footer_email); ?></a>
                  </li>
               <?php endif; ?>
               <?php if ($footer_hours_1): ?>
                  <li><a href="#"><?php echo esc_html($footer_hours_1); ?></a></li>
               <?php endif; ?>
               <?php if ($footer_hours_2): ?>
                  <li><a href="#"><?php echo esc_html($footer_hours_2); ?></a></li>
               <?php endif; ?>
            </ul>
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="contact-title">
               <h4>Useful Link</h4>
            </div>
            <?php
            wp_nav_menu(array(
               'theme_location' => 'footer-menu',
               'container' => false,
               'menu_class' => 'contact-link',
               'fallback_cb' => false,
            ));
            ?>
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="contact-title">
               <h4>About Us</h4>
            </div>
            <?php
            if (has_nav_menu('footer-menu-2')) {
               wp_nav_menu(array(
                  'theme_location' => 'footer-menu-2',
                  'container' => false,
                  'menu_class' => 'contact-link',
                  'fallback_cb' => false,
               ));
            }
            ?>
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="contact-title">
               <h4>Newsletter</h4>
            </div>
            <div class="contact-content">
               <p><?php echo esc_html($footer_newsletter_text); ?></p>
               <form>
                  <div class="search d-flex">
                     <input type="text" class="email" placeholder="Email" />
                     <div class="box">
                        <button><i class="fas fa-location-arrow"></i></button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Contact Section End -->

<!-- Footer Start -->
<footer class="footer-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 col-md-6">
            <div class="footer-content">
               <?php if ($footer_copyright): ?>
                  <p><?php echo wp_kses_post($footer_copyright); ?></p>
               <?php else: ?>
                  <p>Copyright © <?php echo date('Y'); ?> <a href="#" target="_blank">YourCompany</a> All rights reserved.
                  </p>
               <?php endif; ?>
            </div>
         </div>
         <div class="col-lg-6 col-md-6">
            <div class="footer-social text-right">
               <?php if ($footer_facebook): ?><a href="<?php echo esc_url($footer_facebook); ?>" target="_blank"><i
                        class="fab fa-facebook-f"></i></a><?php else: ?><a href="#" target="_blank"><i
                        class="fab fa-facebook-f"></i></a><?php endif; ?>
               <?php if ($footer_twitter): ?><a href="<?php echo esc_url($footer_twitter); ?>" target="_blank"><i
                        class="fab fa-twitter"></i></a><?php else: ?><a href="#" target="_blank"><i
                        class="fab fa-twitter"></i></a><?php endif; ?>
               <?php if ($footer_google): ?><a href="<?php echo esc_url($footer_google); ?>" target="_blank"><i
                        class="fab fa-google"></i></a><?php else: ?><a href="#" target="_blank"><i
                        class="fab fa-google"></i></a><?php endif; ?>
               <?php if ($footer_instagram): ?><a href="<?php echo esc_url($footer_instagram); ?>" target="_blank"><i
                        class="fab fa-instagram"></i></a><?php else: ?><a href="#" target="_blank"><i
                        class="fab fa-instagram"></i></a><?php endif; ?>
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- Footer End -->

<!-- Back to Top Start -->
<div id="toTop" class="back-to-top text-right">
   <img src="<?php echo get_template_directory_uri(); ?>/assets/img/water-bottle.png" alt="Back to top" />
</div>
<!-- Back to Top End-->

<?php wp_footer(); ?>
</body>

</html>