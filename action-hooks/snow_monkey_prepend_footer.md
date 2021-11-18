サイトフッターの上部にHTMLを挿入することができます。

## ソースコード
```php
<?php
add_action(
	'snow_monkey_prepend_footer',
	function() {
		?>
		<a class="c-btn c-btn--block p-hsm-prepend-footer c-blinking" href="<?php echo esc_url( home_url( '/snow_monkey_prepend_body' ) ); ?>" role="button">ここをカスタマイズする</a>
		<?php
	}
);
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Action-hooks#snow_monkey_prepend_footer