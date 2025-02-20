<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/tulip-pc.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/tulip-sp.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>
	<h2 class="mv__title">ツアープラン詳細</h2>
</section>
<?php get_template_part('common/breadcrumb') ?>


<div class="single-tour_plan single-tour_plan-layout">
	<div class="single-tour_plan__inner inner">
		<div class="single-tour_plan__container">
			<!-- メインコンテンツ -->
			<div class="single-tour_plan__main">
				<div class="single-tour_plan__article">
					<div class="single-tour_plan__header">
						<?php
                // カテゴリーの取得
                $terms = get_the_terms(get_the_ID(), 'tour_plan_category');
                if (!empty($terms) && !is_wp_error($terms)) :
                ?>
						<div class="single-tour_plan__categories">
							<?php foreach ($terms as $term) : ?>
							<span class="single-tour_plan__category"><?php echo esc_html($term->name); ?></span>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
						<h2 class="single-tour_plan__title"><?php the_title(); ?></h2>
					</div>

					<figure class="single-tour_plan__image">
						<?php if (has_post_thumbnail()) : ?>
						<?php the_post_thumbnail('full', ['alt' => esc_attr(get_the_title())]); ?>
						<?php else : ?>
						<img src="<?php echo esc_url(get_theme_file_uri('assets/images/default-image.jpg')); ?>" alt="デフォルト画像">
						<?php endif; ?>
					</figure>

					<div class="single-tour_plan__body">
						<div class="single-tour_plan__content">
							<?php the_content(); ?>
						</div>

						<!-- 価格情報 -->
						<?php
                $price_new = get_field('plan-price'); // ACF（Advanced Custom Fields）のカスタムフィールドを取得
                if (!empty($price_new)) :
                ?>
						<div class="single-tour_plan__price">
							<p class="single-tour_plan__price-label">料金（お一人様）</p>
							<p class="single-tour_plan__price-value">&yen;<?php echo esc_html(number_format($price_new)); ?></p>
						</div>
						<?php endif; ?>

						<!-- 予約ボタン -->
						<?php
                $booking_url = get_field('booking-url'); // 予約リンク（カスタムフィールド）
                if (!empty($booking_url)) :
                ?>
						<div class="single-tour_plan__booking">
							<a href="<?php echo esc_url($booking_url); ?>" class="single-tour_plan__booking-button button"
								target="_blank" rel="noopener noreferrer">
								予約する
							</a>
						</div>
						<?php endif; ?>
					</div>
				</div>

				<!-- 関連ツアー -->
				<div class="single-tour_plan__related">
					<h3 class="single-tour_plan__related-title">関連ツアー</h3>
					<ul class="single-tour_plan__related-list">
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
						<li class="single-tour_plan__related-item">
							<a href="<?php the_permalink(); ?>" class="single-tour_plan__related-link">
								<figure class="single-tour_plan__related-img">
									<?php if (has_post_thumbnail()) : ?>
									<?php the_post_thumbnail('thumbnail', ['alt' => esc_attr(get_the_title())]); ?>
									<?php else : ?>
									<img src="<?php echo esc_url(get_theme_file_uri('assets/images/default-image.jpg')); ?>"
										alt="デフォルト画像">
									<?php endif; ?>
								</figure>
								<p class="single-tour_plan__related-name"><?php the_title(); ?></p>
							</a>
						</li>
						<?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
						<p class="single-tour_plan__related-none">関連するツアーはありません。</p>
						<?php endif; ?>
					</ul>
				</div>

				<!-- 戻るボタン -->
				<div class="single-tour_plan__back">
					<a href="<?php echo esc_url(get_post_type_archive_link('tour_plan')); ?>"
						class="single-tour_plan__back-button button--03">
						ツアー一覧へ
					</a>
				</div>
			</div>
			<!-- sidebar挿入するならここ-->
		</div>
	</div>
</div>

<?php get_footer(); ?>
