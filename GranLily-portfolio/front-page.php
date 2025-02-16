<?php get_header(); ?>

<section class="fv">
	<div class="fv__slider-wrap">
		<div class="fv__slider swiper js-fv-swiper">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<?php
					// 設定ページのIDを指定
					$page_id = 32;
					// グループフィールドを取得
					$fvImage01 = get_field('fv_image_1', $page_id);

					// 各デバイス向けの画像フィールドを取得
					$fvImage01PC = $fvImage01['fv_image_1_pc'] ?? ''; // PC用画像
					$fvImage01SP = $fvImage01['fv_image_1_sp'] ?? ''; // SP用画像
					?>
					<figure class="fv__slider-img">
						<picture>
							<!-- PC用画像を設定 -->
							<?php if ($fvImage01PC): ?>
							<source srcset="<?php echo esc_url($fvImage01PC); ?>" media="(min-width: 768px)" />
							<?php endif; ?>
							<!-- SP用画像を設定 -->
							<img src="<?php echo esc_url($fvImage01SP ?: $fvImage01PC); ?>" alt="ファーストビュー画像1" />
						</picture>
					</figure>
					<div class="fv__description">
						<p class="fv__text text-line first">新しい景色、新しい体験が、あなたを待っています</p>
					</div>
				</div>
				<div class="swiper-slide">
					<?php
					// 設定ページのIDを指定
					$page_id = 32;
					// グループフィールドを取得
					$fvImage02 = get_field('fv_image_2', $page_id);

						// 各デバイス向けの画像フィールドを取得
						$fvImage02PC = $fvImage02['fv_image_2_pc'] ?? ''; // PC用画像
						$fvImage02SP = $fvImage02['fv_image_2_sp'] ?? ''; // SP用画像
						?>
					<figure class="fv__slider-img">
						<picture>
							<!-- PC用画像を設定 -->
							<?php if ($fvImage02PC): ?>
							<source srcset="<?php echo esc_url($fvImage02PC); ?>" media="(min-width: 768px)" />
							<?php endif; ?>
							<!-- SP用画像を設定 -->
							<img src="<?php echo esc_url($fvImage02SP ?: $fvImage02PC); ?>" alt="ファーストビュー画像1" />
						</picture>
					</figure>
					<div class="fv__description">
						<p class="fv__text text-line first">安全で快適なプランと、心に残るアクティビティ</p>
					</div>
				</div>
				<div class="swiper-slide">
					<?php
						// 設定ページのIDを指定
							$page_id = 32;
							// グループフィールドを取得
							$fvImage03 = get_field('fv_image_3', $page_id);

						// 各デバイス向けの画像フィールドを取得
						$fvImage03PC = $fvImage03['fv_image_3_pc'] ?? ''; // PC用画像
						$fvImage03SP = $fvImage03['fv_image_3_sp'] ?? ''; // SP用画像
							?>
					<figure class="fv__slider-img">
						<picture>
							<!-- PC用画像を設定 -->
							<?php if ($fvImage03PC): ?>
							<source srcset="<?php echo esc_url($fvImage03PC); ?>" media="(min-width: 768px)" />
							<?php endif; ?>
							<!-- SP用画像を設定 -->
							<img src="<?php echo esc_url($fvImage03SP ?: $fvImage03PC); ?>" alt="ファーストビュー画像1" />
						</picture>
					</figure>
					<div class="fv__description">
						<p class="fv__text text-line first">大人だからこそ楽しめる、特別な旅を</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="fv__copy">
		<p class="fv__main-title">GranLily</p>
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
			<h2 class="section-heading__title">Plan</h2>
			<h3 class="section-heading__subtitle">ツアープラン</h3>
		</div>

		<!-- 前後の矢印 -->
		<div class="swiper-button custom-swiper-button-prev"></div>
		<div class="swiper-button custom-swiper-button-next"></div>

		<div class="top-plan__cards-wrapper swiper js-plan-swiper">
			<ul class="top-plan__cards plan-cards swiper-wrapper">
				<?php while ($tour_plan_query->have_posts()) : $tour_plan_query->the_post();
				?>
				<li class="plan-cards__item plan-card swiper-slide">
					<figure class="plan-card__img">
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
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
		<div class="top-plan__button">
			<a href="<?php echo esc_url(home_url('/tour_plan')); ?>" class="button">View&nbsp;more</a>
		</div>
	</div>

	<?php endif  ?>
	<?php wp_reset_postdata(); // クエリのリセット  ?>
</section>

<section class="top-service top-service-layout" id="">
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
								GranLilyでは、シニア世代の皆様に安心して楽しめる海外旅行をご案内。移動の負担を減らし、快適な宿泊や現地の魅力を満喫できるプランをご用意。歴史探訪やリゾート滞在、美食の旅など、お客様のご希望に合わせた旅行を実現します。お一人でも、ご家族やご友人との思い出づくりにも最適です。
							</div>
							<div class="service__button">
								<a href="<?php echo esc_url(home_url('/information')); ?>" class="button"> View more </a>
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
								日本の魅力をゆったり楽しむ国内旅行を、GranLilyがサポート。移動の負担を抑えつつ、四季折々の景色や文化を満喫。温泉で癒される旅、歴史ある町歩き、美食を楽しむツアーなど多彩なプランをご用意。特別な記念旅行にも対応し、快適な旅をお届けします。
							</div>
							<div class="service__button">
								<a href="<?php echo esc_url(home_url('/information')); ?>" class="button"> View more </a>
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
								GranLilyでは、海の魅力を安心して楽しめるダイビング旅行をご案内。経験豊富なインストラクターがサポートし、初心者やブランクのある方も安心。透明度の高い海で、美しい珊瑚や熱帯魚と出会う感動のダイブを満喫。体力に合わせた無理のないプランで、水中世界を楽しみましょう。
							</div>
							<div class="service__button">
								<a href="<?php echo esc_url(home_url('/information')); ?>" class="button"> View more </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<section class="top-aboutus inner top-aboutus-layout" id="aboutus">
	<h2 class="top-aboutus__heading section-heading">
		<span class="section-heading__title">わたしたちについて</span>
		<span class="section-heading__subtitle">About us</span>
	</h2>
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
				<img class="fade-in-right" src=" <?php echo get_theme_file_uri(); ?>/assets/images/lily-profile-sp.jpg"
					alt="中村弓美" />
			</div>
		</div>
		<div class="top-aboutus__main-wrapper">
			<div class="top-aboutus__main">
				<div class="top-aboutus__title">
					GranLily
				</div>
				<div class="top-aboutus__body">
					<div class="top-aboutus__text">
						わたしたち GranLilyは、シニア世代のお客様に、最高の思い出をお届けするツーリズムです。<br>
						GranLilyでは、決められたツアーパックではなく、お客様のご要望をお聞きしながら一緒に旅行プランを練っていきます。
					</div>

				</div>
			</div>
		</div>

	</div>
</section>




<?php get_footer(); ?>
