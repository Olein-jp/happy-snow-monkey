メタ情報を見せたい場所と見せたくない場所があったので、CSS で表示を消す処理を行いました。その際のソースコードはこちらです。

## ソースコード
```css
/* サマリー内メタ情報を非表示 */
.c-entry-summary__meta {
  display: none;
}

/* 記事タイトル下マージンをなくして上下パディングのバランスを整える */
.c-entry-summary__header {
  margin-bottom: 0;
}
```

実際、こちらのサイトでは、

- ウィジェットの場合（ `.c-widget` ）
- パネル表示の場合（ '.c-entries--panel` ）

の条件の場合に、メタ情報を非表示にしてみました。その場合は、

```css
.c-widget {
  .c-entries--panel {
    /* サマリー内メタ情報を非表示 */
    .c-entry-summary__meta {
      display: none;
    }

    /* 記事タイトル下マージンをなくして上下パディングのバランスを整える */
    .c-entry-summary__header {
      margin-bottom: 0;
    }
  }
}
```

というソースコードになります。