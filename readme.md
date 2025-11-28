	<?php if (is_front_page()) : ?>
	<div class="splash">
		<div class="splash__logo">
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/logo-granlily-transparent.png" alt="ロゴ"
				class="fade-up">
		</div>
	</div>
	<?php endif; ?>

	<header class="header <?php echo is_front_page() ? 'header--top' : 'header--sub'; ?> js-header">
		<div class="header__inner">
			<!-- <?php if (is_front_page()) : ?>
			<h1 class="header__logo">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<picture>
						<!-- PC版（768px以上）のロゴ -->
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/logo-granlily-transparent.png"
				media="(min-width: 768px)" />
			<!-- SP版（デフォルト）のロゴ -->
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/logo-granlily-transparent.png" alt="ヘッダーロゴ"
				class="header__logo-img header__logo-img--before" />
			</picture>
			<!-- 切り替え用のロゴ（スクロール後に表示） -->
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/logo-granlily-long3.png" alt="スクロール後のロゴ"
				class="header__logo-img header__logo-img--after" />
			<!-- ドロワーオープン時のロゴ -->
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/logo-granlily-long3.png" alt="ドロワーメニュー用のロゴ"
				class="header__logo-img header__logo-img--drawer" />
			</a>
			</h1>

			<?php else : ?>
			<div class="header__logo">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<picture>
						<!-- PC版（768px以上）のロゴ -->
						<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/logo-granlily-long2.jpg"
							media="(min-width: 768px)" />
						<!-- SP版（デフォルト）のロゴ -->
						<img src="<?php echo get_theme_file_uri(); ?>/assets/images/logo-granlily-long2.jpg" alt="ヘッダーロゴ"
							class="header__logo-img header__logo-img--before" />
					</picture>
					<!-- ドロワーオープン時のロゴ -->
					<img src="<?php echo get_theme_file_uri(); ?>/assets/images/logo-granlily-long2.jpg" alt="ドロワーメニュー用のロゴ"
						class="header__logo-img header__logo-img--drawer" />
				</a>
			</div>
			<?php endif; ?>
