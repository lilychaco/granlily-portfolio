<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/20211002iruka.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/20211002iruka.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>

	<h2 class="mv__title">FAQ</h2>
</section>
<?php get_template_part('common/breadcrumb') ?>


<div class="page-faq page-faq-layout">
	<div class="page-faq__inner inner">
		<div class="page-faq__accordion faqAccordion">
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
			<div class="faqAccordion__item">
				<div class="faqAccordion__header"><?php echo nl2br(esc_html($question)); ?></div>
				<div class="faqAccordion__content">
					<?php if (!empty($answer)) : ?>
					<div class="faqAccordion__contentInner"><?php echo nl2br(esc_html($answer)); ?></div>
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
</div>





<?php get_footer(); ?>
