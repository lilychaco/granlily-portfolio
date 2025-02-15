<?php get_header(); ?>

<section class="top-service top-service-layout" id="">
	<div class="top-service__inner inner">
		<h2 class="top-service__heading section-heading">
			<span class="section-heading__title">サービス</span>
			<span class="section-heading__subtitle">service</span>
		</h2>
		<div class="top-service__main service">
			<div class="service__container">
				<div class="service__items">
					<div class="service__item">
						<figure class="service__image colorbox">
							<img src="<?php echo get_theme_file_uri(); ?>/assets/images/Taj-Mahal.jpg" alt="インドタージマハル" />
						</figure>
						<div class="service__body">
							<div class="service__title">シニア向け海外旅行</div>
							<div class="service__text">
								GranLilyでは、シニア世代の皆様に安心して楽しめる海外旅行をご案内。移動の負担を減らし、快適な宿泊や現地の魅力を満喫できるプランをご用意。歴史探訪やリゾート滞在、美食の旅など、お客様のご希望に合わせた旅行を実現します。お一人でも、ご家族やご友人との思い出づくりにも最適です。
							</div>
							<div class="service__button">
								<a href="<?php echo esc_url(home_url('/information')); ?>" class="button"> View more </a>
							</div>
						</div>
					</div>
					<div class="service__item">
						<figure class="service__image colorbox">
							<img src="<?php echo get_theme_file_uri(); ?>/assets/images/20211120shimodayuhi-pc.jpg"
								alt="下田海岸から見える夕陽" />
						</figure>
						<div class="service__body">
							<div class="service__title">シニア向け国内旅行</div>
							<div class="service__text">
								日本の魅力をゆったり楽しむ国内旅行を、GranLilyがサポート。移動の負担を抑えつつ、四季折々の景色や文化を満喫。温泉で癒される旅、歴史ある町歩き、美食を楽しむツアーなど多彩なプランをご用意。特別な記念旅行にも対応し、快適な旅をお届けします。
							</div>
							<div class="service__button">
								<a href="<?php echo esc_url(home_url('/information')); ?>" class="button"> View more </a>
							</div>
						</div>
					</div>
					<div class="service__item">
						<figure class="service__image colorbox">
							<img src="<?php echo get_theme_file_uri(); ?>/assets/images/kumanomi-mure.jpg" alt="クマノミの群れ" />
						</figure>
						<div class="service__body">
							<div class="service__title">シニア向けダイビング旅行</div>
							<div class="service__text">
								GranLilyでは、海の魅力を安心して楽しめるダイビング旅行をご案内。経験豊富なインストラクターがサポートし、初心者やブランクのある方も安心。透明度の高い海で、美しい珊瑚や熱帯魚と出会う感動のダイブを満喫。体力に合わせた無理のないプランで、水中世界を楽しみましょう。
							</div>
							<div class="service__button">
								<a href="<?php echo esc_url(home_url('/information')); ?>" class="button"> View more </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<?php get_footer(); ?>
