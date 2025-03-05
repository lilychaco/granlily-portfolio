<?php get_header(); ?>

<section class="mv">
	<figure class="mv__img" id="js-main-visual">
		<img src="<?php echo get_theme_file_uri(); ?>/assets/images/20231107malaga.jpg" alt="スペインマラガ"
			data-default-image="<?php echo get_theme_file_uri(); ?>/assets/images/20231107malaga.jpg" />
	</figure>
	<h2 class="mv__title">
		<?php echo get_the_archive_title(); ?>
	</h2>
</section>

<?php get_template_part('common/breadcrumb'); ?>

<div class="archive-tour_plan archive-tour_plan-layout">
	<div class="archive-tour_plan__inner inner">
		<div class="archive-tour_plan__container">
			<div class="archive-tour_plan__main">
				<ul class="archive-tour_plan__category-list category-list">

					<li class="category-list__item" data-image="">
						<!-- ALLカテゴリへのリンク（archive-.phpに戻る） -->
						<a href="<?php echo esc_url(get_post_type_archive_link('tour_plan')); ?>"
							class="category-list__link <?php echo (!isset($_GET['term']) || $_GET['term'] == 'all') ? 'is-current' : ''; ?>">
							ALL
						</a>
					</li>

					<?php
								// 'tour_plan_categoryっv'タクソノミーの用語を取得
								$terms = get_terms(array(
										'taxonomy' => 'tour_plan_category',
										'hide_empty' => false,
								));
								?>
					<?php if (!empty($terms)) : ?>
					<?php foreach ($terms as $term) : ?>
					<?php
            $term_link = get_term_link($term);

            // 各カテゴリに対応するMV画像の取得
            $term_image = '';
            if ($term->slug === 'overseas') {
                $term_image = get_field('category-image-overseas', $term);
            } elseif ($term->slug === 'domestic') {
                $term_image = get_field('category-image-domestic', $term);
            } elseif ($term->slug === 'diving') {
                $term_image = get_field('category-image-diving', $term);
            }

            if (!is_wp_error($term_link)) :
            ?>
					<li class="category-list__item" data-image="<?php echo esc_url($term_image); ?>">
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
				<!-- カテゴリリスト部分 -->

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
										<div class="archive-tour_plan__category plan-card__category">
											<?php foreach ($terms as $term) : ?>
											<span><?php echo esc_html($term->name); ?></span>
											<?php endforeach; ?>
										</div>
										<?php endif; ?>
										<div class="archive-tour_plan__title plan-card__title"><?php the_title(); ?></div>
									</div>
									<div class="archive-tour_plan__subbody">
										<div class="archive-tour_plan__text">
											<?php
									// 本文を取得し、HTMLタグを除去、86文字に制限して表示
									$content = strip_tags( get_the_content() ); // HTMLタグを除去
									$trimmed_content = mb_strlen( $content, 'UTF-8' ) > 100
									? mb_substr( $content, 0, 86, 'UTF-8' ) . '...'
									: $content; // 86文字に切り詰め、省略記号を追加
									echo esc_html( $trimmed_content ); // エスケープして表示
									?>
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
