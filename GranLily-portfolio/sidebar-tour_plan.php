<aside class="side-tour_plan sidebar">
	<!-- 関連ツアー -->
	<section class="sidebar__related">
		<h3 class="sidebar__related-title"></h3>
		<ul class="sidebar__related-list">
			<?php
        $related_args = array(
            'post_type'      => 'tour_plan',
            'posts_per_page' => 2,
            'post__not_in'   => array(get_the_ID()),
            'orderby'        => 'rand',
            'tax_query'      => array(
                array(
                    'taxonomy' => 'tour_plan_category',
                    'field'    => 'term_id',
                    'terms'    => (!empty($terms) ? wp_list_pluck($terms, 'term_id') : array()),
                ),
            ),
        );
        $related_query = new WP_Query($related_args);
        if ($related_query->have_posts()) :
            while ($related_query->have_posts()) : $related_query->the_post();
        ?>
			<li class="sidebar__related-item">
				<a href="<?php the_permalink(); ?>" class="sidebar__related-link">
					<figure class="sidebar__related-img">
						<?php if (has_post_thumbnail()) : ?>
						<?php the_post_thumbnail('thumbnail', ['alt' => esc_attr(get_the_title())]); ?>
						<?php else : ?>
						<img src="<?php echo esc_url(get_theme_file_uri('assets/images/default-image.jpg')); ?>" alt="デフォルト画像">
						<?php endif; ?>
					</figure>
					<p class="sidebar__related-name"><?php the_title(); ?></p>
				</a>
			</li>
			<?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
			<p class="sidebar__related-none">関連するツアーはありません。</p>
			<?php endif; ?>
		</ul>
	</section>
</aside>
