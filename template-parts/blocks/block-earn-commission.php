<?php
/**
 * Block Name: Earn Commission
 *
 * This is the template that displays the Earn Commission block.
 */

$cards = get_field('cards');
?>

<section class="prt_sec3_wrapper">
    <div class="prt_sec3_grid">
        <?php
        if ($cards):
            foreach ($cards as $card): ?>
                <div class="prt_sec3_card">
                    <div class="prt_sec3_icon">
                        <?php echo $card['icon_svg']; ?>
                    </div>
                    <div class="prt_sec3_title"><?php echo esc_html($card['card_title']); ?></div>
                    <div class="prt_sec3_desc">
                        <?php echo wp_kses_post($card['card_desc']); ?>
                    </div>
                </div>
            <?php
            endforeach;
        endif; ?>
    </div>
</section>