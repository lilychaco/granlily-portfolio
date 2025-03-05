			<aside class="single-news__side sidebar">
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


				<div class="sidebar-popular-wrapper">
					<section class="sidebar-popular">
						<!-- 人気記事 -->
						<?php
						$popular_posts = get_popular_posts(2); // 人気記事を3件取得

						if ($popular_posts->have_posts()) : ?>
						<h3 class="sidebar-popular__heading side-heading">人気記事</h3>
						<ul class="sidebar-popular__cards">
							<?php while ($popular_posts->have_posts()) : $popular_posts->the_post(); ?>
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
										<img src="<?php echo esc_url(get_theme_file_uri('assets/images/23768561_s.jpg')); ?>" alt="デフォルト画像" />
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
				</div>




				<section class="sidebar-archive">
					<?php
						global $wpdb;

						// 投稿データを年と月ごとに取得する関数
						function get_yearly_monthly_archive_data() {
								global $wpdb;

								// 年月ごとに投稿データを取得
								$results = $wpdb->get_results("
										SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, COUNT(ID) as post_count
										FROM {$wpdb->posts}
										WHERE post_type = 'post' AND post_status = 'publish'
										GROUP BY year, month
										ORDER BY year DESC, month DESC
								");

								// データを配列に整形
								$years = [];
								foreach ($results as $result) {
										$years[$result->year][] = [
												'month' => $result->month,
												'post_count' => $result->post_count,
												'url' => get_month_link($result->year, $result->month),
													];
											}
											return $years;
									}

									// データ取得
									$archives = get_yearly_monthly_archive_data();

									// 投稿がある場合のみアーカイブセクションを表示
									if (!empty($archives)) :
									?>

					<h3 class="sidebar-archive__heading side-heading">アーカイブ</h3>
					<div class="sidebar-archive__contents">
						<?php foreach ($archives as $year => $months): ?>
						<div class="sidebar-archive__year" data-year="<?php echo esc_html($year); ?>">
							<!-- 年ごとのトグル -->
							<div class="sidebar-archive__year-toggle js-year-toggle">
								<?php echo esc_html($year); ?>
							</div>
							<!-- 月ごとのリスト -->
							<div class="sidebar-archive__month-list">
								<?php foreach ($months as $month): ?>
								<div class="sidebar-archive__month">
									<a href="<?php echo esc_url($month['url']); ?>" class="sidebar-archive__link">
										<?php echo esc_html($month['month']); ?>月 (<?php echo esc_html($month['post_count']); ?>件)
									</a>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
				</section>

			</aside>
