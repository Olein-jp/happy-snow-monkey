`<div class="l-contents" role="document">` の直後に HTML を挿入する際に利用します。

お知らせバーの下、パンくずリスト（標準位置の場合）の上のエリアになります。

## ソースコード
```php
<?php
add_action(
	'snow_monkey_prepend_contents',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-hsm-prepend-content" href="<?php echo esc_url( home_url( '/snow_monkey_append_main' ) ); ?>" role="button">ここをカスタマイズする</a>
		<?php
	}
);
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Action-hooks#snow_monkey_prepend_contents