`</main>` の直前に HTML を挿入する際に利用します。

## ソースコード
```php
<?php
add_action(
	'snow_monkey_append_main',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-hsm-append-main" href="<?php echo esc_url( home_url( '/snow_monkey_append_main' ) ); ?>" role="button">ここをカスタマイズする</a>
		<?php
	}
);
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Action-hooks#snow_monkey_append_main