
				<section class="testimonials background-gray flex padding-60">
					<div class="content contents-center">
						<div class="text-center">
							<h2><?php getthefield('testimonials_title'); ?></h2>
							<p class="subhead"><?php getthefield('testimonials_subhead'); ?></p>
						</div>
						<div class="testimonial-grid flex">

							<div class="testimonial">
								<img src="<?php get_custom('testimonial_1_img'); ?>" >
								<blockquote class="testimonial-content">
									<cite><?php get_custom('testimonial_1_name'); ?>, <br><?php get_custom('testimonial_1_position'); ?></cite>
									<p><?php get_custom('testimonial_1_testimonial'); ?></p>
								</blockquote>
							</div>

							<div class="testimonial">
								<img src="<?php get_custom('testimonial_2_img'); ?>" >
								<blockquote class="testimonial-content">
									<cite><?php get_custom('testimonial_2_name'); ?>, <br><?php get_custom('testimonial_2_position'); ?></cite>
									<p><?php get_custom('testimonial_2_testimonial'); ?></p>
								</blockquote>
							</div>

						</div>
					</div>
				</section>