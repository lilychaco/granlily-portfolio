<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/tulip-pc.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/tulip-sp.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>
	<h2 class="mv__title"><?php echo get_the_archive_title(); ?></h2>
</section>

<?php get_template_part('common/breadcrumb') ?>

<div class="blog blog-layout">
	<div class="blog__inner inner">
		<div class="blog__container">
			<div class="blog__main">
				<ul class="blog__items blog-cards blog-cards--2col">
					<?php
					// メインループの開始
					if (have_posts()) :
						while (have_posts()) : the_post(); ?>

					<!-- 投稿のループ開始 -->
					<li class="blog-card">
						<a href="<?php the_permalink(); ?>" class="blog-card__link">
							<figure class="blog-card__img">
								<?php if (has_post_thumbnail()) : ?>
								<!-- サムネイル画像がある場合 -->
								<?php the_post_thumbnail('full', ['alt' => esc_attr(get_the_title())]); ?>
								<?php else : ?>
								<!-- サムネイルがない場合のデフォルト画像 -->
								<img src="<?php echo esc_url(get_theme_file_uri('/assets/images/default.jpg')); ?>"
									alt="<?php esc_attr_e('Default Image', 'text-domain'); ?>" />
								<?php endif; ?>
							</figure>
							<div class="blog-card__body">
								<div class="blog-card__top">
									<!-- 投稿日時の表示 -->
									<time datetime="<?php echo esc_attr(get_the_time('c')); ?>" class="blog-card__date">
										<?php echo esc_html(get_the_date('Y.m/d')); ?>
									</time>
									<!-- 投稿タイトルの表示 -->
									<div class="blog-card__title"><?php the_title(); ?></div>
								</div>
								<!-- 投稿の本文 -->
								<div class="blog-card__text">
									<?php
									// 本文を取得し、HTMLタグを除去、86文字に制限して表示
									$content = strip_tags( get_the_content() ); // HTMLタグを除去
									$trimmed_content = mb_strlen( $content, 'UTF-8' ) > 86
									? mb_substr( $content, 0, 86, 'UTF-8' ) . ''
									: $content; // 86文字に切り詰め、省略記号を追加
									echo esc_html( $trimmed_content ); // エスケープして表示
									?>
								</div>
							</div>
						</a>
					</li>
					<!-- 投稿のループ終了 -->
					<?php endwhile; ?>
					<?php endif; ?>
				</ul>

				<!-- ページネーションの表示 -->
				<div class="blog__nav page-nav">
					<div class="page-nav__pager">
						<?php wp_pagenavi(); ?>
					</div>
				</div>
			</div>
			<div class="blog__side">
				<?php get_sidebar(); ?>
			</div>
			<!--blog__side終わり-->
		</div>
		<!--blog__container終わり-->
	</div>
</div>


<?php get_footer(); ?>
