<?php
/**
 * Block Name: Page Banner
 *
 * This is the template that displays the Page Banner block.
 */

$title = get_field('title') ?: '';
$bg_image = get_field('background_image') ?: '';
if ($bg_image) {
    ?>
    <style>
        .page-banner {
            background-image: url('<?php echo esc_url($bg_image); ?>');
        }
    </style>
    <?php
}
?>

<section class="about-page page-banner">
    <div class="page-banner-bg" bis_skin_checked="1">
        <div class="container" bis_skin_checked="1">
            <div class="row" bis_skin_checked="1">
                <div class="col-12" bis_skin_checked="1">
                    <div class="page-title text-center" bis_skin_checked="1">
                        <?php if ($title): ?>
                            <h2>
                                <?php echo wp_kses_post($title); ?>
                            </h2>
                        <?php endif; ?>

                        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                        <span>|</span>
                        <a href="javaScript:void(0);"><?php echo get_the_title(); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>