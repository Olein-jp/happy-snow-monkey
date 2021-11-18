フッターの後にHTMLを出力させることができます。フッターバー（コピーライトとか書いてある場所）の下に挿入されます。

## ソースコード
```php
<?php
add_action(
	'snow_monkey_append_footer',
	function() {
		?>
		<a class="c-btn c-btn--block p-hsm-append-footer" href="<?php echo esc_url( home_url( '/snow_monkey_append_footer' ) ); ?>" role="button">ここをカスタマイズする</a>
		<?php
	}
);
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Action-hooks#snow_monkey_append_footer