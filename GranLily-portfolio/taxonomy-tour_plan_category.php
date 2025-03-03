<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/20231107malaga.jpg"
				media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/20231107malaga.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>

	<h2 class="mv__title"><?php echo get_the_archive_title(); ?></h2>
</section>

<?php get_template_part('common/breadcrumb'); ?>

<div class="archive-tour_plan archive-tour_plan-layout">
	<div class="archive-tour_plan___inner inner">

		<div class="archive-tour_plan__container">
			<div class="archive-tour_plan__main">
				<!-- カテゴリリスト部分 -->
				<ul class="archive-tour_plan_category-list category-list">
					<!-- ALL のリンク -->
					<li class="category-list__item">
						<a href="<?php echo esc_url(get_post_type_archive_link('tour_plan')); ?>"
							class="category-list__link <?php echo (is_post_type_archive('tour_plan') || is_tax('tour_plan_category')) ? '' : 'is-current'; ?>">
							ALL
						</a>
					</li>
					<?php
				// 'tour_plan_category'タクソノミーの用語を取得
				$taxonomy = 'tour_plan_category'; // タクソノミー名を変数に格納
				$terms = get_terms(array(
						'taxonomy' => $taxonomy,
						'hide_empty' => false,
				));
				if (!empty($terms)) : ?>
					<?php foreach ($terms as $term) : ?>
					<li class="category-list__item">
						<a href="<?php echo esc_url(get_term_link($term)); ?>"
							class="category-list__link <?php echo (is_tax($taxonomy, $term->slug)) ? 'is-current' : ''; ?>">
							<?php echo esc_html($term->name); ?>
						</a>
					</li>
					<?php endforeach; ?>
					<?php endif; ?>
				</ul>

				<!-- 投稿リスト部分 -->
				<div class="archive-tour_plan__content">
					<?php if (have_posts()) : ?>
					<ul class="archive-tour_plan__cards">
						<?php while (have_posts()) : the_post(); ?>
						<?php
            // 必要なカスタムフィールドとデータを事前に取得
            $link_url = get_post_meta(get_the_ID(), 'link-url', true); // カスタムフィールド 'link-url' の値
            $thumbnail = get_the_post_thumbnail(
                get_the_ID(),
                'full',
                array('alt' => esc_attr(get_the_title() )) // アイキャッチ画像の alt 属性
            );
            $default_thumbnail = get_theme_file_uri('assets/images/wilson-heart.jpg'); // デフォルト画像のパス
						$terms = get_the_terms(get_the_ID(), 'tour_plan_category');
            $content = strip_tags(get_the_content()); // 本文からHTMLタグを除去
            $trimmed_content = mb_strlen($content, 'UTF-8') > 164
                ? mb_substr($content, 0, 164, 'UTF-8')
                : $content; // 本文を164文字以内に切り詰める
            ?>
						<li class="archive-tour_plan__card">
							<a href="<?php echo esc_url(get_permalink()); ?>" class="archive-tour_plan__link">
								<figure class="archive-tour_plan__img">
									<?php if ($thumbnail) : ?>
									<!-- サムネイル画像を表示 -->
									<?php echo $thumbnail; ?>
									<?php else : ?>
									<!-- サムネイル画像がない場合はデフォルト画像を表示 -->
									<img src="<?php echo esc_url($default_thumbnail); ?>" alt="" />
									<?php endif; ?>
								</figure>

								<div class="archive-tour_plan__body">
									<div class="archive-tour_plan__top">
										<?php if (!empty($terms) && !is_wp_error($terms)) : ?>
										<div class="archive-tour_plan__category">
											<?php foreach ($terms as $term) : ?>
											<span><?php echo esc_html($term->name); ?></span>
											<?php endforeach; ?>
										</div>
										<?php endif; ?>
										<div class="archive-tour_plan__title"><?php the_title(); ?></div>
									</div>
									<div class="archive-tour_plan__subbody">
										<div class="archive-tour_plan__text">
											<?php the_content(); ?>
										</div>
										<div class="archive-tour_plan__meta">
											<p class="archive-tour_plan__price-info">
												全部コミコミ(お一人様)
											</p>
											<?php
							// カスタムフィールド「plan-price」の値を取得
							$price_new = get_field('plan-price');
							// 価格の値がある場合のみ表示
							if(!empty($price_new)):
							?>
											<div class="archive-tour_plan__price-text">
												<p class="archive-tour_plan__price-new">
													&yen;<?php echo esc_html(number_format($price_new)); ?>
												</p>
											</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</a>
						</li>
						<?php endwhile; ?>
					</ul>
					<?php endif; ?>
				</div>



				<!-- ページネーション -->
				<div class="archive-tour_plan__nav page-nav">
					<ul class="page-nav__pager">
						<?php wp_pagenavi(); ?>
					</ul>
				</div>

			</div>
			<?php get_sidebar('tour_plan'); ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>
