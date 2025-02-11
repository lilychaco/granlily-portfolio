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
				<a href="https://lin.ee/RNytVdZ" target=”_blank”><img
						src="<?php echo get_theme_file_uri(); ?>/assets/images/LINE_Brand_icon.png" alt="フッター" /></a>
				<a href="https://www.instagram.com/yumin52/" target=”_blank”><img
						src="<?php echo get_theme_file_uri(); ?>/assets/images/Instagram_Glyph_Gradient.png" alt="フッターロゴ" /></a>
			</div>
		</div>
		<div class="footer__nav nav-menu">
			<!-- ブロック1 -->
			<div class="nav-menu__box nav-menu__box--01 nav-menu__box--footer">
				<div class="nav-menu__item">
					<a href="<?php echo esc_url(home_url('/works')); ?>">
						<p class="starfish-icon">制作物</p>
					</a>
				</div>
				<div class="nav-menu__item nav-menu__item--01">
					<a href="<?php echo esc_url(home_url('/aboutus')); ?>">
						<p class="starfish-icon">プロフィール</p>
					</a>
				</div>
			</div>

			<!-- ブロック4 -->
			<div class="nav-menu__box nav-menu__box--06">
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
			©&nbsp;2025&nbsp;GranLily&nbsp;LLC.
		</div>
	</div>

	<?php if ( ! is_404() ) : ?>
	<div class="footer__button page-top-button js-page-top-button">
		<div class="page-top-button__circle">
			<span class="page-top-button__text">TOP</span>
		</div>

	</div>
	<?php endif; ?>
</footer>
<?php wp_footer(); ?>
</body>

</html>
