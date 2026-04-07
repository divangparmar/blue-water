<?php
/**
 * Testimonials Block Template.
 *
 * @param   array $block The block settings and attributes.
 */

$title_stars = get_field('testimonials_title_stars') ?: "";
$title = get_field('testimonials_title') ?: "";
$subtitle = get_field('testimonials_subtitle') ?: "";
$type_review = get_field('type_review');
$shortcode = get_field('shortcode') ?: "";
?>

<section class="section-testimonials" id="<?php echo esc_attr($block['id']); ?>">
    <div class="title-stars"><?php echo esc_html($title_stars); ?></div>
    <h2><?php echo esc_html($title); ?></h2>
    <p class="subtitle"><?php echo wp_kses_post($subtitle); ?></p>
    <?php
    if ($type_review == '0' && $shortcode):
        echo do_shortcode($shortcode);
    endif;
    ?>
    <?php if ($type_review == '1'): ?>
        <div class="cards">
            <?php
            if (have_rows('testimonials_items')):
                while (have_rows('testimonials_items')):
                    the_row();
                    $stars_rating = (int) get_sub_field('stars') ?: 5;
                    $stars_html = str_repeat('★', $stars_rating);
                    $review_text = get_sub_field('review_text');
                    $user_initials = get_sub_field('user_initials');
                    $user_name = get_sub_field('user_name');
                    $user_role = get_sub_field('user_role');

                    if (!$user_initials && $user_name) {
                        $words = explode(" ", $user_name);
                        $user_initials = "";
                        foreach ($words as $w) {
                            $user_initials .= $w[0];
                        }
                        $user_initials = strtoupper(substr($user_initials, 0, 2));
                    }
                    ?>
                    <div class="card">
                        <div class="quote">❝</div>
                        <div class="stars"><?php echo esc_html($stars_html); ?></div>
                        <div class="review">
                            <?php echo wp_kses_post($review_text); ?>
                        </div>
                        <div class="user">
                            <div class="avatar"><?php echo esc_html($user_initials); ?></div>
                            <div class="userinfo">
                                <h4><?php echo esc_html($user_name); ?></h4>
                                <span><?php echo esc_html($user_role); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
    <?php endif; ?>
</section>