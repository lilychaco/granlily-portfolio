<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<img src="<?php echo get_theme_file_uri(); ?>/assets/images/white-village.jpg" alt="" />
	</figure>
	<h2 class="mv__title mv__title--black">私たちについて</h2>
</section>
<?php get_template_part('common/breadcrumb') ?>

<section class="aboutus-philosophy aboutus-philosophy-layout">
	<div class="inner">
		<div class="aboutus-philosophy__philosophy">
			<div class="aboutus-philosophy__concept">
				<p class="aboutus-philosophy__subtitle">granlilyの理念</p>
				<h2 class="aboutus-philosophy__title">旅が人生を豊かにする</h2>
			</div>

			<ul class="aboutus-philosophy__list">
				<li class="aboutus-philosophy__item">
					<p class="aboutus-philosophy__item-title">「心地よく、安心して楽しめる特別な旅を」</p>
					<p class="aboutus-philosophy__item-description">
						granlilyは、シニア世代の皆様に安心・快適で心から楽しめる旅を提供します。
						ただの観光ではなく、新しい発見や感動を通じて、人生をより豊かにする旅をお届けします。
						移動の負担を減らし、ゆったりとした時間の中で、その土地ならではの文化や自然、美食を存分に楽しんでいただくことを大切にしています。
					</p>
				</li>
				<li class="aboutus-philosophy__item">
					<p class="aboutus-philosophy__item-title">「心地よさと安全を両立した特別な旅」</p>
					<p class="aboutus-philosophy__item-description">
						年齢を重ねるごとに、旅に求めるものも変わります。
						granlilyでは、シニア世代が抱える不安を解消し、安心して楽しめる旅を追求。
						快適な移動手段、厳選した宿泊施設、体力に配慮したプランニングで、どなたでも無理なく楽しめる旅行を実現します。
					</p>
				</li>
				<li class="aboutus-philosophy__item">
					<p class="aboutus-philosophy__item-title">「新しい発見が、人生を豊かにする」</p>
					<p class="aboutus-philosophy__item-description">
						旅先での新たな出会いや経験は、人生に彩りを与えてくれます。
						歴史探訪、美食の旅、温泉リゾート、世界遺産巡り、アクティブなダイビング旅行まで、多彩なプランをご用意。
						旅を通じて新しい価値観や生きがいを見つけ、心を躍らせる体験を提供します。
					</p>
				</li>
			</ul>
		</div>
		<div class="aboutus-philosophy__mission">
			<p class="aboutus-philosophy__mission-title">ミッション</p>
			<p class="aboutus-philosophy__mission-description">
				私たちのミッションは、旅を通じて人生をより豊かにすること。
				シニア世代の皆様が年齢を気にせず、「今、この瞬間を楽しむ」ことができる旅を提供します。
				金銭的な制約や健康面の不安を取り除き、誰もが自分らしく、心から楽しめる旅へ。
			</p>
			<p class="aboutus-philosophy__mission-description">
				granlilyは、日本から世界へ、シニア世代に自由で充実した旅の機会を広げていきます。
			</p>
			</p>
		</div>
	</div>
</section>


<section class="aboutus-profile">
	<div class="inner">
		<h2 class="aboutus-profile__heading">会社概要</h2>

		<?php
		// 投稿ID 214 から「aboutus-profile」グループのデータを取得
			$aboutus_profile = get_field('company-profile', 214);?>

		<div class="aboutus-profile__overview aboutus-overview">
			<dl class="aboutus-overview__list">
				<?php  if ($aboutus_profile && !empty($aboutus_profile['company-address'])):?>
				<div class="aboutus-overview__item">
					<dt class="aboutus-overview__title">所在地</dt>
					<dd class="aboutus-overview__description">
						<?php echo esc_html($aboutus_profile['company-address']); ?></dd>
				</div>
				<?php endif; ?>
				<?php  if ($aboutus_profile && !empty($aboutus_profile['establishment-date'])):?>
				<div class="aboutus-overview__item">
					<dt class="aboutus-overview__title">設立日</dt>
					<dd class="aboutus-overview__description">
						<time datetime="2023-07-06">
							<?php echo esc_html($aboutus_profile['establishment-date']); ?>
						</time>
					</dd>
				</div>
				<?php endif; ?>
				<?php  if ($aboutus_profile && !empty($aboutus_profile['representative-director'])):?>
				<div class="aboutus-overview__item">
					<dt class="aboutus-overview__title">代表取締役</dt>
					<dd class="aboutus-overview__description">
						<?php echo esc_html($aboutus_profile['representative-director']); ?>
					</dd>
				</div>
				<?php endif; ?>
				<?php  if ($aboutus_profile && !empty($aboutus_profile['main-business'])):?>
				<div class="aboutus-overview__item">
					<dt class="aboutus-overview__title">主な事業</dt>
					<dd class="aboutus-overview__description">
						<?php echo esc_html($aboutus_profile['main-business']); ?>
					</dd>
				</div>
				<?php endif; ?>
				<?php  if ($aboutus_profile && !empty($aboutus_profile['corresponding-bank'])):?>
				<div class="aboutus-overview__item">
					<dt class="aboutus-overview__title">取引銀行</dt>
					<dd class="aboutus-overview__description"><?php echo esc_html($aboutus_profile['corresponding-bank']); ?>
					</dd>
				</div>
				<?php endif; ?>
			</dl>
		</div>
	</div>
</section>



<?php get_footer(); ?>
