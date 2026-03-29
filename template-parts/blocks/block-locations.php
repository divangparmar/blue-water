<?php
/**
 * Block Name: Locations Section
 *
 * This is the template that displays the Locations block.
 */

$title = get_field('title') ?: 'Our Locations';
$description = get_field('description') ?: 'With offices in two key regional hubs, we’re deeply connected to the communities and industries that rely on efficient, transparent water trading. Our regional presence ensures we stay close to the source — understanding local needs, building relationships, and providing on-the-ground support. Whether you’re trading online or want to speak with a local expert, our doors are always open.';
$button = get_field('button');
$locations = get_field('locations');
?>

<section class="loc_3_section">
    <div class="loc_3_wrap">
        <!-- LEFT -->
        <div class="loc_3_left">
            <?php if ($title): ?>
                <h2><?php echo esc_html($title); ?></h2>
            <?php endif; ?>

            <?php if ($description): ?>
                <p><?php echo wp_kses_post($description); ?></p>
            <?php endif; ?>

            <?php
            if ($button):
                $btn_url = $button['url'];
                $btn_title = $button['title'] ?: 'Get in touch today';
                $btn_target = $button['target'] ? $button['target'] : '_self';
                ?>
                <a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>"
                    class="loc_3_btn"><?php echo esc_html($btn_title); ?></a>
            <?php else: ?>
                <a href="#" class="loc_3_btn">Get in touch today</a>
            <?php endif; ?>
        </div>

        <!-- RIGHT -->
        <div class="loc_3_right">
            <?php foreach ($locations as $location): ?>
                <div class="loc_3_card">
                    <div class="ifrm_ab">
                        <?php echo $location['iframe_html']; // Outputs raw iframe HTML ?>
                    </div>
                    <div class="loc_3_overlay">
                        <span><?php echo esc_html($location['address']); ?></span>
                        <div class="loc_3_icon">📍</div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>