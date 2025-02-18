## ファイルの特徴
- htmlによるコーディング
- src内の情報は静的ページ（dist）に反映される

## このコーディングファイルの使い方
まず、以下に書いてある内容を必ずお読みください
この中身で分かることは以下のとおりです

- 使用環境
- 使い方および操作方法
- 注意点
## 使用環境
- Node.js バージョン14系以上
- npm バージョン8以上
- バージョン確認方法：※ターミナル上でコマンドを入力すること
  - `node -v`
  - `npm -v`
- コマンドを入力後、数字がでてくれば大丈夫です
## 使い方および操作方法
1. ターミナルを開く
2. `cd _gulp`をターミナルに入力（cdと_gulpの間には半角スペース要）
3. `npm i`をターミナルへ入力
4. ダウンロードが始まります
5. npx gulpでタスクランナーが起動します
### - npm i コマンドでダウンロードが始まる仕組み
- `package.json`ファイルから情報を参照して必要なパッケージをダウンロードします
- Gulpを動かすのに必要な情報になりますので削除は厳禁

### - Gulpの使い方
- `npx gulp` ないしは `gulp` でタスクランナー起動
  - コーディング中はずっと動かしたままにすること
- 提出時は `npx gulp build`ないしは`gulp build` コマンドでフォルダ内の整理を行うこと（資料動画参考）

## コーディング時の操作方法
- `srcフォルダ`内のみを触る
- `srcフォルダ`内に入力した情報は自動的に`distフォルダ`に反映されます
- `distフォルダ`はアップロードするファイルなので編集は厳禁

## ファイルの特徴
- スマホファーストおよびパソコンファーストどちらも設定が可能`（変数管理）`
  - src/sass/global/_breakpoints.scssにある変数を`pc` or `sp`に設定する（初期値：`sp`）
  - スマホファーストとパソコンファーストを変数一つで切り替えが可能になっています（資料動画参考）

## 注意点
- `baseフォルダ内`は変更を加えないこと
- 納品時（提出時）は`_gulpフォルダ`内の`node_modules`を削除すること
- 提出時は`gulp build`コマンドを入力し、フォルダ内の整理を行うこと
# CodeUps-for-WordPress





		<div class="faqAccordion__container">
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




					<div class="top-aboutus__button">
						<a href="<?php echo esc_url(home_url('/aboutus')); ?>" class="button button--02"> View more </a>
					</div>



  //================================
  // トップ動画の上に、GSAP アニメーション
  //================================
  // GSAP アニメーションの適用
  // GSAPのタイムラインを作成（最初のアニメーション開始時刻を0.5秒遅らせる）
  const tl = gsap.timeline({ delay: 1 });

  // 1つ目の要素（.first）のアニメーション
  tl.to(".first", {
    opacity: 1,
    y: 0,
    duration: 1.5,
    ease: "power2.out",
  });

  // 2つ目の要素（.second）のアニメーション
  tl.to(
    ".second",
    {
      opacity: 1,
      y: 0,
      duration: 1.5,
      ease: "power2.out",
    },
    "+1.5"
  ); // 直前のアニメーションが終わってから1.5秒後に開始

  // 3つ目の要素（.third）のアニメーション
  tl.to(
    ".third",
    {
      opacity: 1,
      y: 0,
      duration: 1.5,
      ease: "power2.out",
    },
    "+3"
  ); // 直前のアニメーションが終わってから1.5秒後に開始



  //================================
  // アコーディオン
  //================================
 
 var faqHeaders = document.querySelectorAll(".faqAccordion__header");
  var faqContents = document.querySelectorAll(".faqAccordion__content");

  // 初期状態：すべて閉じた状態にする
  gsap.set(faqContents, {
    height: 0,
  });
  // 一番上のFAQを開いた状態にする
  faqHeaders[0].classList.add("is-active");
  gsap.set(faqContents[0], {
    height: "auto",
  });
  faqHeaders.forEach(function (faqHeader) {
    faqHeader.addEventListener("click", function () {
      var faqContent = faqHeader.nextElementSibling;
      if (faqHeader.classList.contains("is-active")) {
        // 既に開いている場合は閉じる
        gsap.to(faqContent, {
          height: 0,
        });
        faqHeader.classList.remove("is-active");
      } else {
        // 開いていない場合は開く
        gsap.to(faqContent, {
          height: "auto",
        });
        faqHeader.classList.add("is-active");
      }
    });
  });
