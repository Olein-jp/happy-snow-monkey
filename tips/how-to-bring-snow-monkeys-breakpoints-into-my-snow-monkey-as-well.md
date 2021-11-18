My Snow Monkey で CSS ファイルを用意して、独自のスタイリングを行うことはカスタマイズの鉄板中の鉄板でしょう。

Snow Monkey は大きく分けて３つのブラウザ幅へのブレイクポイントを持っています。

## ソースコード
```css
body {
  background-color: red;
}
@media screen and (min-width: 40em ) {
  body {
    background-color: blue;
  }
}
@media screen and (min-width: 64em ) {
  body {
    background-color: yellow;
  }
}
```