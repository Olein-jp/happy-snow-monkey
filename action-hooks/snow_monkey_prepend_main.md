`<main>` タグの後ろに HTML を挿入したい場合に利用します。

## ソースコード
```php
<?php
add_action(
	'snow_monkey_prepend_main',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking" href="<?php echo esc_url( home_url( '/snow_monkey_prepend_main' ) ); ?>" role="button">ここをカスタマイズする</a>
		<?php
	}
);
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Action-hooks#snow_monkey_prepend_main