<?php
/**
 * Block Name: Video Popups
 *
 * This is the template that displays the Video Popups block.
 */

$block_id = isset($block['id']) ? $block['id'] : uniqid('vp_');
$cards = get_field('cards');
?>

<section class="vid_pop_wrapper">
    <div class="vid_pop_grid">
        <?php
        if ($cards):
            foreach ($cards as $index => $card): ?>
                <!-- CARD -->
                <div class="vid_pop_card">
                    <div>
                        <div class="vid_pop_title"><?php echo esc_html($card['title']); ?></div>
                        <div class="vid_pop_desc"><?php echo wp_kses_post($card['description']); ?></div>
                    </div>
                    <div class="vid_pop_btn"
                        onclick="openModal_<?php echo esc_attr($block_id); ?>('<?php echo esc_js($index); ?>')">
                        <?php echo esc_html($card['button_text'] ?: 'Play Video'); ?>
                    </div>
                    <?php if (!empty($card['thumbnail_image'])): ?>
                        <img src="<?php echo esc_url($card['thumbnail_image']); ?>" class="mobil_vido" alt="">
                    <?php endif; ?>
                </div>
                <?php
            endforeach;
        endif; ?>
    </div>
</section>

<!-- ===== POPUPS ===== -->
<?php
if ($cards):
    foreach ($cards as $index => $card): ?>
        <div id="vid_pop_modal_<?php echo esc_attr($block_id); ?>_<?php echo esc_attr($index); ?>" class="vid_pop_modal">
            <div class="vid_pop_modal_content">
                <div class="vid_pop_close"
                    onclick="closeModal_<?php echo esc_attr($block_id); ?>('<?php echo esc_js($index); ?>')">×</div>
                <?php
                $video_url = $card['video_file'] ? $card['video_file'] : $card['video_file'];
                $poster_url = !empty($card['video_poster']) ? (is_array($card['video_poster']) ? $card['video_poster']['url'] : $card['video_poster']) : get_template_directory_uri() . '/assets/img/video_bg.jpg';
                ?>
                <video poster="<?php echo esc_url($poster_url); ?>" controls playsinline
                    src="<?php echo esc_url($video_url); ?>">
                </video>
            </div>
        </div>
    <?php endforeach;
endif; ?>

<!-- ===== JS ===== -->
<script>
    function openModal_<?php echo esc_js($block_id); ?>(id) {
        var modalId = 'vid_pop_modal_<?php echo esc_js($block_id); ?>_' + id;
        document.getElementById(modalId).style.display = 'flex';
    }

    function closeModal_<?php echo esc_js($block_id); ?>(id) {
        var modalId = 'vid_pop_modal_<?php echo esc_js($block_id); ?>_' + id;

        // Hide modal using standard JS
        var modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = 'none';
            if (typeof jQuery !== 'undefined') {
                var $video = jQuery(modal).find('video');
                if ($video.length > 0) {
                    $video.get(0).pause();
                }
            }
        }
    }
</script>