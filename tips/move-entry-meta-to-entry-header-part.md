Snow Monkey は標準では、投稿につけられたタグは、記事詳細の下部に表示される仕組みになっています。

投稿のタイトル付近には、投稿日やカテゴリーなどが表示されているため、そちらに併せてタグも設置したいという要望もあるかと思います。

そういった際のカスタマイズ方法をご紹介します。

## カスタマイズ方法
流れとしては以下のようになります。

1. `snow_monkey_entry_meta_items` で投稿ヘッダー部分にメタ情報を追加
2. 投稿下部に標準で出力されているタグ部分の処理（そのまま or 非表示処理）

### `snow_monkey_entry_meta_items` フックを使う
[こちらの記事](https://happy-snow-monkey.olein-design.com/snow_monkey_entry_meta_items) でも紹介している `snow_monkey_entry_meta_items` というフックを利用します。

こちらを利用して投稿メタ情報部分にタグを追加します。

```php
<?php
add_action(
	'snow_monkey_entry_meta_items',
	function() {
		if ( ! get_the_terms( get_the_ID(), 'post_tag' ) ) {
			return;
		}
		?>
		<li class="c-meta__item c-meta__item--tags">
		    <i class="fas fa-tags"></i>
			<?php \Framework\Helper::get_template_part( 'template-parts/content/entry-tags' ); ?>
		</li>
		<?php
	},
	41
);
```

この処理によって、投稿ヘッダー部分のカテゴリーの次にタグが表示されます。

しかし、見た目が投稿下部に標準表示されているタグと同じですので、若干違和感を感じますね。カテゴリーとデザイン的にバランスを取るために、CSSで調整してください。

## 公式フォーラムでこの事例を確認する
このチップスは公式フォーラムでトピックスとして上げられたものをもとに紹介しています。ぜひこちらもご確認ください。

https://snow-monkey.2inc.org/forums/topic/%e6%8a%95%e7%a8%bf%e3%83%9a%e3%83%bc%e3%82%b8%e3%81%ae%e3%82%bf%e3%82%b0%e3%81%ae%e4%bd%8d%e7%bd%ae%e3%82%84%e8%91%97%e4%bd%9c%e6%a8%a9%e8%80%85%e6%83%85%e5%a0%b1%e3%81%ae%e3%82%ab%e3%82%b9%e3%82%bf/