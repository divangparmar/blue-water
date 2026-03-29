<?php
/**
 * Contact Block Template.
 *
 * @param   array $block The block settings and attributes.
 */

$contact_subtitle = get_field('contact_subtitle') ?: "";
$contact_title = get_field('contact_title') ?: "";
$contact_description = get_field('contact_description') ?: "";
$contact_form_shortcode = get_field('contact_form_shortcode');
$contact_info = get_field('contact_info') ?: "";
?>

<div class="sec_a_page_container" id="<?php echo esc_attr($block['id']); ?>">
   <div class="sec_a_contact_box">
      <div class="sec_a_contact_header">
         <small><?php echo esc_html($contact_subtitle); ?></small>
         <h1><?php echo wp_kses_post($contact_title); ?></h1>
         <p><?php echo wp_kses_post($contact_description); ?></p>
      </div>

      <?php
      if ($contact_form_shortcode) {
         echo do_shortcode($contact_form_shortcode);
      }
      ?>

      <div class="sec_a_contact_info">
         <?php echo wp_kses_post($contact_info); ?>
      </div>
   </div>
</div>