<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/20240612bigeyetrevally.jpg"
				media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/20240612bigeyetrevally.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>
	<h2 class="mv__title">サービス情報・フォトギャラリー</h2>
</section>
<?php get_template_part('common/breadcrumb') ?>

<div class="information information-layout">
	<div class="information__inner inner">
		<div class="information__tab tab">
			<ul class="tab__list">
				<li class="tab__menu js-tab" data-tab="license-training" current>
					<p class="tab__text tab__text--01" id="license-training">
						ダイビング<br class="u-mobile" />
					</p>
				</li>
				<li class="tab__menu js-tab" data-tab="fun-diving">
					<p class="tab__text tab__text--02" id="fun-diving">
						バラ栽培<br class="u-mobile" />
					</p>
				</li>
				<li class="tab__menu js-tab" data-tab="trial-diving">
					<p class="tab__text tab__text--03" id="trial-diving">
						トレッキング<br />旅行
					</p>
				</li>
			</ul>

			<div class="tab__contents">
				<div class="tab__content js-content">
					<div class="tab__content-item info-card">
						<div class="info-card__container">
							<div class="info-card__body">
								<div class="info-card__title">スキューバダイビング</div>
								<div class="info-card__text">
									還暦を目前に控えて、泳げないけど、スキューバダイビングのライセンスを取りました。海の中は広く異次元の世界。まるで宇宙空間を旅している様です。地元天草の海をはじめ、沖縄、石垣島、与那国島、奄美大島、タイ、インドネシア、フィリピン、モルジブの海でも潜りました。
								</div>
							</div>
							<div class="info-card__img">
								<img src="<?php echo get_theme_file_uri(); ?>/assets/images/kakurekumanomi-ami.jpg"
									alt="イソギンチャクの中にいるかわいいカクレクマノミ" />
							</div>
						</div>
					</div>
					<div class="tab__content-item">
						<section class="gallery gallery-layout">
							<?php
								// gallery_imageフィールドのデータを取得
								$fields_diving = SCF::get('gallery_image-diving', get_the_ID());

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
										$image_url_diving = $field_diving['gallery_img-diving'] ? wp_get_attachment_url($field_diving['gallery_img-diving']) : esc_url(get_theme_file_uri('/assets/images/gallery1.jpg'));
										?>
									<div class="gallery__item js-modal-open">
										<img src="<?php echo $image_url_diving; ?>" alt="海の中の写真">
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
								<div class="info-card__title">バラ栽培</div>
								<div class="info-card__text">実家の父が育てられなくなったバラ鉢を受け継いで、バラを育てました。1輪が大きくて香りの良いバラが好きです。
								</div>
							</div>
							<div class="info-card__img">
								<img src="<?php echo get_theme_file_uri(); ?>/assets/images/20190501ambridgerose.jpg"
									alt=薔薇の花アンブリッジローズ" />
							</div>
						</div>
					</div>
					<div class="tab__content-item">
						<section class="gallery gallery-layout">
							<?php
								// gallery_imageフィールドのデータを取得
								$fields_rose = SCF::get('gallery_image-rose', get_the_ID());

								// $fieldsが空の場合は<section>を出力しない
								if (!empty($fields_rose)) : ?>
							<div class="gallery__inner inner">
								<div class="gallery__heading section-heading">
									<h3 class="section-heading__title">gallery</h3>
									<h2 class="section-heading__subtitle">フォト</h2>
								</div>
								<div class="gallery__content">
									<?php
									// gallery_imageフィールドの中身をループ
									foreach ($fields_rose as $field_rose) {
										// 画像のURLを取得、なければデフォルト画像を指定
										$image_url_rose = $field_rose['gallery_img-rose'] ? wp_get_attachment_url($field_rose['gallery_img-rose']) : esc_url(get_theme_file_uri('/assets/images/gallery1.jpg'));
										?>
									<div class="gallery__item js-modal-open">
										<img src="<?php echo $image_url_rose; ?>" alt="赤やピンク、黄色のバラ">
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
								<div class="info-card__title">トレッキング・旅行</div>
								<div class="info-card__text">
									子ども達が小さい頃から、近くの山へ登っていました。十万山、次郎丸岳、久住山、市房山、高千穂峰、豊満山、福知山などなど。
									中でも久住山は、10回以上登っています。<br>
									60過ぎてダイビングを始めて、海外遠征をするようになり、海外へ出るハードルが下がりました。2023年にはスペインへ、2024年にはインドを旅行してきました。
								</div>
							</div>
							<div class="info-card__img">
								<img src="<?php echo get_theme_file_uri(); ?>/assets/images/Taj-Mahal.jpg" alt="タージマハル" />
							</div>
						</div>
					</div>
					<div class="tab__content-item">
						<section class="gallery gallery-layout">
							<?php
								// gallery_imageフィールドのデータを取得
								$fields_trecking = SCF::get('gallery_image-trecking', get_the_ID());

								// $fieldsが空の場合は<section>を出力しない
								if (!empty($fields_trecking)) : ?>
							<div class="gallery__inner inner">
								<div class="gallery__heading section-heading">
									<h3 class="section-heading__title">gallery</h3>
									<h2 class="section-heading__subtitle">フォト</h2>
								</div>
								<div class="gallery__content">
									<?php
									// gallery_imageフィールドの中身をループ
									foreach ($fields_trecking as $field_trecking) {
										// 画像のURLを取得、なければデフォルト画像を指定
										$image_url_trecking = $field_trecking['gallery_img-trecking'] ? wp_get_attachment_url($field_trecking['gallery_img-trecking']) : esc_url(get_theme_file_uri('/assets/images/gallery1.jpg'));
										?>
									<div class="gallery__item js-modal-open">
										<img src="<?php echo $image_url_trecking; ?>" alt="スペイン王様の小道、ロンダの街、インドのタージマハル、久住山、星生山、京都嵐山">
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
