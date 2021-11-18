サイドバーの最下部にHTMLを挿入したい場合に利用します。

追従用のウィジェットを設定した際には、その下に入り込む位置になります。

## ソースコード
```php
<?php
add_action(
	'snow_monkey_append_sidebar',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking" href="<?php echo esc_url( home_url( '/snow_monkey_append_sidebar' ) ); ?>" role="button">ここをカスタマイズする</a>
		<?php
	}
);
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Action-hooks#snow_monkey_append_sidebar