インナーコンテンツの前にHTMLを挿入する際に利用可能です。

コンテンツエリア（メインとサイドバー）の上部、（標準の位置の場合の）パンくずリストの下に該当する位置になります。

## ソースコード
```php
<?php
add_action(
	'snow_monkey_before_contents_inner',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking" href="<?php echo esc_url( home_url( '/snow_monkey_before_contents_inner' ) ); ?>" role="button">ここをカスタマイズする</a>
		<?php
	}
);
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Action-hooks#snow_monkey_before_contents_inner