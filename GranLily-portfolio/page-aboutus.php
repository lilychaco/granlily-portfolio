<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/rose-greengarden.jpg"
				media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/rose-greengarden.jpg" alt="バラ園のバラ" />
		</picture>
	</figure>
	<h2 class="mv__title">profile</h2>
</section>
<?php get_template_part('common/breadcrumb') ?>

<div class="page-profile page-profile-layout">
	<div class="page-profile__inner inner">
		<div class="page-profile__container">
			<div class="page-profile__sp-image u-mobile">
				<img src="<?php echo get_theme_file_uri(); ?>/assets/images/lily-profile.jpg" alt="春風が戦ぐ中、樹のそばに立っているGranLily" />
				<div class=" page-profile__title page-profile__title--sp u-mobile">
					Gran&nbsp;Lily
				</div>
			</div>
			<div class="page-profile__pc-image u-desktop">
				<img src="<?php echo get_theme_file_uri(); ?>/assets/images/lily-profile-tree.jpg" alt="微笑んでいるGranLily" />
				<img class="with-filter" src="<?php echo get_theme_file_uri(); ?>/assets/images/bali-morning.jpg"
					alt="バリ島朝の海辺" />
			</div>
			<div class="page-profile__main-wrapper">
				<div class="page-profile__main">
					<div class="page-profile__title u-desktop">
						<span>g</span>ran&nbsp;<span>l</span>ily
					</div>
					<div class="page-profile__body">
						<div class="page-profile__text">
							心を込めて作るあたたかなWebサイトをお届けします。
							お客様の「こうしたい」という気持ちを大切に、一つひとつ丁寧に形にしていきます。<br>
							これまでの経験を生かし、使いやすく、美しい仕上がりを目指します。
							一緒に、あなたの想いを叶えるお手伝いをさせてください。
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-profile__profile profile-history">
	<div class="profile-history__inner inner">

		<div class="profile-history__heading section-heading">
			<h3 class="section-heading__title">Profile</h3>
			<h2 class="section-heading__subtitle">経歴</h2>
		</div>
		<div class="profile-history__main">
			<figure class="profile-history__image">
				<picture>
					<source media="(min-width: 768px)"
						srcset="<?php echo get_theme_file_uri(); ?>/assets/images/20211120shimodayuhi-pc.jpg" />
					<img class="fade-in-right" src="<?php echo get_theme_file_uri(); ?>/assets/images/20211120shimodayuhi-sp.jpg"
						alt="天草下田の美しい夕日が海に沈む様子" />
				</picture>
			</figure>

			<div class="profile-history__lists profile-lists">
				<div class="profile-lists__item profile-lists__item--first profile-list">
					<div class="profile-list__title">基本情報</div>
					<ul class="profile-list__items">
						<li class="profile-list__item">
							<p class="profile-list__number">氏名　</p>
							<p class="profile-list__name">中村弓美（なかむらゆみ）</p>
						</li>
						<li class="profile-list__item">
							<p class="profile-list__number">年齢　</p>
							<p class="profile-list__name">66歳</p>
						</li>
						<li class="profile-list__item">
							<p class="profile-list__number">住所地</p>
							<p class="profile-list__name">熊本県天草市</p>
						</li>

					</ul>
				</div>

				<div class="profile-lists__item profile-lists__item--first profile-list">
					<div class="profile-list__title">職歴</div>
					<ul class="profile-list__items">

						<li class="profile-list__item">
							<p class="profile-list__number">1983年</p>
							<p class="profile-list__name">山口大学医学部卒業<br>小児科医となる</p>
						</li>
						<li class="profile-list__item">
							<p class="profile-list__number">1988年</p>
							<p class="profile-list__name">相方のふるさと天草へ転居<br>
								重症心身障害児者施設勤務</p>
						</li>
						<li class="profile-list__item">
							<p class="profile-list__number">2004年</p>
							<p class="profile-list__name">中村こども・内科クリニック勤務</p>
						</li>
						<li class="profile-list__item">
							<p class="profile-list__number">2006年</p>
							<p class="profile-list__name">十万山クリニック開院</p>
						</li>
						<li class="profile-list__item">
							<p class="profile-list__number">2020年</p>
							<p class="profile-list__name">Web制作活動開始</p>
						</li>
					</ul>
				</div>
				<div class="profile-lists__item profile-list">
					<div class="profile-list__title">家族歴</div>
					<ul class="profile-list__items">
						<li class="profile-list__item">
							<p class="profile-list__number">1958年</p>
							<p class="profile-list__name">福岡県北九州市に生まれる</p>
						</li>
						<li class="profile-list__item">
							<p class="profile-list__number">1985年</p>
							<p class="profile-list__name">結婚</p>
						</li>
						<li class="profile-list__item">
							<p class="profile-list__number">1986年</p>
							<p class="profile-list__name">長女誕生</p>
						</li>
						<li class="profile-list__item">
							<p class="profile-list__number">1987年</p>
							<p class="profile-list__name">長男誕生</p>
						</li>
						<li class="profile-list__item">
							<p class="profile-list__number">1989年</p>
							<p class="profile-list__name">次女誕生</p>
						</li>
						<li class="profile-list__item">
							<p class="profile-list__number">1990年</p>
							<p class="profile-list__name">次男誕生</p>
						</li>
						<li class="profile-list__item">
							<p class="profile-list__number">2020年</p>
							<p class="profile-list__name">長男病死</p>
						</li>
					</ul>
				</div>
				<div class="profile-lists__item profile-list">
					<div class="profile-list__title">連絡先</div>
					<ul class="profile-list__items">
						<li class="profile-list__item">
							<p class="profile-list__number">メール </p>
							<p class="profile-list__name">granlily2023@gmail.com</p>
						</li>
						<li class="profile-list__item">
							<p class="profile-list__number">LINE　</p>
							<p class="profile-list__name"><a href="https://lin.ee/Ad4QFH2" target="_blank">https://lin.ee/Ad4QFH2</a>
							</p>
						</li>

					</ul>
				</div>
			</div>

		</div>
	</div>
</div>
<div class="page-profile__local local-media">
	<div class="local-media__inner inner">
		<div class="local-media__heading section-heading">
			<h3 class="section-heading__title section-heading__title--local-media">Local Introduction</h3>
			<h2 class="section-heading__subtitle section-heading__subtitle--local-media">地元紹介</h2>
		</div>
		<div class="local-media__container">
			<!-- YouTube動画の埋め込み -->
			<div class="local-media__video">
				<iframe src="https://www.youtube.com/embed/ufkVUZZLIKc?si=VCaZoCwcbh9A1tC5" title="YouTube video player"
					frameborder="0"
					allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
					referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				<p class="local-media__video-text">動画の編集を担当しました</p>
			</div>

			<!-- 関連リンク -->
			<div class=" local-media__links">
				<h3 class="local-media__links-title">天草のおすすめ</h3>
				<ul class="local-media__links-list local-media__links-list--link">
					<li class="local-media__links-item">
						<a href="https://www.t-island.jp/" target="_blank" class="local-media__link">Amakusa~天草紹介サイト~</a>
					</li>
					<li class="local-media__links-item">
						<a href="https://www.yokadive.com/" target="_blank" class="local-media__link">天草よかよかダイビング＆シュノーケル</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>



<?php get_footer(); ?>
