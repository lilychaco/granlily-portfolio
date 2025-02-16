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






  $(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search); // URLのクエリパラメータを取得
    const tabParam = urlParams.get("tab"); // "tab"パラメータの値を取得
    const $tabs = $(".js-tab"); // 全てのタブ
		const $contents = $(".js-content"); // 全てのコンテンツ



    if (tabParam) {
      // パラメータが指定されている場合
      const targetIndex = $tabs.filter(`[data-tab="${tabParam}"]`).index();
      if (targetIndex !== -1) {
        $tabs.removeClass("current").eq(targetIndex).addClass("current"); // 該当タブを選択状態に
        $contents.hide().eq(targetIndex).fadeIn(300); // 対応コンテンツを表示
      } else {
        // 該当するタブがない場合、デフォルトタブを表示
        showDefaultTab();
      }
    } else {
      // クエリパラメータがない場合、デフォルトタブを表示
      showDefaultTab();
    }

    // タブクリック時のイベント
    $tabs.on("click", function () {
      const $clickedTab = $(this); // クリックされたタブを取得
      const index = $clickedTab.index(); // タブのインデックス番号を取得
      const tabId = $clickedTab.data("tab"); // タブに設定したデータ属性からIDを取得

      $tabs.removeClass("current"); // 全てのタブの選択状態を解除
      $clickedTab.addClass("current"); // クリックされたタブを選択状態に

      $contents.hide().eq(index).fadeIn(300); // 対応するコンテンツを表示

      // URLにクエリパラメータを設定
      const newUrl = `${window.location.origin}${window.location.pathname}?tab=${tabId}`;
      window.history.replaceState(null, null, newUrl);
    });

    // 初期タブ表示用の関数
    function showDefaultTab() {
      $tabs.first().addClass("current");
      $contents.hide().first().show();
    }
  });






    const urlParams = new URLSearchParams(window.location.search); // URLのクエリパラメータを取得
    const tabParam = urlParams.get("tab"); // "tab"パラメータの値を取得
    const $tabs = $(".js-tab"); // 全てのタブ
    const $contents = $(".js-content"); // 全てのコンテンツ

    function showTab(tabName) {
      const $targetTab = $tabs.filter(`[data-tab="${tabName}]`);
      const $targetContent = $contents.filter(`[id= "${tabName}"]`);

      if ($targetTab.legnth && $targetContent.length) {
        $tabs.removeClass("current");
        $targetTab.addClass("current");
        $contents.hide();
        $targetContent.fadeIn(300);
      } else {
        showDefaultTab();
      }
    }

    if (tabParam) {
      // パラメータが指定されている場合
      showTab(tabParam);
    } else {
      // クエリパラメータがない場合、デフォルトタブを表示
      showDefaultTab();
    }

    // タブクリック時のイベント
    $tabs.on("click", function () {
      const tabId = $(this).data("tab");
      showTab(tabId);
      // URLを更新（履歴に残す）
      const newUrl = `${window.location.origin}${window.location.pathname}?tab=${tabId}`;
      window.history.pushState(null, null, newUrl);
    });

    // 戻る・進むボタンに対応
    window.addEventListener("popstate", function () {
      const newParams = new URLSearchParams(window.location.search);
      const newTab = newParams.get("tab");
      if (newTab) {
        showTab(newTab);
      } else {
        showDefaultTab();
      }
    });

