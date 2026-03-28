<?php
/**
 * How It Works Block Template.
 *
 * @param   array $block The block settings and attributes.
 */

$how_title = get_field('how_title') ?: "How it works";
$how_description = get_field('how_description') ?: "Whether you’re an irrigator looking to purchase, a Vendor looking to sell, or a Partner we’re here to move water the way it should be: fast, secure, and stress-free.";
$trade_link = get_field('trade_link');
$broker_link = get_field('broker_link');

// Fallback steps
$trade_defaults = array(
   array('circle' => '1', 'title' => 'List Buy and <br> Sell Orders', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
   array('circle' => '2', 'title' => 'Match or Bid vs <br> on Parcels', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
   array('circle' => '3', 'title' => 'Price <br> Request', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
   array('circle' => '4', 'title' => 'Trade Seamlessly in Real Time', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
);

$broker_defaults = array(
   array('circle' => '1', 'title' => 'Consultation', 'description' => 'Speak with an experienced broker about your water needs.'),
   array('circle' => '2', 'title' => 'Strategy', 'description' => 'We develop a tailored buying or selling strategy for you.'),
   array('circle' => '3', 'title' => 'Sourcing', 'description' => 'Our team sources the best options across the market.'),
   array('circle' => '4', 'title' => 'Transaction', 'description' => 'We manage the entire transaction from offer to settlement.'),
);
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
         else:
            foreach ($trade_defaults as $step):
               ?>
               <div class="step">
                  <div class="circle"><?php echo esc_html($step['circle']); ?></div>
                  <h3><?php echo wp_kses_post($step['title']); ?></h3>
                  <p><?php echo wp_kses_post($step['description']); ?></p>
               </div>
               <?php
            endforeach;
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

   <!-- BROKER ASSISTED -->
   <div class="panel" id="broker" style="display:none">
      <div class="steps">
         <?php
         if (have_rows('broker_steps')):
            while (have_rows('broker_steps')):
               the_row();
               ?>
               <div class="step">
                  <div class="circle"><?php echo esc_html(get_sub_field('number')); ?></div>
                  <h3><?php echo wp_kses_post(get_sub_field('title')); ?></h3>
                  <p><?php echo wp_kses_post(get_sub_field('description')); ?></p>
               </div>
               <?php
            endwhile;
         else:
            foreach ($broker_defaults as $step):
               ?>
               <div class="step">
                  <div class="circle"><?php echo esc_html($step['circle']); ?></div>
                  <h3><?php echo wp_kses_post($step['title']); ?></h3>
                  <p><?php echo wp_kses_post($step['description']); ?></p>
               </div>
               <?php
            endforeach;
         endif;
         ?>
      </div>
      <div class="cta">
         <?php if ($broker_link): ?>
            <a href="<?php echo esc_url($broker_link['url']); ?>"
               target="<?php echo esc_attr($broker_link['target'] ? $broker_link['target'] : '_self'); ?>"
               class="broker-btn"><?php echo esc_html($broker_link['title']); ?></a>
         <?php endif; ?>
      </div>
   </div>
</section>