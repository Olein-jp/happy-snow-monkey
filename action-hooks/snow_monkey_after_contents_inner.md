コンテンツインナーの最後に HTML を挿入する際に利用します。

コンテンツエリア（メインとサイドバー）の下に該当する位置です。

## ソースコード
```php
add_action(
	'snow_monkey_after_contents_inner',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-hsm-after-contents-inner" href="<?php echo esc_url( home_url( '/snow_monkey_before_contents_inner' ) ); ?>" role="button">ここをカスタマイズする</a>
		<?php
	}
);
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Action-hooks#snow_monkey_after_contents_inner