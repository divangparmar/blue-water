<?php
/**
 * Block Name: Why Partner
 *
 * This is the template that displays the Why Partner block.
 */

$title = get_field('title') ?: 'Why Partner With TB Water Exchange?';
$cards = get_field('cards');
$button = get_field('button');
?>

<section class="prt_sec2_wrapper">
    <?php if ($title): ?>
        <h2 class="prt_sec2_title">
            <?php echo esc_html($title); ?>
        </h2>
    <?php endif; ?>

    <div class="prt_sec2_grid">
        <?php foreach ($cards as $card): ?>
            <div class="prt_sec2_card">
                <div class="prt_sec2_icon">
                    <?php echo $card['icon_svg']; // SVG raw code ?>
                </div>
                <div class="prt_sec2_card_title"><?php echo esc_html($card['card_title']); ?></div>
                <div class="prt_sec2_card_desc">
                    <?php echo wp_kses_post($card['card_desc']); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php
    if ($button):
        $btn_url = $button['url'];
        $btn_title = $button['title'] ?: 'Become a Partner';
        $btn_target = $button['target'] ? $button['target'] : '_self';
        ?>
        <div class="prt_sec2_btn_wrap">
            <a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>"
                class="prt_sec2_btn"><?php echo esc_html($btn_title); ?></a>
        </div>
    <?php else: ?>
        <div class="prt_sec2_btn_wrap">
            <a href="#" class="prt_sec2_btn">Become a Partner</a>
        </div>
    <?php endif; ?>
</section>