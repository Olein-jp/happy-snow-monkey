Snow Monkey では現在、目次は Snow Monkey Blocks から提供されている専用のカスタムブロックにて設置する方法が推奨されています。

しかし、全てのコンテンツに一律に目次を設置たい場合には、都度カスタムブロックを設置することが面倒に思える場合もあります。

そういう場合に、こちらのフィルターフックを活用して、以前のように一律に目次を表示させるということができます。

## ソースコード
```php
<?php
add_filter( 'snow_monkey_display_contents_outline', '__return_true' );
```

## 公式リファレンス
https://github.com/inc2734/snow-monkey/wiki/Filter-hooks#snow_monkey_display_contents_outline