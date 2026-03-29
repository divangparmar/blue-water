<?php
/**
 * Testimonials Block Template.
 *
 * @param   array $block The block settings and attributes.
 */

$title_stars = get_field('testimonials_title_stars') ?: "★★★★★";
$title = get_field('testimonials_title') ?: "Trusted by User";
$subtitle = get_field('testimonials_subtitle') ?: "4.8 average rating from 100+ reviews";

$default_reviews = array(
    array(
        'stars' => 5,
        'review_text' => '"Honest, and so easy to deal with. these guys know what they are doing and made the process easy and seamless. Highly recommend Dustin and his team"',
        'user_initials' => 'JM',
        'user_name' => 'James Mitchell',
        'user_role' => 'Irrigator, VIC'
    ),
    array(
        'stars' => 5,
        'review_text' => '"For the last couple of years I have been dealing with Dustin, Ben & the team at TBWE for temporary and permanent water sales as well as long term entitlement leases. I highly recommend them for their knowledge and professionalism."',
        'user_initials' => 'SC',
        'user_name' => 'Sarah Chen',
        'user_role' => 'Agribusiness Manager, SA'
    ),
    array(
        'stars' => 5,
        'review_text' => '"Excellent service with great communication from the staff throughout the process,"',
        'user_initials' => 'DT',
        'user_name' => 'David Thompson',
        'user_role' => 'Farm Manager, NSW'
    ),
);
?>

<section class="section-testimonials" id="<?php echo esc_attr($block['id']); ?>">
    <div class="title-stars"><?php echo esc_html($title_stars); ?></div>
    <h2><?php echo esc_html($title); ?></h2>
    <p class="subtitle"><?php echo wp_kses_post($subtitle); ?></p>
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
        else:
            foreach ($default_reviews as $review):
                $stars_rating = (int) $review['stars'] ?: 5;
                $stars_html = str_repeat('★', $stars_rating);
                ?>
                <div class="card">
                    <div class="quote">❝</div>
                    <div class="stars"><?php echo esc_html($stars_html); ?></div>
                    <div class="review">
                        <?php echo wp_kses_post($review['review_text']); ?>
                    </div>
                    <div class="user">
                        <div class="avatar"><?php echo esc_html($review['user_initials']); ?></div>
                        <div class="userinfo">
                            <h4><?php echo esc_html($review['user_name']); ?></h4>
                            <span><?php echo esc_html($review['user_role']); ?></span>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
        endif;
        ?>
    </div>
</section>