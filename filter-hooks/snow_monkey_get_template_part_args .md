こちらのフィルターフックでは、利用しているテンプレートファイルで使われているクエリを取得して変更することができます。

代表的な例として、抜粋文字数の変更を行う工程を試してみましょう。

## クエリの中を覗いてみる
記事の一覧ページの各記事に表示される抜粋テキストを表示しているテンプレートファイルは以下になります。

```
snow-monkey/template-parts/loop/entry-summary/content/content.php
```

ですので、フィルターフックは末尾につけるような形式で利用できるので、

```
snow_monkey_get_template_part_args_template-parts/loop/entry-summary/content/content
```

になります。

## ソースコード
```php
/**
 * @param $args テンプレート取得クエリ
 * @return $args テンプレート取得クエリ
 */
add_filter(
	'snow_monkey_get_template_part_args_template-parts/loop/entry-summary/content/content',
	function( $args ) {
		echo '<hr>' . basename(__FILE__) . ' :: ' . __LINE__;
		echo( '<pre>' );
		var_dump( $args );
		echo( '<pre>' );
		echo '<hr>';
		exit;
	}
);
```

上のように内部を覗いてみると、

```
my-snow-monkey.php :: 406
/Users/******/Local Sites/happy-snow-monkey/app/public/wp-content/plugins/my-snow-monkey/my-snow-monkey.php:408:
array (size=3)
  'slug' => string 'template-parts/loop/entry-summary/content/content' (length=49)
  'name' => string 'post' (length=4)
  'vars' => 
    array (size=2)
      '_entries_layout' => string 'panel' (length=5)
      '_excerpt_length' => null
```

`_excerpt_length` に何も入っていないという状態ですので、こちらに任意の数値を入れて抜粋の長さをコントロールしてみましょう。

```php
<?php
/**
 * @param $args テンプレート取得クエリ
 * @return $args テンプレート取得クエリ
 */
add_filter(
	'snow_monkey_get_template_part_args_template-parts/loop/entry-summary/content/content',
	function( $args ) {
		$args['vars']['_excerpt_length'] = 30;
		return $args;
	}
);
```

実際に表示を確認しながら、最適と思う数値に変更してみてください。

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Filter-hooks#snow_monkey_get_template_part_args