<?php
/**
 * Block Name: Australian Owned Section
 *
 * This is the template that displays the Australian Owned section.
 */

$left_title = get_field('left_title') ?: 'Proudly 100% Australian-Owned <br> and Operated';
$left_description = get_field('left_description') ?: 'We exist to provide tailored solutions that maximise opportunity, minimise risk, and drive success for every client we serve. With real-time insights and expert brokerage services.';
$left_button = get_field('left_button');
$right_title = get_field('right_title') ?: 'Real People, Real Results';
$right_description = get_field('right_description') ?: 'Our team is made up of passionate, experienced water brokers who are dedicated to delivering the best outcomes for every client. We combine technical knowledge with a relationship-first approach.';

?>

<section class="sec_b1">
   <!-- LEFT -->
   <div class="left">
      <?php if ($left_title): ?>
          <h1><?php echo wp_kses_post($left_title); ?></h1>
      <?php endif; ?>
      
      <?php if ($left_description): ?>
          <p><?php echo wp_kses_post($left_description); ?></p>
      <?php endif; ?>
      
      <?php 
      if ($left_button): 
          $btn_url = $left_button['url'];
          $btn_title = $left_button['title'] ?: 'Get In Touch Today';
          $btn_target = $left_button['target'] ? $left_button['target'] : '_self';
          ?>
          <a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>"><?php echo esc_html($btn_title); ?></a>
      <?php else: ?>
          <a href="#">Get In Touch Today</a>
      <?php endif; ?>
   </div>
   <!-- RIGHT -->
   <div class="right">
      <div class="card">
         <?php if ($right_title): ?>
             <h2><?php echo esc_html($right_title); ?></h2>
         <?php endif; ?>
         
         <?php if ($right_description): ?>
             <p><?php echo wp_kses_post($right_description); ?></p>
         <?php endif; ?>
      </div>
   </div>
</section>
