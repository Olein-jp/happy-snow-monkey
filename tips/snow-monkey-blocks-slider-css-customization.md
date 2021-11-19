この記事では、Snow Monkey Blocks に含まれている **スライダーブロック** の CSS カスタマイズについてご紹介したいと思います。

## カスタマイズの前提条件
- Snow Monkey Blocks バージョンは `13.3.0` で動作確認
- 任意の CSS クラス `.customize-smb-slider` を付与

## キャプション部分に半透明背景を設置する
Snow Monkey Blocks のスライダーは、WordPress 標準の画像ギャラリーが利用されています。そちらでは、スライダーに掲載する画像にキャプションテキストを、画像ブロックと同じにように設置することができます。

しかし、デフォルトでは画像の上に、文字色が黒のテキストが掲載されるだけなので、暗めの画像だとキャプションが同化してしまい、視認性が低くなってしまいます。

そう言った場合の解決方法の１つとして、背景に半透明の黒背景を設置し、文字色を白にすることで、どんな画像でも最低限の視認性を確保することができます。

キャプション部分は、 `.smb-spider-slider__item` という CSS クラスが設定されているので、その部分にスタイルを適応してみます。

```css
.customize-smb-slider.smb-spider-slider .smb-spider-slider__item {
    background-color: rgba( 0,0,0, .5 );
}
```

`.smb-spider-slider__item__caption` を使ってテキストの色を変更しましょう。

```css
.customize-smb-slider.smb-spider-slider .smb-spider-slider__item__caption {
    color: white;
}
```

これで完成です。

## サムネイル画像を角丸にしたい場合
サムネイル画像を表示した場合には、このような形で角丸にしたりすることもできます。

```css
.customize-smb-slider.smb-spider-slider .spider__figure {
    border-radius: 5px;
}
```

他にも属性によって切り替えることで、さまざまな見せ方ができるのでぜひ試してみてください。

## サムネイル画像をメインスライダー画像の上に被せる
全体をラップしている `.smb-spider-slider` に `position: relative;` を設定し、サムネイル画像全体の `.spider__dots` を絶対配置することで実現することができます。

各種デバイスでの見え方やキャプションが複数業になる場合の検証は必ず行なってくださいね。

```css
.customize-smb-slider.smb-spider-slider {
    position: relative;
}

.customize-smb-slider.smb-spider-slider .spider__dots {
    position: absolute;
    left: 0;
    bottom: 51px;
    z-index: 10;
    justify-content: center;
    padding-left: 50px;
    padding-right: 50px;
}
```

## メイン画像の高さを変更する
１カラムレイアウトなどでスライダーを利用する場合、ファーストビューに収まるようにといった工夫もされることがあるかもしれません。

同時にスライダーの高さを任意の高さに設定したい場合もあるでしょう。

そう言った場合には、このようにスタイルを当てると良いです。

```css
.customize-smb-slider.smb-spider-slider .spider__canvas {
    height: 50vh;
}
```
