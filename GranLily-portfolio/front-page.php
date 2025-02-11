<?php get_header(); ?>

<section class="fv fv-layout js-fv">
	<div class="fv__video-container">
		<video autoplay muted loop playsinline preload="auto">
			<source src="<?php echo get_template_directory_uri(); ?>/assets/images/manta-mordiv_h264.mp4" type="video/mp4">
			お使いのブラウザは動画に対応していません。
		</video>
	</div>
	<div class="fv__copy">
		<h2 class="fv__main-title">GranLily</h2>
		<p class="fv__sub-title">into&nbsp;the&nbsp;WEB&nbsp;World</p>

		<!-- 追加する説明テキスト -->
		<div class="fv__description">
			<p class="text-line first">Webコーダー中村弓美のポートフォリオです</p>
			<p class="text-line second">丁寧なコーディングで、<br class="u-mobile">デザインを忠実に再現します</p>
			<p class="text-line third">安心してお仕事をおまかせください&nbsp;&nbsp;<br class="u-mobile">あなたのお役にたちます</p>
		</div>
	</div>
</section>


<section class="top-works top-works-layout" id="works">
	<?php
				// カスタム投稿「works」を取得するためのWP_Query
				$args = [
		    'post_type' => 'works', // カスタム投稿タイプ「works」を指定
  		  'posts_per_page' => -1, // 全ての投稿を取得（必要に応じて数を変更）
				];

				$works_query = new WP_Query($args);
				if ($works_query->have_posts()) :
				?>

	<div class="top-works__inner inner">
		<div class="top-works__heading section-heading">
			<h3 class="section-heading__title">Works</h3>
			<h2 class="section-heading__subtitle">制作物</h2>
		</div>

		<!-- 前後の矢印 -->
		<div class="swiper-button custom-swiper-button-prev"></div>
		<div class="swiper-button custom-swiper-button-next"></div>

		<div class="top-works__cards-wrapper swiper js-works-swiper">
			<ul class="top-works__cards works-cards swiper-wrapper">
				<?php while ($works_query->have_posts()) : $works_query->the_post(); ?>
				<?php
        // 必要なカスタムフィールドの値をまとめて取得
        $link_url = get_post_meta(get_the_ID(), 'link-url', true);
        $user_name = get_post_meta(get_the_ID(), 'user-name', true);
        $password = get_post_meta(get_the_ID(), 'password', true);
        $thumbnail_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_theme_file_uri('assets/images/works1.jpg');
        $terms = get_the_terms(get_the_ID(), 'works-category');
        ?>
				<li class="works-cards__item works-card swiper-slide p-swiper__slide">
					<?php if ($link_url) : ?>
					<a href="<?php echo esc_url($link_url); ?>" class="works-card__link" target="_blank"
						rel="noopener noreferrer">
						<?php endif; ?>
						<figure class="works-card__img p-swiper__img">
							<img src="<?php echo esc_url($thumbnail_url); ?>"
								alt="<?php echo has_post_thumbnail() ? esc_attr(get_the_title()) : 'デフォルト画像'; ?>" />
						</figure>
						<div class="works-card__body p-swiper__body">
							<div class="works-card__top">
								<?php if (!empty($terms) && !is_wp_error($terms)) : ?>
								<div class="works-card__category">
									<?php foreach ($terms as $term) : ?>
									<span><?php echo esc_html($term->name); ?></span>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
								<div class="works-card__title"><?php the_title(); ?></div>
							</div>
							<div class="works-card__text">
								<?php if ($link_url) : ?>
								<p class="works-card__price-info">クリックしたらサイトへ飛びます</p>
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
						</div>
						<?php if ($link_url) : ?>
					</a>
					<?php endif; ?>
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
		<div class="top-works__button">
			<a href="<?php echo esc_url(home_url('/works')); ?>" class="button">View&nbsp;more</a>
		</div>
	</div>

	<?php endif  ?>
	<?php wp_reset_postdata(); // クエリのリセット  ?>
</section>

<section class="top-aboutus inner top-aboutus-layout" id="aboutus">
	<div class="top-aboutus__heading section-heading">
		<h3 class="section-heading__title">Profile</h3>
		<h2 class="section-heading__subtitle">プロフィール</h2>
	</div>
	<div class="top-aboutus__container">
		<div class="top-aboutus__sp-image u-mobile">
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/lily-profile-sp.jpg" alt="中村弓美" />
		</div>
		<div class="top-aboutus__pc-image u-desktop">
			<div class="top-aboutus__pc-image-item top-aboutus__pc-image-item--primary">
				<div class="with-filter">
					<img src="<?php echo get_theme_file_uri(); ?>/assets/images/hondo-view-pc.jpg" alt="本渡全景" />
				</div>
			</div>
			<div class="top-aboutus__pc-image-item top-aboutus__pc-image-item--secondary">
				<img src="<?php echo get_theme_file_uri(); ?>/assets/images/lily-profile-long.jpg" alt="中村弓美" />
			</div>
		</div>
		<div class="top-aboutus__main-wrapper">
			<div class="top-aboutus__main">
				<div class="top-aboutus__title">
					<span>g</span>ran&nbsp;<span>l</span>ily
				</div>
				<div class="top-aboutus__body">
					<div class="top-aboutus__text">
						はじめまして。GranLily 代表の中村弓美と申します。開業18年の小児科医ですが、コーダーとしてWEB制作のお仕事をしています。
						コロナ禍で自院の来客が激減した時、危機感を持ち、プログラミングの学習を始めました。
					</div>
					<div class="top-aboutus__button">
						<a href="<?php echo esc_url(home_url('/aboutus')); ?>" class="button button--02"> View more </a>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>




<?php get_footer(); ?>
