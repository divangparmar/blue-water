<?php
/**
 * Block Name: Why Use TB Water Exchange
 *
 * This is the template that displays the "Why Use the TB Water Exchange" block.
 */

$subtitle = get_field('subtitle') ?: '';
$title = get_field('title') ?: '';
$description = get_field('description');
$button = get_field('button');
$bg_image = get_field('background_image');
?>

<section class="tb_1_wrapper">
    <div class="tb_1_container" <?php if ($bg_image) echo 'style="background: url(\'' . esc_url($bg_image) . '\') no-repeat center/cover;"'; ?>>
        <div class="tb_1_content">
            <?php if ($subtitle): ?>
                <div class="tb_1_subtitle">
                    <?php echo esc_html($subtitle); ?>
                </div>
            <?php endif; ?>

            <?php if ($title): ?>
                <h2 class="tb_1_title">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <?php if ($description): ?>
                <p class="tb_1_desc">
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
                    class="tb_1_btn"><?php echo esc_html($btn_title); ?></a>
            <?php endif; ?>
        </div>
    </div>
</section>