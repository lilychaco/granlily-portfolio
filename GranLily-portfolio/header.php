<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<meta name="format-detection" content="telephone=no" />

	<!-- meta情報 -->
	<title>granlily</title>
	<meta name="description" content="granlilyのポートフォリオサイトです" />
	<meta name="keywords" content="granlily, lilychaco" />
	<meta name="copyright" content="© 2025 granlily.">
	<!-- ogp -->
	<meta property="og:title" content="granlily~シニア向けのツーリズム~" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="" />
	<meta property="og:image"
		content="https://ninikokoji.com/diving-lily/wp-content/uploads/2024/11/iriomote1200x630.jpeg" />
	<meta property="og:site_name" content="granlily~シニア向けのツーリズム~" />
	<meta property="og:description" content="granlilyのポートフォリオサイトです！" />
	<meta property="og:locale" content="ja_JP" />
	<!-- アイコン -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
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
			<?php
				$home_url = esc_url(home_url('/'));
				$theme_uri = get_theme_file_uri();
				$is_front_page = is_front_page();

				// ロゴ画像のパス設定
				$logos = [
						'before'  => $is_front_page ? "/assets/images/logo-granlily-transparent.png" : "/assets/images/logo-granlily-long2.jpg",
						'after'   => $is_front_page ? "/assets/images/logo-granlily-long3.png" : null,
						'drawer'  => $is_front_page ? "/assets/images/logo-granlily-long3.png" : "/assets/images/logo-granlily-long2.jpg",
						'source'  => $is_front_page ? "/assets/images/logo-granlily-transparent.png" : "/assets/images/logo-granlily-long2.jpg",
				];

				// クラス名の設定
					$logo_class = $is_front_page ? "h1" : "div";
			?>

			<<?php echo $logo_class; ?> class="header__logo">
				<a href="<?php echo $home_url; ?>">
					<picture>
						<source srcset="<?php echo $theme_uri . $logos['source']; ?>" media="(min-width: 768px)" />
						<img src="<?php echo $theme_uri . $logos['before']; ?>" alt="ヘッダーロゴ"
							class="header__logo-img header__logo-img--before" />
					</picture>
					<?php if ($logos['after']) : ?>
					<img src="<?php echo $theme_uri . $logos['after']; ?>" alt="スクロール後のロゴ"
						class="header__logo-img header__logo-img--after" />
					<?php endif; ?>
					<img src="<?php echo $theme_uri . $logos['drawer']; ?>" alt="ドロワーメニュー用のロゴ"
						class="header__logo-img header__logo-img--drawer" />
				</a>
			</<?php echo $logo_class; ?>>
			<nav class="header__nav header-menu">
				<ul class="header-menu__items">
					<li class="header-menu__item">
						<a href="<?php echo esc_url(home_url('/tour_plan')); ?>">
							<span class="header-menu__text-japanese">ツアープラン</span>
							<span class="header-menu__text-english">Plan</span>
						</a>
					</li>
					<li class="header-menu__item">
						<a href="<?php echo esc_url(home_url('/information')); ?>">
							<span class="header-menu__text-japanese">写真</span>
							<span class="header-menu__text-english">PhotoGallery</span>
						</a>
					</li>
					<li class="header-menu__item">
						<a href="<?php echo esc_url(home_url('/faq')); ?>">
							<span class="header-menu__text-japanese">よくある質問</span>
							<span class="header-menu__text-english">FAQ</span>
						</a>
					</li>
					<li class="header-menu__item">
						<a href="<?php echo esc_url(home_url('/contact')); ?>">
							<span class="header-menu__text-japanese">お問い合わせ</span>
							<span class="header-menu__text-english">Contact</span>
						</a>
					</li>
					<li class="header-menu__item header-menu__item--line">
						<a href="https://lin.ee/7WWjHRk" target="_blank" rel="noopener noreferrer"><img
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
				<a href="<?php echo esc_url(home_url('/tour_plan')); ?>">
					<p class="starfish-icon starfish-icon--drawer">ツアープラン</p>
				</a>
			</li>
			<li class="drawer-menu__item">
				<a href="<?php echo esc_url(home_url('/information')); ?>">
					<p class="starfish-icon starfish-icon--drawer">写真</p>
				</a>
			</li>
			<li class="drawer-menu__item">
				<a href="<?php echo esc_url(home_url('/news')); ?>">
					<p class="starfish-icon starfish-icon--drawer">お知らせ</p>
				</a>
			</li>
			<li class="drawer-menu__item">
				<a href="<?php echo esc_url(home_url('/aboutus')); ?>">
					<p class="starfish-icon starfish-icon--drawer">私たちについて</p>
				</a>
			</li>
			<li class="drawer-menu__item">
				<a href="<?php echo esc_url(home_url('/faq')); ?>">
					<p class="starfish-icon starfish-icon--drawer">よくある質問</p>
				</a>
			</li>
			<li class="drawer-menu__item">
				<a href="<?php echo esc_url(home_url('/contact')); ?>">
					<p class="starfish-icon starfish-icon--drawer">お問い合わせ</p>
				</a>
			</li>
		</ul>
	</div>
