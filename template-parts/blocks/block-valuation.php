<?php
/**
 * Valuation Block Template.
 *
 * @param   array $block The block settings and attributes.
 */

$valuation_image = get_field('valuation_image');
$valuation_title = get_field('valuation_title') ?: "Instant Valuation on your Water Entitlement";
$valuation_description = get_field('valuation_description') ?: "Get a fast, accurate estimate of your water asset’s market value—no waiting, no guesswork.";
$valuation_form_shortcode = get_field('valuation_form_shortcode');
$valuation_contact_info = get_field('valuation_contact_info') ?: "Email : info@tbwater.com.au <br> Phone : +61410468191";
?>

<section class="ab_c_section" id="<?php echo esc_attr($block['id']); ?>">
   <div class="ab_c_container">
      <div class="ab_c_left">
         <?php if ($valuation_image): ?>
            <img src="<?php echo esc_url($valuation_image['url']); ?>"
               alt="<?php echo esc_attr($valuation_image['alt']); ?>">
         <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Rectangle-137.png" alt="dummy image">
         <?php endif; ?>
      </div>
      <div class="ab_c_form_box">
         <h1>
            <?php echo wp_kses_post($valuation_title); ?>
         </h1>
         <p>
            <?php echo wp_kses_post($valuation_description); ?>
         </p>

         <?php
         if ($valuation_form_shortcode) {
            echo do_shortcode($valuation_form_shortcode);
         }
         ?>

         <div class="ab_c_contact_info">
            <?php echo wp_kses_post($valuation_contact_info); ?>
         </div>
      </div>
   </div>
</section>