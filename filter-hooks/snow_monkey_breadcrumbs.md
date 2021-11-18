パンくずリストのカスタマイズが可能なフックがこちらになります。

## ソースコード
こちらは公式リファレンスに公開されているソースコードです。パンくずの最後の項目をカスタマイズする例が掲載されています。

```php
<?php
/**
 * @param array $items パンくずの配列
 * @return array パンくずの配列
 */
add_filter(
	'snow_monkey_breadcrumbs',
	function( $items ) {
		// パンくず最後の項目を変更する場合の例
		$items[ count( $items ) - 1 ] = [
			'link' => リンクURLを入れる,
			'title' => パンくずに表示するタイトル文字列を入れる,
		];
		return $items;
	}
);
```

## `$items` 配列に何が入っているか見てみよう
実際に、この投稿をローカル開発環境内で `$items` の配列の中身を見てみました。

```
array (size=3)
  0 => 
    array (size=2)
      'title' => string 'ホーム' (length=9)
      'link' => string 'http://happy-snow-monkey.olein-design.com/' (length=35)
  1 => 
    array (size=2)
      'title' => string 'フィルターフック' (length=24)
      'link' => string 'http://happy-snow-monkey.olein-design.com/category/filter-hook/' (length=56)
  2 => 
    array (size=2)
      'title' => string 'snow_monkey_breadcrumbs' (length=23)
      'link' => string 'http://happy-snow-monkey.olein-design.com/snow_monkey_breadcrumbs/' (length=59)
```

このような中身になっています。リンクのドメインがローカル開発環境のものになっていますが、構造と内容はわかっていただけるかと思います。

例えば、2のtitleを取り出したい場合には、 `$items[2]['title']` とします。

## 最初のパンくずアイテムのテキストを変える
最初のパンくずのアイテムのテキストを変更するソースコードは以下のようになります。

```php
<?php
add_filter(
	'snow_monkey_breadcrumbs',
	function( $items ) {
		if ( isset( $items[0] ) ) {
			$items[0] = [
				'title' => 'HAPPY SNOW MONKEY',
				'link'  => $items[0]['link'],
			];
		}
		return $items;
	}
);
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Filter-hooks#snow_monkey_breadcrumbs