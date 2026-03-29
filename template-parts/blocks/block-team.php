<?php
/**
 * Block Name: Team Section
 *
 * This is the template that displays the Team Members block.
 */

$subtitle = get_field('subtitle') ?: 'Team Member';
$title = get_field('title') ?: 'Our <span>Managing</span> Board';
$members = get_field('members');
?>

<section class="team-page-section">
    <div class="container" bis_skin_checked="1">
        <div class="row" bis_skin_checked="1">
            <div class="col-12" bis_skin_checked="1">
                <div class="team-title" bis_skin_checked="1">
                    <?php if ($subtitle): ?>
                        <span><?php echo esc_html($subtitle); ?></span>
                    <?php endif; ?>

                    <?php if ($title): ?>
                        <h2><?php echo wp_kses_post($title); ?></h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row" bis_skin_checked="1">
            <?php foreach ($members as $member):
                $image = $member['image'];
                $img_url = $image ? $image['url'] : '';
                $img_alt = $image ? $image['alt'] : 'team member';
                ?>
                <div class="col-lg-3 col-md-6 col-sm-6" bis_skin_checked="1">
                    <div class="team" bis_skin_checked="1">
                        <div class="team-pic" bis_skin_checked="1">
                            <?php if ($img_url): ?>
                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                            <?php endif; ?>
                            <div class="team-overlay" bis_skin_checked="1">
                                <?php if (!empty($member['facebook_url'])): ?>
                                    <a href="<?php echo esc_url($member['facebook_url']); ?>" target="_blank"> <i
                                            class="fab fa-facebook-f"></i></a>
                                <?php endif; ?>
                                <?php if (!empty($member['twitter_url'])): ?>
                                    <a href="<?php echo esc_url($member['twitter_url']); ?>" target="_blank"><i
                                            class="fab fa-twitter"></i></a>
                                <?php endif; ?>
                                <?php if (!empty($member['linkedin_url'])): ?>
                                    <a href="<?php echo esc_url($member['linkedin_url']); ?>" target="_blank"><i
                                            class="fab fa-linkedin-in"></i></a>
                                <?php endif; ?>
                                <?php if (!empty($member['instagram_url'])): ?>
                                    <a href="<?php echo esc_url($member['instagram_url']); ?>" target="_blank"><i
                                            class="fab fa-instagram"></i></a>
                                <?php endif; ?>
                                <?php if (!empty($member['email'])): ?>
                                    <a href="mailto:<?php echo antispambot($member['email']); ?>"><i
                                            class="fas fa-envelope"></i></a>
                                <?php endif; ?>
                                <?php if (!empty($member['phone'])): ?>
                                    <a href="tel:<?php echo esc_attr($member['phone']); ?>"><i class="fas fa-phone"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="team-content" bis_skin_checked="1">
                            <a href="#"><?php echo esc_html($member['name']); ?></a>
                            <span><?php echo esc_html($member['role']); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>