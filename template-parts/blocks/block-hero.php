<?php
/**
 * Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 */

$hero_subtitle = get_field('hero_subtitle') ?: "Australia's #1 Water Trading Platform";
$hero_title = get_field('hero_title') ?: "Trade Water <br />Anywhere, Anytime.";
$hero_description = get_field('hero_description') ?: "With True Blue, you get the best of both worlds – the personalized service of an experienced<br> broker and the freedom to trade online anytime, anywhere.";
$hero_button = get_field('hero_button');
$hero_background_image = get_field('hero_background_image');

$bg_style = '';
if ($hero_background_image) {
   ?>
   <style>
      .banner-section {
         background: url("<?php echo esc_url($hero_background_image['url']); ?>");
         background-repeat: no-repeat;
         background-size: cover;
         background-position: center;
      }
   </style>
   <?php
}
?>
<!-- Banner Start -->
<section class="banner-section" id="<?php echo esc_attr($block['id']); ?>">
   <div class="banner-bg">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="banner-title">
                  <h6><?php echo esc_html($hero_subtitle); ?></h6>
                  <h1><?php echo wp_kses_post($hero_title); ?></h1>
                  <p><?php echo wp_kses_post($hero_description); ?></p>

                  <?php if ($hero_button): ?>
                     <div class="banner-bttn bttn">
                        <a href="<?php echo esc_url($hero_button['url']); ?>"
                           target="<?php echo esc_attr($hero_button['target'] ? $hero_button['target'] : '_self'); ?>"
                           class="btn-1"><?php echo esc_html($hero_button['title']); ?></a>
                     </div>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- Banner End -->