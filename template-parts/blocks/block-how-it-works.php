<?php
/**
 * How It Works Block Template.
 *
 * @param   array $block The block settings and attributes.
 */

$how_title = get_field('how_title');
$how_description = get_field('how_description');
$trade_link = get_field('trade_link_1');

?>

<section class="how-section" id="<?php echo esc_attr($block['id']); ?>">
   <h2><?php echo esc_html($how_title); ?></h2>
   <p><?php echo wp_kses_post($how_description); ?></p>
   <div class="clear"></div>

   <!-- TRADE ONLINE -->
   <div class="panel" id="trade">
      <div class="steps">
         <?php
         if (have_rows('trade_steps')):
            while (have_rows('trade_steps')):
               the_row();
               ?>
               <div class="step">
                  <div class="circle"><?php echo esc_html(get_sub_field('number')); ?></div>
                  <h3><?php echo wp_kses_post(get_sub_field('title')); ?></h3>
                  <p><?php echo wp_kses_post(get_sub_field('description')); ?></p>
               </div>
               <?php
            endwhile;
         endif;
         ?>
      </div>
      <div class="cta">
         <?php if ($trade_link): ?>
            <a href="<?php echo esc_url($trade_link['url']); ?>"
               target="<?php echo esc_attr($trade_link['target'] ? $trade_link['target'] : '_self'); ?>"
               class="trade-btn"><?php echo esc_html($trade_link['title']); ?> →</a>
         <?php endif; ?>
      </div>
   </div>
</section>