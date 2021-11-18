投稿の最下部エリアに、その投稿と関連性がありそうな記事の一覧を表示してくれる機能があります。

そちらを関連記事と呼びますが、こちらをカスタマイズするフィルターフックがこちらになります。

## ソースコード
```php
<?php
add_filter(
	'snow_monkey_related_posts_args',
	function( $args ) {
		// 例: 関連記事の表示最大数を8件に変更する
		$args[ 'posts_per_page' ] = 8;

		return $args;
	}
);
```

## カテゴリーのみで関連記事を表示させる
標準では、その記事が属しているカテゴリーとタグにて関連記事をランダムに任意の件数表示していますが、判断材料をカテゴリーのみにする方法はこちら。

```php
<?php
add_filter(
    'snow_monkey_related_posts_args',
    function( $args ) {
        if ( ! isset( $args['post_type'] ) || 'post' !== $args['post_type'] ) {
            return $args;
        }

        $category_ids = wp_get_object_terms( get_the_ID(), 'category', [ 'fields' => 'ids' ] );
        $tax_query[] = [
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $category_ids,
            'operator' => 'IN',
        ];

        $args['tax_query'] = $tax_query;
        return $args;
    }
);
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Filter-hooks#snow_monkey_related_posts_args