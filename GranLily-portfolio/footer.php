<footer class="footer footer-layout">
	<div class="footer__inner inner">
		<div class="footer__top">
			<div class="footer__logo">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<picture>
						<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/logo-granlily-transparent.png"
							media="(min-width: 768px)" />
						<img src="<?php echo get_theme_file_uri(); ?>/assets/images/logo-granlily-transparent.png" alt="ロゴ" />
					</picture>
				</a>
			</div>
			<div class="footer__sns">
				<a href="#" target=”_blank”><img src="<?php echo get_theme_file_uri(); ?>/assets/images/LINE_Brand_icon.png"
						alt="フッター" /></a>
				<a href="#" target=”_blank”><img
						src="<?php echo get_theme_file_uri(); ?>/assets/images/Instagram_Glyph_Gradient.png" alt="フッターロゴ" /></a>
			</div>
		</div>
		<div class="footer__nav nav-menu">

			<div class="nav-menu__box">
				<div class="nav-menu__item">
					<a href="<?php echo esc_url(home_url('/tour_plan')); ?>">
						<p class="starfish-icon">ツアープラン</p>
					</a>
				</div>
				<div class="nav-menu__item">
					<a href="<?php echo esc_url(home_url('/information')); ?>">
						<p class="starfish-icon">サービス情報&amp;ギャラリー</p>
					</a>
				</div>
				<div class="nav-menu__item">
					<a href="<?php echo esc_url(home_url('/faq')); ?>">
						<p class="starfish-icon">よくある質問</p>
					</a>
				</div>
				<div class="nav-menu__item">
					<a href="<?php echo esc_url(home_url('/contact')); ?>">
						<p class="starfish-icon">お問い合わせ</p>
					</a>
				</div>
			</div>
		</div>
		<div class="footer__copyright">
			&copy;&nbsp;2025&nbsp;granlily&nbsp;LLC.
		</div>
	</div>

	<?php if ( ! is_404() ) : ?>
	<div class="footer__button page-top-button js-page-top-button">
		<div class="page-top-button__circle">
			<span class="page-top-button__text">TOPへ</span>
		</div>

	</div>
	<?php endif; ?>
</footer>
<?php wp_footer(); ?>
</body>

</html>
