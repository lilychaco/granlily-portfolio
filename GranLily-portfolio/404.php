<?php get_header(); ?>

<!-- <div class="page-404">
	<div class="page-404__inner inner">
		<div class="page-404__content">
			<p class="pave-404__title">404</p>
			<p class="page-404__text">申し訳ありません。<br>
				お探しのページが見つかりません。</p>
			<div class="page-404__button">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="button button--02">page TOP</a>
			</div>
		</div>
	</div>
</div> -->
<style>
.container {
	max-width: 600px;
	margin: 100px auto;
}
</style>
<div class="page-404">
	<div class="page-404__inner inner">
		<div class="page-404__container">
			<h2 class="page-404__title">404</h2>

			<div class="page-404__img">
				<img src="<?php echo esc_url(get_theme_file_uri('assets/images/logo-granlily-long3.png')); ?>"
					alt="Granlily Character">
			</div>

			<p class="page-404__text">申し訳ありません。お探しのページが見つかりません。</p>
			<p class="page-404__text">The page you're looking for might have been moved, deleted, or never existed.</p>
			<a href="/" class="page-404__button button--02">トップページへ</a>
		</div>
	</div>
</div>


<?php get_footer(); ?>
