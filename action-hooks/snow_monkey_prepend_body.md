Google Analyticsや任意のコードを `body` タグ開始直下に挿入したい場合に利用します。

しかし、WordPressから `wp_body_open` というフックが用意されているので、

- Snow Monkey 5.6.0以上
- WordPress 5.2以上

上記両条件が満たされる場合は、 `wp_body_open` の利用を推奨します。

## ソースコード
```php
<?php
add_action(
	'snow_monkey_prepend_body',
	function() {
		?>
		<a class="c-btn p-hsm-balloon c-blinking" href="<?php echo esc_url( home_url( '/snow_monkey_prepend_body' ) ); ?>" role="button">ここをカスタマイズする</a>
		<?php
	}
);
```

左下に常時表示されているボタン部分のCSSはこのような感じで書いています。

`c-btn` は Snow Monkey に採用されている [CSS フレームワーク Basis の CSS クラス](https://sass-basis.github.io/basis/category/object/component/index.html#.c-btn) です。

```css
.p-hsm-balloon {
  position: fixed;
  display: inline-block;
  left: 15px;
  bottom: 60px;
  background-color: #eaea25;
  color: #555;
  z-index: 10000;
}
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Action-hooks#snow_monkey_prepend_body
