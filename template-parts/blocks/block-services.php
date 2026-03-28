<?php
/**
 * Services Block Template.
 *
 * @param   array $block The block settings and attributes.
 */

$services_subtitle = get_field('services_subtitle') ?: "What We Offer";
$services_title = get_field('services_title') ?: "Our <span>Services</span>";

// Fallback services
$default_services = array(
    array(
        'icon_svg' => '<svg fill="none" stroke-width="2" viewBox="0 0 24 24"><path d="M12 1v22M17 5H9a4 4 0 0 0 0 8h6a4 4 0 0 1 0 8H6"/></svg>',
        'title' => 'Permanent Entitlement Sales',
        'description' => 'Secure long-term access with a full water entitlement purchase.'
    ),
    array(
        'icon_svg' => '<svg fill="none" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>',
        'title' => 'Temporary Allocation Lease',
        'description' => 'Access seasonal water without long-term commitment.'
    ),
    array(
        'icon_svg' => '<svg fill="none" stroke-width="2" viewBox="0 0 24 24"><path d="M21 12a9 9 0 1 1-3-6.7"/><path d="M21 3v6h-6"/></svg>',
        'title' => 'Long-Term Leasing',
        'description' => 'Lock in water security with multi-year lease options.'
    ),
    array(
        'icon_svg' => '<svg fill="none" stroke-width="2" viewBox="0 0 24 24"><path d="M3 17l6-6 4 4 8-8"/><path d="M14 7h7v7"/></svg>',
        'title' => 'Forward Allocation Sales',
        'description' => 'Plan ahead by securing future water availability today.'
    ),
    array(
        'icon_svg' => '<svg fill="none" stroke-width="2" viewBox="0 0 24 24"><path d="M3 12c3 0 3-2 6-2s3 2 6 2 3-2 6-2"/><path d="M3 16c3 0 3-2 6-2s3 2 6 2 3-2 6-2"/></svg>',
        'title' => 'Carryover Management',
        'description' => 'Maximize value by saving unused water into the next season.'
    ),
    array(
        'icon_svg' => '<svg fill="none" stroke-width="2" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="M7 14l3-3 3 3 4-6"/></svg>',
        'title' => 'Water Valuations',
        'description' => 'Get expert insight into the true market value of your water.'
    ),
);
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
                      while (have_rows('services_items')): the_row();
                          $icon_svg = get_sub_field('icon_svg');
                          $title = get_sub_field('title');
                          $description = get_sub_field('description');
                          ?>
                          <div class="card card_serv_<?php echo esc_attr($counter); ?>">
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
                              $counter = 1; // Cycle the CSS classes if more than 6 items are added
                          }
                      endwhile;
                  else:
                      foreach ($default_services as $service):
                          ?>
                          <div class="card card_serv_<?php echo esc_attr($counter); ?>">
                             <div class="icon">
                                <?php echo $service['icon_svg']; ?>
                             </div>
                             <h3><?php echo wp_kses_post($service['title']); ?></h3>
                             <p>
                                <?php echo wp_kses_post($service['description']); ?>
                             </p>
                          </div>
                          <?php
                          $counter++;
                      endforeach;
                  endif;
                  ?>
               </div>
            </section>
         </div>
      </div>
   </div>
</section>
