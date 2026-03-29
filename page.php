<?php

get_header();

if (have_posts()):
	while (have_posts()):
		the_post(); ?>

		<main id="primary" class="site-main">
			<section class="about-page page-banner">
				<div class="page-banner-bg" bis_skin_checked="1">
					<div class="container" bis_skin_checked="1">
						<div class="row" bis_skin_checked="1">
							<div class="col-12" bis_skin_checked="1">
								<div class="page-title text-center" bis_skin_checked="1">
									<h2><?php the_title(); ?></h2>
									<a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
									<span>|</span>
									<a href="javaScript:void(0);"><?php echo get_the_title(); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="container mt-70">
				<?php
				the_content();
				?>
			</div>
				</main><!-- #main -->

				<?php
	endwhile;
endif;

get_footer();