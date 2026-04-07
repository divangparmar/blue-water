<?php
/**
 * Services Block Template.
 *
 * @param   array $block The block settings and attributes.
 */

$services_subtitle = get_field('services_subtitle') ?: "What We Offer";
$services_title = get_field('services_title') ?: "Our <span>Services</span>";

?>

<section class="products-section" id="<?php echo esc_attr($block['id']); ?>">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="products-title">
               <span><?php echo esc_html($services_subtitle); ?></span>
               <h2><?php echo wp_kses_post($services_title); ?></h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <section class="services-section">
               <div class="services-grid">
                  <?php
                  $counter = 1;
                  if (have_rows('services_items')):
                     while (have_rows('services_items')):
                        the_row();
                        $icon_svg = get_sub_field('icon_svg');
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                        $bg_image = get_sub_field('bg_image');
                        if ($bg_image) { ?>
                           <style>
                              .products-section .card_service_<?php echo esc_attr($counter); ?> {
                                 background: url("<?php echo esc_url($bg_image); ?>") !important;
                              }
                           </style>
                           <?php
                        } ?>
                        <div
                           class="card card_serv_<?php echo esc_attr($counter); ?> card_service_<?php echo esc_attr($counter); ?>">
                           <div class="icon">
                              <?php echo $icon_svg; ?>
                           </div>
                           <h3><?php echo wp_kses_post($title); ?></h3>
                           <p>
                              <?php echo wp_kses_post($description); ?>
                           </p>
                        </div>
                        <?php
                        $counter++;
                        if ($counter > 6) {
                           $counter = 1;
                        }
                     endwhile;
                  endif;
                  ?>
               </div>
            </section>
         </div>
      </div>
   </div>
</section>