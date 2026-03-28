<?php
/**
 * The header for our theme
 *
 * @package Blue_Water
 */

// Get Theme Options
$header_phone = get_field('header_phone', 'option');
$header_email = get_field('header_email', 'option');
$header_facebook = get_field('header_facebook', 'option');
$header_twitter = get_field('header_twitter', 'option');
$header_instagram = get_field('header_instagram', 'option');
$header_google = get_field('header_google', 'option');
$header_logo = get_field('header_logo', 'option');
$header_button_text = get_field('header_button_text', 'option');
$header_button_link = get_field('header_button_link', 'option');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset="<?php bloginfo('charset'); ?>" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta http-equiv="X-UA-Compatible" content="ie=edge" />
   <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/fev.png" />
   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
   <?php wp_body_open(); ?>
   <!-- Preloader -->
   <div id="preloader">
      <div id="status">
         <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/favicon.png" alt="preloader" />
      </div>
   </div>
   <!-- Header Start -->
   <header class="header">
      <div class="header-top">
         <div class="container-fluid">
            <div class="head-menu d-flex justify-content-center">
               <?php if ($header_phone): ?>
                  <div class="head-content">
                     <i class="fas fa-phone" style="rotate: 90deg;"></i>
                     <a
                        href="tel:<?php echo esc_attr(str_replace(' ', '', $header_phone)); ?>"><?php echo esc_html($header_phone); ?></a>
                  </div>
               <?php endif; ?>

               <?php if ($header_email): ?>
                  <div class="head-content">
                     <i class="fas fa-envelope"></i>
                     <a href="mailto:<?php echo esc_attr($header_email); ?>"><?php echo esc_html($header_email); ?></a>
                  </div>
               <?php endif; ?>

               <div class="head-social-icon ml-auto">
                  <?php if ($header_facebook): ?><a href="<?php echo esc_url($header_facebook); ?>" target="_blank"><i
                           class="fab fa-facebook-f"></i></a><?php else: ?><a href="#" target="_blank"><i
                           class="fab fa-facebook-f"></i></a><?php endif; ?>
                  <?php if ($header_twitter): ?><a href="<?php echo esc_url($header_twitter); ?>" target="_blank"><i
                           class="fab fa-twitter"></i></a><?php else: ?><a href="#" target="_blank"><i
                           class="fab fa-twitter"></i></a><?php endif; ?>
                  <?php if ($header_instagram): ?><a href="<?php echo esc_url($header_instagram); ?>" target="_blank"><i
                           class="fab fa-instagram"></i></a><?php else: ?><a href="#" target="_blank"><i
                           class="fab fa-instagram"></i></a><?php endif; ?>
                  <?php if ($header_google): ?><a href="<?php echo esc_url($header_google); ?>" target="_blank"><i
                           class="fab fa-google"></i></a><?php else: ?><a href="#" target="_blank"><i
                           class="fab fa-google"></i></a><?php endif; ?>
               </div>
            </div>
         </div>
      </div>
      <!--Navbar -->
      <nav class="navbar navbar-expand-lg top-menu">
         <div class="container-fluid">
            <div class="logo">
               <a href="<?php echo esc_url(home_url('/')); ?>">
                  <?php if ($header_logo): ?>
                     <img src="<?php echo esc_url($header_logo['url']); ?>"
                        alt="<?php echo esc_attr(wp_strip_all_tags(get_bloginfo('name'))); ?>" />
                  <?php else: ?>
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_a.png" alt="logo" />
                  <?php endif; ?>
               </a>
            </div>
            <div class="collapse main-nav navbar-collapse" id="navbarSupportedContent-333">
               <?php
               wp_nav_menu(array(
                  'theme_location' => 'menu-1',
                  'container' => false,
                  'menu_class' => 'navbar-nav ml-auto',
                  'fallback_cb' => '__return_false',
                  'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                  'depth' => 2,
               ));
               ?>
            </div>
            <div class="header-btn">
               <?php if ($header_button_text && $header_button_link): ?>
                  <a href="<?php echo esc_url($header_button_link['url']); ?>"
                     target="<?php echo esc_attr($header_button_link['target'] ? $header_button_link['target'] : '_self'); ?>"
                     class="button"><?php echo esc_html($header_button_text); ?></a>
               <?php else: ?>
                  <a href="https://app.truebluewaterexchange.com/" target="_blank" class="button">ENTER WATER PLATFORM</a>
               <?php endif; ?>
            </div>
            <div class="mobile-btn bttn">
               <a href="<?php echo esc_url(home_url('/contact')); ?>"><i class="fas fa-envelope-open-text"></i></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
               data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333"
               aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"><i class="ti-menu"></i></span>
            </button>
         </div>
      </nav>
   </header>
   <!-- Header End-->