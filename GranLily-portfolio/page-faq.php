<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<img src="<?php echo get_theme_file_uri(); ?>/assets/images/20211002iruka.jpg" alt="" />
	</figure>

	<h2 class="mv__title">よくある質問</h2>
</section>
<?php get_template_part('common/breadcrumb') ?>


<div class="page-faq page-faq-layout">
	<div class="page-faq__inner inner">

		<div class="page-faq__tab tab">
			<ul class="tab__list">
				<li class="tab__menu js-tab" data-tab="overseas"
					data-mv-img="<?php echo get_theme_file_uri(); ?>/assets/images/granada2.jpg" data-mv-title="よくある質問<br>（海外旅行）"
					current>
					<p class="tab__text tab__text--01" id="overseas">
						海外旅行
					</p>
				</li>
				<li class="tab__menu js-tab" data-tab="domestic"
					data-mv-img="<?php echo get_theme_file_uri(); ?>/assets/images/mv-ryoanji-pc.jpg"
					data-mv-title="よくある質問<br>（国内旅行）">
					<p class="tab__text tab__text--02" id="domestic">
						国内旅行
					</p>
				</li>
				<li class="tab__menu js-tab" data-tab="diving"
					data-mv-img="<?php echo get_theme_file_uri(); ?>/assets/images/20240612bigeyetrevally.jpg"
					data-mv-title="よくある質問<br>（ダイビング）">
					<p class="tab__text tab__text--03" id="diving">
						ダイビング
					</p>
				</li>
			</ul>

			<div class="tab__contents tab__contents--faq">
				<div class="tab__content js-content">
					<div class="tab__content-accordion accordion">

						<?php
								// Smart Custom Fields (SCF) を使って、'faq' グループを取得します。
								$faq = SCF::get('faq');

								// 各アイテムを表示する関数を定義します。
								function display_accordion_item($question, $answer) {
									// 質問と回答のどちらかが欠けていたら何も出力しない
								if (empty($question) || empty($answer)) {
										return; // 処理をここで終了
								}
								?>
						<div class="accordion__item accordion-card">
							<div class="accordion-card__top js-accordion-top is-open">
								<h3 class="accordion-card__title">
									<?php echo nl2br(esc_html($question)); ?></h3>
								<div class="accordion-card__icon">
									<div class="accordion-card__bar1"></div>
									<div class="accordion-card__bar2"></div>
								</div>
							</div>
							<div class="accordion-card__body">
								<?php if (!empty($answer)) : ?>
								<p class="accordion-card__content"><?php echo nl2br(esc_html($answer)); ?></p>
								<?php endif; ?>
							</div>
						</div>
						<?php } ?>
						<?php
														if (!empty($faq)) {
																foreach ($faq as $item) {
														// 質問または回答が欠けているかは関数内で判定
														display_accordion_item($item['question'] ?? '', $item['answer'] ?? '');
												}
										}
									?>
					</div>
				</div>

				<div class="tab__content js-content">
					<div class="tab__content-accordion accordion">

						<?php
									// Smart Custom Fields (SCF) を使って、'faq' グループを取得します。
									$faq_domestic = SCF::get('faq_domestic');

									// 各アイテムを表示する関数を定義します。
									function display_accordion_item_domestic($domestic_question, $domestic_answer) {
										// 質問と回答のどちらかが欠けていたら何も出力しない
									if (empty($domestic_question) || empty($domestic_answer)) {
											return; // 処理をここで終了
									}
								?>
						<div class="accordion__item accordion-card">
							<div class="accordion-card__top js-accordion-top is-open">
								<h3 class="accordion-card__title">
									<?php echo nl2br(esc_html($domestic_question)); ?></h3>
								<div class="accordion-card__icon">
									<div class="accordion-card__bar1"></div>
									<div class="accordion-card__bar2"></div>
								</div>
							</div>
							<div class="accordion-card__body">
								<?php if (!empty($domestic_answer)) : ?>
								<p class="accordion-card__content"><?php echo nl2br(esc_html($domestic_answer)); ?></p>
								<?php endif; ?>
							</div>
						</div>
						<?php } ?>
						<?php
														if (!empty($faq_domestic)) {
																foreach ($faq_domestic as $item) {
														// 質問または回答が欠けているかは関数内で判定
														display_accordion_item($item['domestic_question'] ?? '', $item['domestic_answer'] ?? '');
												}
										}
									?>
					</div>
				</div>

				<div class="tab__content js-content">
					<div class="tab__content-accordion accordion">
						<?php
									// Smart Custom Fields (SCF) を使って、'faq' グループを取得します。
									$faq_diving = SCF::get('faq_diving');

									// 各アイテムを表示する関数を定義します。
									function display_accordion_item_diving($diving_question, $diving_answer) {
										// 質問と回答のどちらかが欠けていたら何も出力しない
									if (empty($diving_question) || empty($diving_answer)) {
											return; // 処理をここで終了
									}
								?>
						<div class="accordion__item accordion-card">
							<div class="accordion-card__top js-accordion-top is-open">
								<h3 class="accordion-card__title">
									<?php echo nl2br(esc_html($diving_question)); ?></h3>
								<div class="accordion-card__icon">
									<div class="accordion-card__bar1"></div>
									<div class="accordion-card__bar2"></div>
								</div>
							</div>
							<div class="accordion-card__body">
								<?php if (!empty($diving_answer)) : ?>
								<p class="accordion-card__content"><?php echo nl2br(esc_html($diving_answer)); ?></p>
								<?php endif; ?>
							</div>
						</div>
						<?php } ?>
						<?php
														if (!empty($faq_diving)) {
																foreach ($faq_diving as $item) {
														// 質問または回答が欠けているかは関数内で判定
														display_accordion_item($item['diving_question'] ?? '', $item['diving_answer'] ?? '');
												}
										}
									?>
					</div>
				</div>












			</div>

		</div>

	</div>
</div>

<?php get_footer(); ?>
