テンプレートの部分的な書き換えなどを行う際によく利用します。

実験的にここでは、投稿の詳細ページのタイトル部分にマークアップされている`<header>` タグ全体を書き換えて、CSSクラス `.p-added-css-class` を既存CSSクラスに追加するという（意味のない）ことをやってみようと思います。

対象となるテンプレートファイルの場所は、`snow-monkey/template-parts/content/entry/header/header.php` になります。

こちらをフック名に加えて、上のテンプレートを上書きする **フック名** は、`snow_monkey_template_part_render_template-parts/content/entry/header/header` となります。

では、実際にフィルターフックをかけてみましょう。

## ソースコード
```php
<?php
/**
 * @param $html テンプレートパーツの出力HTML
 * @param $name テンプレートパーツの名前
 * @param $vars テンプレートパーツのリクエスト配列
 */
add_filter(
	'snow_monkey_template_part_render_template-parts/content/entry/header/header',
	function( $html, $name, $vars ) {
		$html = str_replace(
			'<header class="c-entry__header">',
			'<header class="c-entry__header p-added-css-class">',
			$html
		);
		return $html;
	},
	10,
	3
);
```

PHP の `str_replace()` に関しては [こちら](https://www.php.net/manual/ja/function.str-replace.php) をご覧ください。

こうすることで、投稿詳細ページのタイトル `<h1>` をラップしている `<header>` に付いているクラス名を増やすことができます。

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Filter-hooks#snow_monkey_template_part_render_slug