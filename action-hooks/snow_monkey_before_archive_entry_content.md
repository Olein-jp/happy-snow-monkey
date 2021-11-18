アーカイブページ（ブログ記事一覧など）のエントリーコンテンツの前に HTML を挿入する際に利用します。

[snow_monkey_prepend_archive_entry_content](https://happy-snow-monkey.olein-design.com/snow_monkey_prepend_archive_entry_content/) に似ています。

## ソースコード
```php
<?php
add_action(
	'snow_monkey_before_archive_entry_content',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_before_archive_entry_content" href="<?php echo esc_url( home_url( '/snow_monkey_before_archive_entry_content' ) ); ?>" role="button">snow_monkey_before_archive_entry_content</a>
		<?php
	}
);
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Action-hooks#snow_monkey_before_archive_entry_content