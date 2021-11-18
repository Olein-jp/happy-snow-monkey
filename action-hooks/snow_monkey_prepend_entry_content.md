エントリーコンテンツの上部に HTML を挿入する際に利用します。

エントリータイトルやメタ情報、アイキャッチ画像の下（コンテンツ部分が始まる直前）が該当する場所になります。

## ソースコード
```php
<?php
add_action(
	'snow_monkey_prepend_entry_content',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking" href="<?php echo esc_url( home_url( '/snow_monkey_prepend_entry_content' ) ); ?>" role="button">ここをカスタマイズする</a>
		<?php
	}
);
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Action-hooks#snow_monkey_after_contents_inner