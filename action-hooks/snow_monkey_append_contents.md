`<div class="l-contents" role="document">` の閉じタグ部分にHTMLを挿入する際に利用します。

[snow_monkey_prepend_footer](https://happy-snow-monkey.olein-design.com/snow_monkey_prepend_footer/) の上部分になります。

## ソースコード
```php
<?php
add_action(
	'snow_monkey_append_contents',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-hsm-append-content" href="<?php echo esc_url( home_url( '/snow_monkey_append_main' ) ); ?>" role="button">ここをカスタマイズする</a>
		<?php
	}
);
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Action-hooks#snow_monkey_append_contents