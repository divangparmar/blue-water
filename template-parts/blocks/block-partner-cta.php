<?php
/**
 * Block Name: Partner CTA
 *
 * This is the template that displays the Partner CTA block.
 */

$title = get_field('title') ?: '';
$description = get_field('description') ?: '';
$button = get_field('button');

?>

<section class="prt_sec1_wrapper">
    <div class="prt_sec1_container">
        <?php if ($title): ?>
            <h2 class="prt_sec1_title">
                <?php echo wp_kses_post($title); ?>
            </h2>
        <?php endif; ?>

        <?php if ($description): ?>
            <p class="prt_sec1_desc">
                <?php echo wp_kses_post($description); ?>
            </p>
        <?php endif; ?>

        <?php
        if ($button):
            $btn_url = $button['url'];
            $btn_title = $button['title'] ?: 'Sign Up Today';
            $btn_target = $button['target'] ? $button['target'] : '_self';
            ?>
            <a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>"
                class="prt_sec1_btn"><?php echo esc_html($btn_title); ?></a>
        <?php endif; ?>
    </div>
</section>