<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<meta name="format-detection" content="telephone=no" />

	<!-- meta情報 -->
	<title>GranLily</title>
	<meta name="description" content="GranLilyのポートフォリオサイトです" />
	<meta name="keywords" content="GranLily, lilychaco" />
	<meta name="copyright" content="© 2025 GranLily.">
	<!-- ogp -->
	<meta property="og:title" content="GranLilyの世界へようこそ！" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="" />
	<meta property="og:image"
		content="https://ninikokoji.com/diving-lily/wp-content/uploads/2024/11/iriomote1200x630.jpeg" />
	<meta property="og:site_name" content="GranLily ポートフォリオサイト" />
	<meta property="og:description" content="GranLilyのポートフォリオサイトです！" />
	<meta property="og:locale" content="ja_JP" />
	<!-- アイコン -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="header <?php echo is_front_page() ? 'header--top' : 'header--sub'; ?> js-header">
		<div class="header__inner">
			<?php if (is_front_page()) : ?>
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
					<img src="<?php echo get_theme_file_uri(); ?>/assets/images/logo-granlily-long2.jpg" alt="スクロール後のロゴ"
						class="header__logo-img header__logo-img--after" />
					<!-- ドロワーオープン時のロゴ -->
					<img src="<?php echo get_theme_file_uri(); ?>/assets/images/logo-granlily-long2.jpg" alt="ドロワーメニュー用のロゴ"
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


			<nav class="header__nav header-menu">
				<ul class="header-menu__items">
					<li class="header-menu__item">
						<a href="<?php echo esc_url(home_url('/works')); ?>">
							<p class="header-menu__text-english">works</p>
							<p class="header-menu__text-japanese">制作物</p>
						</a>
					</li>
					<li class="header-menu__item">
						<a href="<?php echo esc_url(home_url('/aboutus')); ?>">
							<p class="header-menu__text-english">profile</p>
							<p class="header-menu__text-japanese">プロフィール</p>
						</a>
					</li>


					<li class="header-menu__item">
						<a href="<?php echo esc_url(home_url('/faq')); ?>">
							<p class="header-menu__text-english">FAQ</p>
							<p class="header-menu__text-japanese">よくある質問</p>
						</a>
					</li>
					<li class="header-menu__item">
						<a href="<?php echo esc_url(home_url('/contact')); ?>">
							<p class="header-menu__text-english">contact</p>
							<p class="header-menu__text-japanese">お問合せ</p>
						</a>
					</li>
					<li class="header-menu__item header-menu__item--line">
						<a href="https://lin.ee/RNytVdZ" target="_blank" rel="noopener noreferrer"><img
								src="<?php echo get_theme_file_uri(); ?>/assets/images/line.png" alt="友だち追加" height="42" border="0"></a>
					</li>
				</ul>
			</nav>
			<div id="js-hamburger" class="header__hamButton hamburger">
				<span class="hamburger__line"></span>
			</div>
		</div>
	</header>

	<div class="drawer drawer-layout" id="js-global-menu" aria-hidden="true">
		<ul class="drawer-menu drawer-menu__inner inner">
			<li class="drawer-menu__item">
				<a href="<?php echo esc_url(home_url('/works')); ?>">
					<p class="starfish-icon">制作物</p>
				</a>
			</li>
			<li class="drawer-menu__item">
				<a href="<?php echo esc_url(home_url('/aboutus')); ?>">
					<p class="starfish-icon">プロフィール</p>
				</a>
			</li>


			<li class="drawer-menu__item">
				<a href="<?php echo esc_url(home_url('/faq')); ?>">
					<p class="starfish-icon">よくある質問</p>
				</a>
			</li>
			<li class="drawer-menu__item">
				<a href="<?php echo esc_url(home_url('/contact')); ?>">
					<p class="starfish-icon">お問い合わせ</p>
				</a>
			</li>
		</ul>
	</div>
