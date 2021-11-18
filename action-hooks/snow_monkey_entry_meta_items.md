投稿のメタ情報に追加要素を入れる際に利用します。

優先度を変えることで、要素を挿入する場所を指定することができます。

- 1〜10 : 先頭
- 11〜20 : 投稿日の後ろ
- 21〜30 : 更新日の後ろ
- 31〜40 : 投稿者の後ろ
- 41以上 : カテゴリの後ろ

## ソースコード
```php
<?php
add_action(
	'snow_monkey_entry_meta_items',
	function() {
		?>
		<li class="c-meta__item c-meta__item--アイテム名">
			<a class="p-snow_monkey_entry_meta_items c-btn c-blinking" href="<?php echo esc_url( home_url( '/snow_monkey_entry_meta_items' ) ); ?>">
				snow_monkey_entry_meta_items
			</a>
		</li>
		<?php
	},
	10, //←優先度はこの数値
	1
);
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Action-hooks#snow_monkey_entry_meta_items