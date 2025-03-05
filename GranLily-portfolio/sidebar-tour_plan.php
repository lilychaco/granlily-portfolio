<aside class="archive-tour_plan__side sidebar">
	<section class="sidebar-popular">
		<!-- 人気ツアー -->
		<?php
		$popular_tour_posts = get_popular_posts(2, 'tour_plan'); // 人気記事を3件取得

		if ($popular_tour_posts->have_posts()) : ?>
		<h3 class="sidebar-popular__heading side-heading">人気プラン</h3>
		<ul class="sidebar-popular__cards">
			<?php while ($popular_tour_posts->have_posts()) : $popular_tour_posts->the_post(); ?>
			<li class="sidebar-popular__card popular-card">
				<!-- 投稿のURLを取得し、カード全体をリンクとして包む -->
				<a href="<?php echo esc_url(get_permalink()); ?>" class="popular-card__link">
					<div class="popular-card__img">
						<?php
											// アイキャッチ画像のHTMLを取得して変数に格納
											$thumbnail = get_the_post_thumbnail(
													get_the_ID(),
													'thumbnail',
													array('alt' => esc_attr(get_the_title() . 'のサムネイル画像'))
											);
											?>
						<?php if ($thumbnail) : ?>
						<!-- アイキャッチ画像がある場合 -->
						<?php echo $thumbnail; ?>
						<?php else : ?>
						<!-- アイキャッチ画像がない場合、デフォルト画像を表示 -->
						<img src="<?php echo esc_url(get_theme_file_uri('assets/images/Taj-Mahal.jpg')); ?>" alt="デフォルト画像" />
						<?php endif; ?>
					</div>
					<div class="popular-card__body">
						<!-- 投稿日時の表示 -->
						<time datetime="<?php echo esc_attr(get_the_time('c')); ?>" class="popular-card__date">
							<?php echo esc_html(get_the_date('Y.m/d')); ?>
						</time>
						<p class="popular-card__title"><?php the_title(); ?></p>
					</div>
				</a>
			</li>
			<?php endwhile; ?>
		</ul>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</section>

	<div class="sidebar-latest-wrapper">
		<section class="sidebar-latest">
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
			<h3 class="sidebar-latest__heading side-heading">最新プラン</h3>
			<ul class="sidebar-latest__cards">
				<?php while ($latest_tour_plan_query->have_posts()) : $latest_tour_plan_query->the_post(); ?>
				<li class="sidebar-latest__card popular-card">
					<a href="<?php echo esc_url(get_permalink()); ?>" class="popular-card__link">
						<figure class="popular-card__img">

							<?php
								// サムネイルのURLを変数に格納
								$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : get_theme_file_uri('/assets/images/works1.jpg');
								// altテキストを設定
								$alt_text = has_post_thumbnail() ? get_the_title() : 'キャンペーンの画像';
								?>
							<img src=" <?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($alt_text); ?>" />
						</figure>
						<div class="popular-card__body">
							<!-- 投稿日時の表示 -->
							<time datetime="<?php echo esc_attr(get_the_time('c')); ?>" class="popular-card__date">
								<?php echo esc_html(get_the_date('Y.m/d')); ?>
							</time>
							<div class="popular-card__title"><?php the_title(); ?>
							</div>
						</div>
					</a>
				</li>
				<?php endwhile; ?>
			</ul>

			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</section>
	</div>
</aside>
