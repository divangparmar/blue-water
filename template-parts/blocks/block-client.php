<?php
/**
 * Client Block Template.
 *
 * @param   array $block The block settings and attributes.
 */

$client_title = get_field('client_title') ?: "Worldwide Trusted Client";

// Default client logos fallback logic
$default_logos = array(
    'client-1.png', 'client-2.png', 'client-3.png', 'client-4.png', 'client-5.png'
);
?>

<section class="client-section" id="<?php echo esc_attr($block['id']); ?>">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="client-title">
               <h4><?php echo esc_html($client_title); ?></h4>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="owl-carousel slider-3">
               <?php 
               if (have_rows('client_logos')):
                   while (have_rows('client_logos')): the_row();
                       $logo = get_sub_field('logo');
                       if ($logo):
                           ?>
                           <div class="item">
                              <div class="client-logo">
                                 <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                              </div>
                           </div>
                           <?php
                       endif;
                   endwhile;
               else:
                   foreach ($default_logos as $img):
                       ?>
                       <div class="item">
                          <div class="client-logo">
                             <img src="<?php echo get_template_directory_uri() . '/assets/img/client-pic/' . $img; ?>" alt="client" />
                          </div>
                       </div>
                       <?php
                   endforeach;
               endif;
               ?>
            </div>
         </div>
      </div>
   </div>
</section>
