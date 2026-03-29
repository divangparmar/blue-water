<?php
/**
 * Block Name: Partner Logos
 *
 * This is the template that displays the Partner Logos block.
 */

$logos = get_field('logos');

?>

<div class="prtns_cmp">
    <?php
    if ($logos):
        foreach ($logos as $logo):
            $image = $logo['image'];
            $img_url = $image ? $image['url'] : '';
            $img_alt = $image ? $image['alt'] : 'partner logo';

            if ($img_url):
                ?>
                <div class="prtns_cmp_singl">
                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                </div>
                <?php
            endif;
        endforeach;
    endif; ?>
</div>