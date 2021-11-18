サイドバー最上部にHTMLを挿入したい時に利用します。

## ソースコード
```php
<?php
add_action(
	'snow_monkey_prepend_sidebar',
	function() {
		?>
		<a class="c-btn c-btn--block p-hsm-append-footer c-blinking" href="<?php echo esc_url( home_url( '/snow_monkey_prepend_sidebar' ) ); ?>" role="button">ここをカスタマイズする</a>
		<?php
	}
);
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Action-hooks#snow_monkey_prepend_sidebar