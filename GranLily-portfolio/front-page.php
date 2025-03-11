<?php get_header(); ?>

<section class="fv js-fv">
	<div class="fv__slider-wrap">
		<div class="fv__slider">
			<?php
            // 設定ページのID
            $page_id = 32;

            // スライド画像の設定（キー名とキャプションを配列で管理）
            $slides = [
                ['field' => 'fv_image_1', 'text' => '新しい景色、新しい体験が、<br class="u-mobile">あなたを待っています'],
                ['field' => 'fv_image_2', 'text' => '安全で快適なプランと、<br class="u-mobile">心に残るアクティビティ'],
                ['field' => 'fv_image_3', 'text' => '大人だからこそ楽しめる、<br class="u-mobile">特別な旅を']
            ];

            // ループでスライドを作成
            foreach ($slides as $index => $slide):
                $fvImage = get_field($slide['field'], $page_id);
                $fvImagePC = $fvImage[$slide['field'] . '_pc'] ?? ''; // PC用画像
                $fvImageSP = $fvImage[$slide['field'] . '_sp'] ?? ''; // SP用画像
            ?>
			<div class="fv__slide" style="animation-delay: <?php echo ($index * 4); ?>s;">
				<figure class="fv__slide-img">
					<picture>
						<?php if ($fvImagePC): ?>
						<source srcset="<?php echo esc_url($fvImagePC); ?>" media="(min-width: 768px)" />
						<?php endif; ?>
						<img src="<?php echo esc_url($fvImageSP ?: $fvImagePC); ?>" alt="ファーストビュー画像<?php echo $index + 1; ?>" />
					</picture>
				</figure>
				<div class="fv__description">
					<p class="fv__text"><?php echo $slide['text']; ?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="fv__copy">
		<p class="fv__main-title">granlily</p>
		<p class="fv__sub-title">大人のための、心躍る冒険へ</p>
	</div>
</section>

<section class="top-plan top-plan-layout" id="plan">
	<?php
				// カスタム投稿「plan」を取得するためのWP_Query
				$args = [
		    'post_type' => 'tour_plan', // カスタム投稿タイプ「plan」を指定
  		  'posts_per_page' => -1, // 全ての投稿を取得（必要に応じて数を変更）
				];

				$tour_plan_query = new WP_Query($args);
				if ($tour_plan_query->have_posts()) :
				?>

	<div class="top-plan__inner inner">
		<div class="top-plan__heading section-heading">
			<h2 class="section-heading__title">ツアープラン</h2>
			<h3 class="section-heading__subtitle">Plan</h3>
		</div>

		<!-- 前後の矢印 -->
		<div class="swiper-button custom-swiper-button-prev">
		</div>
		<div class="swiper-button custom-swiper-button-next"></div>

		<div class="top-plan__cards-wrapper swiper js-plan-swiper">
			<ul class="top-plan__cards plan-cards swiper-wrapper">
				<?php while ($tour_plan_query->have_posts()) : $tour_plan_query->the_post();
				?>
				<li class="plan-cards__item plan-card swiper-slide">
					<a href="<?php echo esc_url(get_permalink()); ?>" class="plan-card__link">
						<figure class=" plan-card__img">
							<?php if (has_post_thumbnail()) : ?>
							<!-- サムネイル画像が設定されている場合 -->
							<img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
								alt="<?php echo esc_attr(get_the_title()); ?>" />
							<?php else : ?>
							<!-- サムネイルがない場合はデフォルト画像を表示 -->
							<img src="<?php echo esc_url(get_theme_file_uri('assets/images/wilson-heart.jpg')); ?>" alt="デフォルト画像" />
							<?php endif; ?>
						</figure>
						<div class="plan-card__body">
							<div class="plan-card__top">
								<?php
												$terms = get_the_terms(get_the_ID(), 'tour_plan_category');
												if (!empty($terms) && !is_wp_error($terms)) :
												?>
								<div class="plan-card__category">
									<?php foreach ($terms as $term) : ?>
									<span><?php echo esc_html($term->name); ?></span>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
								<div class="plan-card__title"><?php the_title(); ?></div>
							</div>
							<div class="plan-card__text">
								<?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?>
							</div>
						</div>
					</a>
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
		<div class="top-plan__button">
			<a href="<?php echo esc_url(home_url('/tour_plan')); ?>" class="button--03">View&nbsp;more</a>
		</div>
	</div>

	<?php endif  ?>
	<?php wp_reset_postdata(); // クエリのリセット  ?>
</section>

<section class="top-service top-service-layout" id="top-service">
	<div class="top-service__inner inner">
		<h2 class="top-service__heading section-heading">
			<span class="section-heading__title">サービス</span>
			<span class="section-heading__subtitle">service</span>
		</h2>
		<div class="top-service__main service">
			<div class="service__container">
				<div class="service__items">
					<div class="service__item">
						<figure class="service__image colorbox">
							<img src="<?php echo get_theme_file_uri(); ?>/assets/images/Taj-Mahal.jpg" alt="インドタージマハル" />
						</figure>
						<div class="service__body">
							<div class="service__title">シニア向け海外旅行</div>
							<div class="service__text">
								granlilyでは、シニア世代の皆様に安心して楽しめる海外旅行をご案内。移動の負担を減らし、快適な宿泊や現地の魅力を満喫できるプランをご用意。歴史探訪やリゾート滞在、美食の旅など、お客様のご希望に合わせた旅行を実現します。お一人でも、ご家族やご友人との思い出づくりにも最適です。
							</div>
							<div class="service__button">
								<a href="<?php echo esc_url(home_url('/information/?tab=overseas')); ?>" class="button--03"> 写真を見る </a>
							</div>
						</div>
					</div>
					<div class="service__item">
						<figure class="service__image colorbox">
							<img src="<?php echo get_theme_file_uri(); ?>/assets/images/20211120shimodayuhi-pc.jpg"
								alt="下田海岸から見える夕陽" />
						</figure>
						<div class="service__body">
							<div class="service__title">シニア向け国内旅行</div>
							<div class="service__text">
								日本の魅力をゆったり楽しむ国内旅行を、granlilyがサポート。移動の負担を抑えつつ、四季折々の景色や文化を満喫。温泉で癒される旅、歴史ある町歩き、美食を楽しむツアーなど多彩なプランをご用意。特別な記念旅行にも対応し、快適な旅をお届けします。
							</div>
							<div class="service__button">
								<a href="<?php echo esc_url(home_url('/information/?tab=domestic')); ?>" class="button--03"> 写真を見る
								</a>
							</div>
						</div>
					</div>
					<div class="service__item">
						<figure class="service__image colorbox">
							<img src="<?php echo get_theme_file_uri(); ?>/assets/images/kumanomi-mure.jpg" alt="クマノミの群れ" />
						</figure>
						<div class="service__body">
							<div class="service__title">シニア向けダイビング旅行</div>
							<div class="service__text">
								granlilyでは、海の魅力を安心して楽しめるダイビング旅行をご案内。経験豊富なインストラクターがサポートし、初心者やブランクのある方も安心。透明度の高い海で、美しい珊瑚や熱帯魚と出会う感動のダイブを満喫。体力に合わせた無理のないプランで、水中世界を楽しみましょう。
							</div>
							<div class="service__button">
								<a href="<?php echo esc_url(home_url('/information/?tab=diving')); ?>" class="button--03"> 写真を見る</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- お知らせ News -->
<section class="top-news top-news-layout">
	<div class="top-news__inner inner">
		<h2 class="top-news__heading section-heading">
			<span class="section-heading__title">お知らせ</span>
			<span class="section-heading__subtitle">News</span>
		</h2>
		<div class="top-news__container">
			<?php
			// カスタムクエリの設定
			$args = array(
    'post_type'      => 'post', // 投稿タイプを指定
    'posts_per_page' => 3, // 表示する投稿数を指定
    'post_status'    => 'publish', // 公開済みの投稿のみ取得
			);

			$query = new WP_Query($args);
				if ($query->have_posts()) :
		?>
			<ul class="top-news__list">
				<?php
				while ($query->have_posts()) : $query->the_post();
    		$terms = get_the_terms(get_the_ID(), 'category'); // ループ内で取得
				?>

				<li class="top-news__item">
					<a href="<?php the_permalink(); ?>" class="top-news__link">
						<div class="top-news__body news-item">
							<div class="news-item__meta">
								<time class="news-item__date"
									datetime="<?php echo esc_attr(get_the_time('c')); ?>"><?php echo esc_html(get_the_date('Y.m/d')); ?></time>

								<?php if (!empty($terms) && !is_wp_error($terms)) : ?>
								<span class="news-item__category">
									<?php foreach ($terms as $term) : ?>
									<?php echo esc_html($term->name); ?>
									<?php endforeach; ?>
								</span>
								<?php endif; ?>
							</div>
							<div class="news-item__content">
								<h3 class="news-item__title"><?php the_title(); ?>
								</h3>
							</div>
						</div>
					</a>
				</li>
				<?php endwhile;?>
			</ul>
			<?php endif; ?>
			<?php wp_reset_postdata(); // クエリのリセット  ?>
			<div class="top-news__more">
				<a href="<?php echo esc_url(home_url('/news')); ?>" class="top-news__more-link button--03">すべて見る</a>
			</div>
		</div>
	</div>
</section>



<section class="top-aboutus top-aboutus-layout" id="aboutus">
	<h2 class="top-aboutus__heading section-heading">
		<span class="section-heading__title">わたしたちについて</span>
		<span class="section-heading__subtitle">About us</span>
	</h2>
	<div class="top-aboutus__container inner">
		<div class="top-aboutus__sp-image u-mobile">
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/Japanese-female-concierge.webp" alt="女性スタッフ" />
		</div>
		<div class="top-aboutus__pc-image u-desktop">
			<div class="top-aboutus__pc-image-item top-aboutus__pc-image-item--primary">
				<div class="with-filter">
					<img src="<?php echo get_theme_file_uri(); ?>/assets/images/hondo-view-pc.jpg" alt="本渡全景" />
				</div>
			</div>
			<div class="top-aboutus__pc-image-item top-aboutus__pc-image-item--secondary">
				<img class="fade-in-right"
					src=" <?php echo get_theme_file_uri(); ?>/assets/images/Japanese-female-concierge.webp" alt="女性スタッフ" />
			</div>
		</div>
		<div class="top-aboutus__main-wrapper">
			<div class="top-aboutus__main">
				<div class="top-aboutus__title">
					granlily
				</div>
				<div class="top-aboutus__body">
					<div class="top-aboutus__text">
						わたしたち granlilyは、シニア世代のお客様に、最高の思い出をお届けするツーリズムです。<br>
						granlilyでは、決められたツアーパックではなく、お客様のご要望をお聞きしながら一緒に旅行プランを練っていきます。
					</div>
				</div>
			</div>
			<div class="top-aboutus__button">
				<a href="<?php echo esc_url(home_url('/aboutus')); ?>" class="button--03"> もっと見る</a>
			</div>
		</div>

	</div>
</section>

<section class="top-contact top-contact-layout">
	<div class="inner">
		<div class="top-contact__container">
			<h2 class="top-contact__heading section-heading">
				<span class="section-heading__title">お問い合わせ</span>
				<span class="section-heading__subtitle">Contact</span>
			</h2>

			<div class="top-contact__body">
				<div class="top-contact__text">
					今すぐ旅のご予定がなくても、お気軽にお問い合わせ・ご相談ください。<br>
					granlilyが、人生を豊かにする旅のご案内をいたします。</div>
			</div>
			<div class="top-contact__button">
				<a href="<?php echo esc_url(home_url('/contact')); ?>" class="button--03">お問い合わせ</a>
			</div>
		</div>
	</div>
</section>





<?php get_footer(); ?>
