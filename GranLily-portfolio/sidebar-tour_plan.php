<aside class="side-tour_plan sidebar">
	<!-- 関連ツアー -->
	<section class="sidebar__related">
		<h3 class="sidebar__related-title"></h3>
		<ul class="sidebar__related-list">
			<?php
			// 現在の記事のカテゴリーを取得
            $terms = get_the_terms(get_the_ID(), 'tour_plan_category');

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


	<section class="side-works">
		<?php
							// 最新のツアープラン情報を取得
							$latest_tour_plan_args = array(
								'post_type' => 'tour_plan', // カスタム投稿タイプが 'tour_plan' であることを指定
								'posts_per_page' => 2,  // 2件のみ取
								'orderby' => 'date',    // 日付順で取得
								'order' => 'DESC'       // 降順で取得
							);

							$latest_tour_plan_query = new WP_Query($latest_tour_plan_args);

							if ($latest_tour_plan_query->have_posts()) : ?>
		<h3 class="side-works__heading side-heading side-heading--02">最新プラン</h3>
		<ul class="side-works__items">
			<?php while ($latest_tour_plan_query->have_posts()) : $latest_tour_plan_query->the_post(); ?>
			<li class="side-works__item">
				<figure class="side-works__img">
					<?php
								// サムネイルのURLを変数に格納
								$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : get_theme_file_uri('/assets/images/works1.jpg');
								// altテキストを設定
								$alt_text = has_post_thumbnail() ? get_the_title() : 'キャンペーンの画像';
								?>
					<img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($alt_text); ?>" />
				</figure>
				<div class="side-works__body">
					<div class="side-works__top">
						<div class="side-works__title"><?php the_title(); ?>
						</div>
					</div>
				</div>
			</li>
			<?php endwhile; ?>
		</ul>
		<div class="side-works__button">
			<a href="<?php echo esc_url(home_url('/tour_plan')); ?>" class="button">View&nbsp;more</a>
		</div>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</section>
</aside>
