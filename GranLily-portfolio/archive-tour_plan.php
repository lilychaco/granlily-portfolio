<?php get_header(); ?>

<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/20231107malaga.jpg"
				media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/20231107malaga.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>
	<h2 class="mv__title">
		<?php echo get_the_archive_title(); ?>
	</h2>
</section>

<?php get_template_part('common/breadcrumb'); ?>

<div class="archive-tour_plan archive-tour_plan-layout">
	<div class="archive-tour_plan__inner inner">
		<!-- カテゴリリスト部分 -->
		<ul class="archive-tour_plan__category-list category-list">
			<li class="category-list__item">
				<!-- ALLカテゴリへのリンク（archive-.phpに戻る） -->
				<a href="<?php echo esc_url(get_post_type_archive_link('tour_plan')); ?>"
					class="category-list__link <?php echo (!isset($_GET['term']) || $_GET['term'] == 'all') ? 'is-current' : ''; ?>">
					ALL
				</a>
			</li>
			<?php
						// 'works-category'タクソノミーの用語を取得
						$terms = get_terms(array(
								'taxonomy' => 'tour_plan_category',
								'hide_empty' => false,
						));
						?>
			<?php if (!empty($terms)) : ?>
			<?php foreach ($terms as $term) : ?>
			<li class="category-list__item">
				<?php
            // タクソノミーのリンクを取得
            $term_link = get_term_link($term);

            // リンクがエラーでないか確認
            if (!is_wp_error($term_link)) : ?>
				<a href="<?php echo esc_url($term_link); ?>"
					class="category-list__link <?php echo (isset($_GET['term']) && $_GET['term'] == $term->slug) ? 'is-current' : ''; ?>">
					<?php echo esc_html($term->name); ?>
				</a>
				<?php else : ?>
				<!-- エラーが発生した場合のフォールバック -->
				<span class="category-list__link-error">リンクの取得に失敗しました</span>
				<?php endif; ?>
			</li>
			<?php endforeach; ?>
			<?php endif; ?>
		</ul>

		<div class="archive-tour_plan__content">
			<!-- 投稿リスト部分 -->
			<?php if (have_posts()) : ?>
			<ul class="archive-tour_plan__cards">
				<?php while (have_posts()) : the_post(); ?>
				<?php
            // 必要なカスタムフィールドの値をまとめて取得
            $link_url = get_post_meta(get_the_ID(), 'link-url', true);
            $thumbnail = get_the_post_thumbnail(
                get_the_ID(),
                'full',
                array('alt' => esc_attr(get_the_title()))
            );
            $default_thumbnail = get_theme_file_uri('assets/images/wilson-heart.jpg');
            $terms = get_the_terms(get_the_ID(), 'tour_plan_category');
            $content = strip_tags(get_the_content()); // HTMLタグを除去
            ?>

				<li class="archive-tour_plan__card">
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
				</li>

				<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</div>

		<div class="archive-tour_plan__nav page-nav">
			<ul class="page-nav__pager">
				<?php wp_pagenavi(); ?>
			</ul>
		</div>
	</div>

</div>


<?php get_footer(); ?>
