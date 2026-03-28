<?php
/**
 * Support Block Template.
 *
 * @param   array $block The block settings and attributes.
 */

$support_title = get_field('support_title') ?: "Step-by-Step Support";
$support_subtitle = get_field('support_subtitle') ?: "We’re with you at every stage – from your first enquiry to final trade. <br> Our expert team ensures the process is simple, transparent, and tailored to your needs.";

// Default items fallback
$default_items = array(
   array(
      'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap w-6 h-6 text-secondary"><path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path></svg>',
      'title' => 'Initial Consult & <br> Understanding  your Needs',
      'link' => '#',
      'description' => 'We take the time to understand your unique water needs and goals.'
   ),
   array(
      'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-column w-6 h-6 text-secondary"><path d="M3 3v16a2 2 0 0 0 2 2h16"></path><path d="M18 17V9"></path><path d="M13 17V5"></path><path d="M8 17v-3"></path></svg>',
      'title' => 'Market Assessment <br> & Strategy',
      'link' => '#',
      'description' => 'Using expert insights, we assess the market and build a tailored strategy.'
   ),
   array(
      'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dollar-sign w-6 h-6 text-secondary"><line x1="12" x2="12" y1="2" y2="22"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>',
      'title' => 'Sourcing Exclusive Water Opportunities',
      'link' => '#',
      'description' => 'We connect you with premium, often off-market, water opportunities.'
   ),
   array(
      'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-6 h-6 text-secondary"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline><polyline points="16 7 22 7 22 13"></polyline></svg>',
      'title' => 'Seamless Fast <br> Transactions',
      'link' => '#',
      'description' => 'Our team manages the process for smooth, efficient transactions.'
   ),
);
?>
<!-- Support Section Start -->
<section class="support-section" id="<?php echo esc_attr($block['id']); ?>">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12">
            <div class="support-title text-center">
               <h2><?php echo esc_html($support_title); ?></h2>
               <h5><?php echo wp_kses_post($support_subtitle); ?></h5>
            </div>
         </div>
         <div class="col-lg-12 col-md-12">
            <div class="support-item">
               <div class="row">
                  <?php
                  if (have_rows('support_items')):
                     while (have_rows('support_items')):
                        the_row();
                        $icon_svg = get_sub_field('icon_svg');
                        $title = get_sub_field('title');
                        $link = get_sub_field('link') ?: 'javaScript:void(0)';
                        $description = get_sub_field('description');
                        ?>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                           <div class="support-content text-left">
                              <div class="support-icon">
                                 <?php echo $icon_svg; ?>
                              </div>
                              <div class="support-discription">
                                 <a href="<?php echo $link; ?>"><?php echo wp_kses_post($title); ?></a>
                                 <p><?php echo wp_kses_post($description); ?></p>
                              </div>
                           </div>
                        </div>
                        <?php
                     endwhile;
                  else:
                     // Display defaults if no ACF data yet
                     foreach ($default_items as $item):
                        ?>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                           <div class="support-content text-left">
                              <div class="support-icon">
                                 <?php echo $item['icon_svg']; ?>
                              </div>
                              <div class="support-discription">
                                 <a
                                    href="<?php echo esc_url($item['link']); ?>"><?php echo wp_kses_post($item['title']); ?></a>
                                 <p><?php echo wp_kses_post($item['description']); ?></p>
                              </div>
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
   </div>
</section>
<!-- Support Section End -->