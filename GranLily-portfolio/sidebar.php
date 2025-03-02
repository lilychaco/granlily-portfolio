			<aside class="single-news__side sidebar">
				<!-- 関連記事 -->
				<section class="sidebar__related">
					<h3 class="sidebar__related-title side-heading">関連記事</h3>
					<ul class="sidebar__related-list">
						<?php
						// 現在の記事のカテゴリーを取得
            $terms = get_the_terms(get_the_ID(), 'category');

						// カテゴリーが取得できているか確認
            if ($terms && !is_wp_error($terms)) {
                // 取得したカテゴリーの ID を配列化
                $category_ids = wp_list_pluck($terms, 'term_id');

								$related_post_args = array(
            'post_type'      => 'post',
            'posts_per_page' => 2,
            'post__not_in'   => array(get_the_ID()),
            'orderby'        => 'rand',
						// カテゴリー（タクソノミー）の条件を設定
            'tax_query'      => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'term_id',
                    'terms'    => $category_ids,
                ),
            ),
						);
					}
					$related_post_query = new WP_Query($related_post_args);

					if ($related_post_query->have_posts()) :
						while ($related_post_query->have_posts()) : $related_post_query->the_post();
						?>
						<li class="sidebar__related-item">
							<a href="<?php the_permalink(); ?>" class="sidebar__related-link">
								<?php if (!empty($terms) && !is_wp_error($terms)) : ?>
								<span class="sidebar__related-category">
									<?php foreach ($terms as $term) : ?>
									<?php echo esc_html($term->name); ?>
									<?php endforeach; ?>
								</span>
								<?php endif; ?>
								<figure class="sidebar__related-img">
									<?php if (has_post_thumbnail()) : ?>
									<?php the_post_thumbnail('thumbnail', ['alt' => esc_attr(get_the_title())]); ?>
									<?php else : ?>
									<img src="<?php echo esc_url(get_theme_file_uri('assets/images/23768561_s.jpg')); ?>" alt="デフォルト画像">
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
						<p class="sidebar__related-none">関連するお知らせはありません。</p>
						<?php endif; ?>
					</ul>
				</section>


				<section class="sidebar__popular">


					<!-- 人気記事 -->
					<?php
						$popular_posts = get_popular_posts(2); // 人気記事を3件取得

						if ($popular_posts->have_posts()) : ?>
					<h3 class="side-popular__heading side-heading side-heading--02">人気記事</h3>
					<ul class="side-popular__cards">
						<?php while ($popular_posts->have_posts()) : $popular_posts->the_post(); ?>
						<li class="side-popular__card popular-card">
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
									<time datetime="<?php echo esc_attr(get_the_time('c')); ?>" class="blog-card__date">
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




				<section class="side-archive">
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

					<h3 class="side-archive__heading side-heading side-heading--02">アーカイブ</h3>
					<div class="side-archive__contents">
						<?php foreach ($archives as $year => $months): ?>
						<div class="side-archive__year" data-year="<?php echo esc_html($year); ?>">
							<!-- 年ごとのトグル -->
							<div class="side-archive__year-toggle js-year-toggle">
								<?php echo esc_html($year); ?>
							</div>
							<!-- 月ごとのリスト -->
							<div class="side-archive__month-list">
								<?php foreach ($months as $month): ?>
								<div class="side-archive__month">
									<a href="<?php echo esc_url($month['url']); ?>" class="side-archive__link">
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
