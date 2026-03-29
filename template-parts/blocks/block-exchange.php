<?php
/**
 * Block Name: Exchange Section
 *
 * This is the template that displays the True Blue Water Exchange block.
 */

// Get ACF fields
$tag = get_field('tag') ?: 'True Blue Water Exchange';
$title = get_field('title') ?: 'Trade Water Anywhere.Anytime.';
$description = get_field('description') ?: '';
$button = get_field('button');
$stats = get_field('stats');

// Set default stats if none are provided
if (empty($stats)) {
    $stats = array(
        array(
            'number' => '$500+',
            'label' => 'Per Referral'
        ),
        array(
            'number' => '100+',
            'label' => 'Active Partners'
        ),
        array(
            'number' => '24hr',
            'label' => 'Payout Speed'
        ),
        array(
            'number' => 'Free',
            'label' => 'To Join'
        )
    );
}
?>

<section class="ae_a_section">
    <div class="ae_a_container">
        <div class="ae_a_left">
            <?php if ($tag): ?>
                <div class="ae_a_tag">
                    <?php echo esc_html($tag); ?>
                </div>
            <?php endif; ?>

            <?php if ($title): ?>
                <h2 class="ae_a_title">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <?php if ($description): ?>
                <p class="ae_a_desc">
                    <?php echo wp_kses_post($description); ?>
                </p>
            <?php endif; ?>

            <?php
            if ($button):
                $button_url = $button['url'];
                $button_title = $button['title'];
                $button_target = $button['target'] ? $button['target'] : '_self';
                ?>
                <a href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>"
                    class="ae_a_btn">
                    <?php echo esc_html($button_title); ?> →
                </a>
            <?php endif; ?>
        </div>
        <div class="ae_a_right">
            <?php foreach ($stats as $stat): ?>
                <div class="ae_a_box">
                    <?php if (!empty($stat['number'])): ?>
                        <h3><?php echo esc_html($stat['number']); ?></h3>
                    <?php endif; ?>

                    <?php if (!empty($stat['label'])): ?>
                        <p><?php echo esc_html($stat['label']); ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>