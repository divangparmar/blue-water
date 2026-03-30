<?php
/**
 * Block Name: Resources Grid
 *
 * This is the template that displays the Resources Grid block.
 */

$resources = get_field('resources');
?>

<div class="wrp_book_anc">
    <?php
    if (!empty($resources)):
        foreach ($resources as $resource):
            // File URL parsing safeguards
            $file_url = '';
            if (is_numeric($resource['file_link'])) {
                $file_url = wp_get_attachment_url($resource['file_link']);
            } elseif (is_array($resource['file_link'])) {
                $file_url = isset($resource['file_link']['url']) ? $resource['file_link']['url'] : '';
            } else {
                $file_url = $resource['file_link'];
            }

            if (empty($file_url))
                continue;
            ?>
            <a href="<?php echo esc_url($file_url); ?>" target="_blank">
                <?php
                // Handle native WP image IDs for optimal srcset behavior, with fallback to hardcoded string
                if (is_numeric($resource['preview_image'])) {
                    echo wp_get_attachment_image($resource['preview_image'], 'large');
                } elseif (is_array($resource['preview_image']) && !empty($resource['preview_image']['url'])) {
                    echo '<img decoding="async" src="' . esc_url($resource['preview_image']['url']) . '" alt="">';
                } elseif (!empty($resource['preview_image'])) {
                    // simple URL string fallback
                    echo '<img decoding="async" src="' . esc_url($resource['preview_image']) . '" alt="">';
                }
                ?>
            </a>
        <?php endforeach;
    endif; ?>
    <div class="clear"></div>
</div>