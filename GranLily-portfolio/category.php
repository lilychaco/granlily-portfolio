<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/tulip-pc.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/tulip-sp.jpg" alt="" />
		</picture>
	</figure>
	<h2 class="mv__title"><?php echo get_the_archive_title(); ?></h2>
</section>

<?php get_template_part('common/breadcrumb') ?>

<div class="home-news home-news-layout">
	<div class="home-news__inner inner">
		<div class="home-news__container">
			<div class="home-news__main">
				<ul class="home-news__list">
					<?php
					// メインループの開始
					if (have_posts()) :
						while (have_posts()) : the_post();
						$terms = get_the_terms(get_the_ID(), 'category'); ?>

					<!-- 投稿のループ開始 -->
					<li class="home-news__item news-media">
						<a href="<?php the_permalink(); ?>" class="news-media__link">

							<div class="news-media__container">
								<figure class="news-media__img">
									<?php if (has_post_thumbnail()) : ?>
									<!-- サムネイル画像がある場合 -->
									<?php the_post_thumbnail('full', ['alt' => esc_attr(get_the_title())]); ?>
									<?php else : ?>
									<!-- サムネイルがない場合のデフォルト画像 -->
									<img src="<?php echo esc_url(get_theme_file_uri('/assets/images/23768561_s.jpg')); ?>"
										alt="<?php esc_attr_e('Default Image', 'text-domain'); ?>" />
									<?php endif; ?>
								</figure>
								<div class="news-media__content">
									<div class="news-media__meta">
										<time class="news-media__date"
											datetime="<?php echo esc_attr(get_the_time('c')); ?>"><?php echo esc_html(get_the_date('Y.m/d')); ?></time>

										<?php if (!empty($terms) && !is_wp_error($terms)) : ?>
										<span class="news-media__category">
											<?php foreach ($terms as $term) : ?>
											<?php echo esc_html($term->name); ?>
											<?php endforeach; ?>
										</span>
										<?php endif; ?>
									</div>
									<div class="news-media__body">
										<h3 class="news-media__title"><?php the_title(); ?>
										</h3>
										<!-- 投稿の本文 -->
										<div class="news-media__text">
											<?php
									// 本文を取得し、HTMLタグを除去、86文字に制限して表示
									$content = strip_tags( get_the_content() ); // HTMLタグを除去
									$trimmed_content = mb_strlen( $content, 'UTF-8' ) > 100
									? mb_substr( $content, 0, 86, 'UTF-8' ) . '...'
									: $content; // 86文字に切り詰め、省略記号を追加
									echo esc_html( $trimmed_content ); // エスケープして表示
									?>
										</div>
									</div>
								</div>

							</div>
						</a>
					</li>
					<!-- 投稿のループ終了 -->
					<?php endwhile; ?>
					<?php endif; ?>
				</ul>

				<!-- ページネーションの表示 -->
				<div class="news__nav page-nav">
					<div class="page-nav__pager">
						<?php wp_pagenavi(); ?>
					</div>
				</div>
				<div class="home-news__more">
					<a href="<?php echo esc_url(home_url('/news')); ?>" class="top-news__more-link button--03">お知らせ一覧</a>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
		<!--news__container終わり-->
	</div>
</div>


<?php get_footer(); ?>
