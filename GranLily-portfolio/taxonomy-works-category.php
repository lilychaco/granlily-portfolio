<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/pctote.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/pctote.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>

	<h2 class="mv__title"><?php echo get_the_archive_title(); ?></h2>
</section>

<?php get_template_part('common/breadcrumb'); ?>

<div class="archive-works archive-works-layout">
	<div class="archive-works__inner inner">
		<!-- カテゴリリスト部分 -->
		<ul class="archive-works__category-list category-list">
			<!-- ALL のリンク -->
			<li class="category-list__item">
				<a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>"
					class="category-list__link <?php echo (is_post_type_archive('works') || is_tax('works-category')) ? '' : 'is-current'; ?>">
					ALL
				</a>
			</li>
			<?php
				// 'works-category'タクソノミーの用語を取得
				$taxonomy = 'works-category'; // タクソノミー名を変数に格納
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

		<?php if (have_posts()) : ?>
		<ul class="archive-works__content archive-works-cards">
			<?php while (have_posts()) : the_post(); ?>
			<?php
            // 必要なカスタムフィールドとデータを事前に取得
            $link_url = get_post_meta(get_the_ID(), 'link-url', true); // カスタムフィールド 'link-url' の値
            $thumbnail = get_the_post_thumbnail(
                get_the_ID(),
                'full',
                array('alt' => esc_attr(get_the_title() . 'の画像')) // アイキャッチ画像の alt 属性
            );
            $default_thumbnail = get_theme_file_uri('assets/images/works1.jpg'); // デフォルト画像のパス
            $content = strip_tags(get_the_content()); // 本文からHTMLタグを除去
            $trimmed_content = mb_strlen($content, 'UTF-8') > 164
                ? mb_substr($content, 0, 164, 'UTF-8')
                : $content; // 本文を164文字以内に切り詰める
            ?>
			<li class="archive-works-cards__item archive-works-card">

				<figure class="archive-works-card__img">
					<?php if ($thumbnail) : ?>
					<!-- アイキャッチ画像がある場合 -->
					<?php echo $thumbnail; ?>
					<?php else : ?>
					<!-- デフォルト画像を表示 -->
					<img src="<?php echo esc_url($default_thumbnail); ?>" alt="制作物トップページ" />
					<?php endif; ?>
				</figure>

				<div class="archive-works-card__body">
					<div class="archive-works-card__top">
						<div class="archive-works-card__category">
							<?php single_term_title(); // タクソノミー名を表示 ?>
						</div>
						<div class="archive-works-card__title">
							<?php the_title(); // 投稿タイトル ?>
						</div>
					</div>


					<div class="works-card__text">
						<?php
									// 現在表示中のページ（固定ページや投稿など）のIDを取得
									$current_post_id = get_the_ID();

									// 現在のページIDをもとにカスタムフィールドの値を取得
									$link_url = get_post_meta($current_post_id, 'link-url', true);
									$user_name = get_post_meta($current_post_id, 'user-name', true);
									$password = get_post_meta($current_post_id, 'password', true);
									?>

						<?php if ($link_url) : ?>
						<p class="works-card__price-info"></p>
						<?php endif; ?>

						<?php if (!empty($user_name) || !empty($password)) : ?>
						<p class="works-card__price-info">
							<?php if (!empty($user_name)) : ?>
							ユーザー名: <?php echo esc_html($user_name); ?><br>
							<?php endif; ?>
							<?php if (!empty($password)) : ?>
							パスワード: <?php echo esc_html($password); ?>
							<?php endif; ?>
						</p>
						<?php endif; ?>
					</div>


					<div class="archive-works-card__subbody">
						<div class="archive-works-card__subtext">
							<?php echo esc_html($trimmed_content); // 本文をエスケープして表示 ?>
						</div>
						<div class="archive-works-card__meta">
							<?php if ($link_url) : ?>
							<div class="archive-works-card__microcopy">
								詳しくはコチラ
							</div>
							<div class="archive-works-card__button">
								<a href="<?php echo esc_url($link_url); ?>" class="button" rel="noopener noreferrer">View more</a>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</li>
			<?php endwhile; ?>
		</ul>
		<?php endif; ?>



		<!-- ページネーション -->
		<div class="archive-works__nav page-nav">
			<ul class="page-nav__pager">
				<?php wp_pagenavi(); ?>
			</ul>
		</div>

	</div>
</div>


<?php get_footer(); ?>
