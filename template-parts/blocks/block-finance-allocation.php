<?php
/**
 * Block Name: Finance Allocation
 *
 * This is the template that displays the Finance Allocation block.
 */

$left_title = get_field('left_title') ?: 'Finance Temporary Allocation';
$left_subtext = get_field('left_subtext') ?: 'Need water now but want to protect your cash flow? <br> Our temporary allocation financing lets you:';
$left_cards = get_field('left_cards');

$right_title = get_field('right_title') ?: 'Finance Permanent Water Entitlements';
$right_subtext = get_field('right_subtext') ?: 'Looking to invest in long-term water security? We offer tailored finance solutions to support permanent entitlement purchases:';
$right_cards = get_field('right_cards');
?>

<section class="finc_sec_1_wrapper">
    <div class="finc_sec_1_grid">
        <!-- LEFT -->
        <div class="finc_sec_1_col">
            <?php if ($left_title): ?>
                <div class="finc_sec_1_title">
                    <?php echo esc_html($left_title); ?>
                </div>
            <?php endif; ?>

            <?php if ($left_subtext): ?>
                <div class="finc_sec_1_subtext">
                    <?php echo wp_kses_post($left_subtext); ?>
                </div>
            <?php endif; ?>

            <?php
            if ($left_cards):
                foreach ($left_cards as $card): ?>
                    <div class="finc_sec_1_card">
                        <div class="finc_sec_1_icon">
                            <?php echo $card['icon_svg']; ?>
                        </div>
                        <div>
                            <div class="finc_sec_1_card_title"><?php echo esc_html($card['card_title']); ?></div>
                            <div class="finc_sec_1_card_desc">
                                <?php echo wp_kses_post($card['card_desc']); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            endif; ?>
        </div>

        <!-- RIGHT -->
        <div class="finc_sec_1_col">
            <?php if ($right_title): ?>
                <div class="finc_sec_1_title">
                    <?php echo esc_html($right_title); ?>
                </div>
            <?php endif; ?>

            <?php if ($right_subtext): ?>
                <div class="finc_sec_1_subtext">
                    <?php echo wp_kses_post($right_subtext); ?>
                </div>
            <?php endif; ?>

            <?php
            if ($right_cards):
                foreach ($right_cards as $card): ?>
                    <div class="finc_sec_1_card">
                        <div class="finc_sec_1_icon">
                            <?php echo $card['icon_svg']; ?>
                        </div>
                        <div>
                            <div class="finc_sec_1_card_title"><?php echo esc_html($card['card_title']); ?></div>
                            <div class="finc_sec_1_card_desc">
                                <?php echo wp_kses_post($card['card_desc']); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>