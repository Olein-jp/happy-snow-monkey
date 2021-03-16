<?php
/**
 * Plugin name: HAPPY SNOW MONKEY
 * Description: このプラグインは、Snow Monkeyのカスタマイズ事例を紹介するウェブサイト「HAPPY SNOW MONKEY」専用プラグインです。
 * Version: 1.0.0
 *
 * @license GPL-2.0+
 */

/**
 * Snow Monkey 以外のテーマを利用している場合は有効化してもカスタマイズが反映されないようにする
 */
$theme = wp_get_theme( get_template() );
if ( 'snow-monkey' !== $theme->template && 'snow-monkey/resources' !== $theme->template ) {
	return;
}

/**
 * Directory url of this plugin
 *
 * @var string
 */
define( 'MY_SNOW_MONKEY_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Directory path of this plugin
 *
 * @var string
 */
define( 'MY_SNOW_MONKEY_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

/**
 * template part root hierarchy
 */
add_filter(
	'snow_monkey_template_part_root_hierarchy',
	function( $hierarchy ) {
		$hierarchy[] = untrailingslashit( __DIR__ ) . '/override';
		return $hierarchy;
	}
);

/**
 * import CSS file
 */
add_action(
	'wp_enqueue_scripts',
	function() {
		wp_enqueue_style(
			'hsm-styles',
			untrailingslashit( plugin_dir_url( __FILE__ ) ) . '/style.css',
			[ Framework\Helper::get_main_style_handle() ],
			filemtime( plugin_dir_path( __FILE__ ) )
		);
	}
);

/**
 * import css file for editor
 */
add_action(
	'after_setup_theme',
	function() {
		add_editor_style( '/../../plugins/happy-snow-monkey/editor-style.css' );
	}
);

/**
 * snow_monkey_breadcrumbs
 * @param array $items パンくずの配列
 * @return array パンくずの配列
 */
add_filter(
	'snow_monkey_breadcrumbs',
	function( $items ) {
		if ( isset( $items[0] ) ) {
			$items[0] = [
				'title' => 'HAPPY SNOW MONKEY',
				'link'  => $items[0]['link'],
			];
		}
		return $items;
	}
);

/**
 * エントリー下に公式フォーラムで検索した結果を表示させるボタンを作る/アクション・フィルターフックカテゴリーのみ
 */
add_action(
	'snow_monkey_append_entry_content',
	function() {
		global $post;
		$slug = $post->post_name;
		if ( in_category( 'action-hook' ) || in_category( 'filter-hook' ) ) {
		?>
		<a class="c-btn c-btn--block p-search-in-forum-button" href="https://snow-monkey.2inc.org/forums/search/<?php echo $slug; ?>" role="button" target="_blank"><span><?php echo $slug; ?></span>フックを<br>Snow Monkey公式フォーラムで検索する</a>
		<?php }
	},
	1,
	1
);

/**
 * 修正した方が良い項目があったら連絡をもらえるように促すボタン
 */
add_action(
	'snow_monkey_append_entry_content',
	function() {
		if ( ! is_page() ) {
		?>
			<a class="c-btn c-btn--block p-move-to-contact-btn" href="<?php echo esc_url( home_url( '/contact' ) ); ?>" role="button" target="_blank">「あれ？この情報、古くない？」と思ったらご連絡ください。</a>
		<?php }
	},
	2,
	1
);

/**
 * プロフィールボックスのタイトルを変更
 */
add_filter( 'snow_monkey_template_part_render',
	function( $_html ) {
		$_html = str_replace(
			'<h2 class="wp-profile-box__title">' . esc_html__( 'Bio', 'inc2734-wp-profile-box' ) . '</h2>',
			'<h2 class="wp-profile-box__title">HAPPY SNOW MONKEYの管理人情報</h2>',
			$_html
		);
		return $_html;
	}
	,
	10,
	4
);

/**
 * エントリーメタ情報にタグを追加
 */
add_action(
	'snow_monkey_entry_meta_items',
	function() {
		if ( ! get_the_terms( get_the_ID(), 'post_tag' ) ) {
			return;
		}
		?>
		<li class="c-meta__item c-meta__item--tags">
			<?php \Framework\Helper::get_template_part( 'template-parts/content/entry-tags' ); ?>
		</li>
		<?php
	},
	41
);

/**
 * ショートコードを作成
 */
add_shortcode( 'hsm-shorcode-demo-name', 'hsm_shortcode_function_name' );

function hsm_shortcode_function_name( $atts, $content = null ) {
	$hsmshortcode = shortcode_atts( array(
		'link' => '#',
		'color' => 'blue',
		'target' => '_self'
	), $atts );
	$output = '<a href="' . esc_url( $hsmshortcode[ 'link' ] ) . '" 
	class="hsm-shortcode-demo-button hsm-shortcode-demo-button_' . $hsmshortcode[ 'color' ] . '" 
	target="' . $hsmshortcode[ 'target' ] . '">' . esc_attr( $content ) . '</a>';
	return $output;
}
add_action( 'init', 'hsm_shortcode_function_name' );

/**
 * FontAwesome ショートコード
 */
function hsm_add_fontawesome_icon( $atts ) {
	extract( shortcode_atts( array(
			'icon' => 'fab fa-wordpress',
	), $atts ) );
	$output = '<i class="' . $icon . '"></i>';
	return $output;
}
add_shortcode( 'hsm-fa', 'hsm_add_fontawesome_icon' );

//function hsm_add_fontawesome_icon( $atts ) {
//	extract( shortcode_atts( array(
//		'icon' => 'fab fa-wordpress',
//		'link' => '',
//		'target' => '_self',
//	), $atts ) );
//	$icon = '<i class="' . $icon . '"></i>';
//	if ( $link ) {
//		$output = '<a href="' . $link . '" target="' . $target . '">';
//		$output .= $icon . '</a>';
//		return $output;
//	}
//	return $icon;
//}
//add_shortcode( 'hsm-fa', 'hsm_add_fontawesome_icon' );

add_filter( 'body_class', 'add_page_slug_class_name' );
function add_page_slug_class_name( $classes ) {
	if ( is_page() ) {
		$page = get_post( get_the_ID() );
		$classes[] = 'hsm-' . $page->post_name;
	}
	return $classes;
}

/**
 * Snow Monkey Form にイベント名を自動入力させるテスト
 */
add_filter(
	'snow_monkey_forms/control/attributes',
	function( $attributes ) {
		// name 属性値を持つブロックが対象
		// name が fullname という名前のとき
		if ( isset( $attributes['name'] ) && 'event' === $attributes['name'] ) {
			// ?post_id という URL クエリがあるときが対象
			if ( ! is_null( $post_id ) ) {
				$post_id = filter_input( INPUT_GET, 'post_id' );
				// ?post_id で指定された投稿のタイトルを初期値をして設定
				$attributes['value'] = get_the_title( $post_id );
			}
		}
		return $attributes;
	}
);

/**
 * bodyタグにカテゴリースラッグをCSSクラス名に挿入
 */
add_filter(
	'body_class',
	function ( $classes ) {
		global $post;
		foreach ( get_the_category( $post->ID ) as $category ) {
			$classes[] = 'hsm-category-' . $category->category_nicename;
		}
		return $classes;
	}
);