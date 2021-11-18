ドロワーナビゲーションの最下部にコンテンツを挿入するときに利用できます。

こちらは、スマートフォン表示の際もしくはPCでもドロワーメニューを利用している時に表示される場所です。

実際の動作を確認したい場合には、スマートフォンで当ページにアクセスされるか、開発者ツールなどを利用して確認してみてください。

## ソースコード
```php
<?php
add_action(
	'snow_monkey_append_drawer_nav',
	function() {
		?>
		<div class="c-hsm-message-box c-hsm-message-box_invert p-hsm-drawer c-blinking">
			<p><a href="<?php echo esc_url( home_url( '/snow_monkey_append_drawer_nav' ) ); ?>">ここをカスタマイズする</a></p>
		</div>
		<?php
	}
);
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Action-hooks#snow_monkey_append_drawer_nav