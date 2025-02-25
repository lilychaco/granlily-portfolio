<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/20240612bigeyetrevally.jpg"
				media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/20240612bigeyetrevally.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>
	<h2 class="mv__title">サービス情報<br>&<br>フォトギャラリー</h2>
</section>
<?php get_template_part('common/breadcrumb') ?>
<div class="animation-airplane">
	<!-- SVGで楕円の上半分のパスを作成 -->
	<svg id="flightSvg" width="900" height="100" viewBox="0 0 900 100" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path id="flightPath" stroke="none" fill="transparent" />
	</svg>
	<!-- 飛行機アイコン -->
	<img id="airplane" src="<?php echo get_theme_file_uri(); ?>/assets/images/airplane-blue.png" alt="飛行機">
</div>

<div class="information information-layout">
	<div class="information__inner inner">
		<div class="information__tab tab">
			<ul class="tab__list">
				<li class="tab__menu js-tab" data-tab="overseas" current>
					<p class="tab__text tab__text--01" id="overseas">
						海外旅行
					</p>
				</li>
				<li class="tab__menu js-tab" data-tab="domestic">
					<p class="tab__text tab__text--02" id="domestic">
						国内旅行
					</p>
				</li>
				<li class="tab__menu js-tab" data-tab="diving">
					<p class="tab__text tab__text--03" id="diving">
						ダイビング
					</p>
				</li>
			</ul>

			<div class="tab__contents">
				<div class="tab__content js-content">
					<div class="tab__content-item info-card">
						<div class="info-card__container">
							<div class="info-card__body">
								<div class="info-card__title">海外旅行</div>
								<div class="info-card__text">
									granlilyでは、シニア世代の皆様に安心して楽しめる海外旅行をご案内。移動の負担を減らし、快適な宿泊や現地の魅力を満喫できるプランをご用意。歴史探訪やリゾート滞在、美食の旅など、お客様のご希望に合わせた旅行を実現します。お一人でも、ご家族やご友人との思い出づくりにも最適です。

								</div>
							</div>
							<div class="info-card__img">
								<img src="<?php echo get_theme_file_uri(); ?>/assets/images/20240305TajGanji.jpg" alt="" />
							</div>
						</div>
					</div>
					<div class="tab__content-item">
						<section class="gallery gallery-layout">
							<?php
								// gallery_imageフィールドのデータを取得
								$fields_overseas = SCF::get('image_overseas', get_the_ID());

								// $fieldsが空の場合は<section>を出力しない
								if (!empty($fields_overseas)) : ?>
							<div class="gallery__inner inner">
								<div class="gallery__heading section-heading">
									<h3 class="section-heading__title">gallery</h3>
									<h2 class="section-heading__subtitle">フォト</h2>
								</div>
								<div class="gallery__content">
									<?php
									// gallery_imageフィールドの中身をループ
									foreach ($fields_overseas as $field_overseas) {
										// 画像のURLを取得、なければデフォルト画像を指定
										$image_url_overseas = $field_overseas['img_overseas'] ? wp_get_attachment_url($field_overseas['img_overseas']) : esc_url(get_theme_file_uri('/assets/images/gallery1.jpg'));
										?>
									<div class="gallery__item js-modal-open">
										<img src="<?php echo $image_url_overseas; ?>" alt="">
									</div>
									<?php
									}
								?>
								</div>
							</div>
							<?php endif;  ?>
						</section>
					</div>
				</div>
				<div class="tab__content js-content">
					<div class="tab__content-item info-card">
						<div class="info-card__container">
							<div class="info-card__body">
								<div class="info-card__title">国内旅行</div>
								<div class="info-card__text">
									日本の魅力をゆったり楽しむ国内旅行を、granlilyがサポート。移動の負担を抑えつつ、四季折々の景色や文化を満喫。温泉で癒される旅、歴史ある町歩き、美食を楽しむツアーなど多彩なプランをご用意。特別な記念旅行にも対応し、快適な旅をお届けします。
								</div>
							</div>
							<div class="info-card__img">
								<img src="<?php echo get_theme_file_uri(); ?>/assets/images/zaou.jpg" alt="" />
							</div>
						</div>
					</div>
					<div class=" tab__content-item">
						<section class="gallery gallery-layout">
							<?php
								// gallery_imageフィールドのデータを取得
								$fields_domestic = SCF::get('image_domestic', get_the_ID());

								// $fieldsが空の場合は<section>を出力しない
								if (!empty($fields_domestic)) : ?>
							<div class="gallery__inner inner">
								<div class="gallery__heading section-heading">
									<h3 class="section-heading__title">gallery</h3>
									<h2 class="section-heading__subtitle">フォト</h2>
								</div>
								<div class="gallery__content">
									<?php
									// gallery_imageフィールドの中身をループ
									foreach ($fields_domestic as $field_domestic) {
										// 画像のURLを取得、なければデフォルト画像を指定
										$image_url_domestic = $field_domestic['img_domestic'] ? wp_get_attachment_url($field_domestic['img_domestic']) : esc_url(get_theme_file_uri('/assets/images/gallery1.jpg'));
										?>
									<div class="gallery__item js-modal-open">
										<img src="<?php echo $image_url_domestic; ?>" alt="">
									</div>
									<?php
									}
								?>
								</div>
							</div>
							<?php endif;  ?>
						</section>
					</div>
				</div>
				<div class="tab__content js-content">
					<div class="tab__content-item info-card">
						<div class="info-card__container">
							<div class="info-card__body">
								<div class="info-card__title">ダイビング</div>
								<div class="info-card__text">
									granlilyでは、海の魅力を安心して楽しめるダイビング旅行をご案内。経験豊富なインストラクターがサポートし、初心者やブランクのある方も安心。透明度の高い海で、美しい珊瑚や熱帯魚と出会う感動のダイブを満喫。体力に合わせた無理のないプランで、水中世界を楽しみましょう。

								</div>
							</div>
							<div class="info-card__img">
								<img src="<?php echo get_theme_file_uri(); ?>/assets/images/kakurekumanomi-ami.jpg" alt="" />
							</div>
						</div>
					</div>
					<div class="tab__content-item">
						<section class="gallery gallery-layout">
							<?php
								// gallery_imageフィールドのデータを取得
								$fields_diving = SCF::get('image_diving', get_the_ID());

								// $fieldsが空の場合は<section>を出力しない
								if (!empty($fields_diving)) : ?>
							<div class="gallery__inner inner">
								<div class="gallery__heading section-heading">
									<h3 class="section-heading__title">gallery</h3>
									<h2 class="section-heading__subtitle">フォト</h2>
								</div>
								<div class="gallery__content">
									<?php
									// gallery_imageフィールドの中身をループ
									foreach ($fields_diving as $field_diving) {
										// 画像のURLを取得、なければデフォルト画像を指定
										$image_url_diving = $field_diving['img_diving'] ? wp_get_attachment_url($field_diving['img_diving']) : esc_url(get_theme_file_uri('/assets/images/gallery1.jpg'));
										?>
									<div class="gallery__item js-modal-open">
										<img src="<?php echo $image_url_diving; ?>" alt="">
									</div>
									<?php
									}
								?>
								</div>
							</div>
							<?php endif;  ?>
						</section>


					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- 画像のモーダル時のグレー背景 -->
<div class="gallery__display" id="grayDisplay"></div>

<?php get_footer(); ?>
