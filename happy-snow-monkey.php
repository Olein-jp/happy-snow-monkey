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
 * snow_monkey_prepend_drawer_nav
 */
add_action(
	'snow_monkey_prepend_drawer_nav',
	function() {
		?>
		<div class="c-hsm-message-box c-blinking p-snow_monkey_prepend_drawer_nav">
			<p><a href="<?php echo esc_url( home_url( '/snow_monkey_append_drawer_nav' ) ); ?>">snow_monkey_prepend_drawer_nav</a></p>
		</div>
		<?php
	}
);

/**
 * snow_monkey_append_drawer_nav
 */
add_action(
	'snow_monkey_append_drawer_nav',
	function() {
		?>
		<div class="c-hsm-message-box c-blinking p-snow_monkey_append_drawer_nav">
			<p><a href="<?php echo esc_url( home_url( '/snow_monkey_append_drawer_nav' ) ); ?>">snow_monkey_append_drawer_nav</a></p>
		</div>
		<?php
	}
);

/**
 * snow_monkey_prepend_body
 */
add_action(
	'snow_monkey_prepend_body',
	function() {
		?>
		<!--
		<div class="c-hsm-message-box">
			<p>こちらに何か表示させたい場合は、<a href="<?php echo esc_url( home_url( '/snow_monkey_prepend_body' ) ); ?>">こちら</a>の記事を参照してください！</p>
		</div>
		-->
		<a class="c-btn p-hsm-balloon c-blinking p-snow_monkey_prepend_body" href="<?php echo esc_url( home_url( '/snow_monkey_prepend_body' ) ); ?>" role="button">snow_monkey_prepend_bodyの応用</a>
		<?php
	}
);

/**
 * snow_monkey_prepend_footer
 */
add_action(
	'snow_monkey_prepend_footer',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_prepend_footer" href="<?php echo esc_url( home_url( '/snow_monkey_prepend_body' ) ); ?>" role="button">snow_monkey_prepend_footer</a>
		<?php
	}
);

/**
 * snow_monkey_append_footer
 */
add_action(
	'snow_monkey_append_footer',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_append_footer" href="<?php echo esc_url( home_url( '/snow_monkey_append_footer' ) ); ?>" role="button">snow_monkey_append_footer</a>
		<?php
	}
);

/**
 * snow_monkey_prepend_sidebar
 */
add_action(
	'snow_monkey_prepend_sidebar',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_prepend_sidebar" href="<?php echo esc_url( home_url( '/snow_monkey_prepend_sidebar' ) ); ?>" role="button">snow_monkey_prepend_sidebar</a>
		<?php
	}
);

/**
 * snow_monkey_append_sidebar
 */
add_action(
	'snow_monkey_append_sidebar',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_append_sidebar" href="<?php echo esc_url( home_url( '/snow_monkey_append_sidebar' ) ); ?>" role="button">snow_monkey_append_sidebar</a>
		<?php
	}
);

/**
 * snow_monkey_sidebar
 */
//add_action(
//	'snow_monkey_sidebar',
//	function() {
//		if ( is_single() ) {
//			\Framework\Helper::get_template_part( 'template-parts/widget-area/snow-monkey-posts' );
//		}
//	}
//);

/**
 * snow_monkey_prepend_main
 */
add_action(
	'snow_monkey_prepend_main',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_prepend_main" href="<?php echo esc_url( home_url( '/snow_monkey_prepend_main' ) ); ?>" role="button">snow_monkey_prepend_main</a>
		<?php
	}
);

/**
 * snow_monkey_append_main
 */
add_action(
	'snow_monkey_append_main',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_append_main" href="<?php echo esc_url( home_url( '/snow_monkey_append_main' ) ); ?>" role="button">snow_monkey_append_main</a>
		<?php
	}
);

/**
 * snow_monkey_prepend_contents
 */
add_action(
	'snow_monkey_prepend_contents',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_prepend_contents" href="<?php echo esc_url( home_url( '/snow_monkey_prepend_contents' ) ); ?>" role="button">snow_monkey_prepend_contents</a>
		<?php
	}
);

/**
 * snow_monkey_append_contents
 */
add_action(
	'snow_monkey_append_contents',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_append_contents" href="<?php echo esc_url( home_url( '/snow_monkey_append_contents' ) ); ?>" role="button">snow_monkey_append_contents</a>
		<?php
	}
);

/**
 * snow_monkey_before_contents_inner
 */
add_action(
	'snow_monkey_before_contents_inner',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_before_contents_inner" href="<?php echo esc_url( home_url( '/snow_monkey_before_contents_inner' ) ); ?>" role="button">snow_monkey_before_contents_inner</a>
		<?php
	}
);

/**
 * snow_monkey_after_contents_inner
 */
add_action(
	'snow_monkey_after_contents_inner',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_after_contents_inner" href="<?php echo esc_url( home_url( '/snow_monkey_before_contents_inner' ) ); ?>" role="button">snow_monkey_after_contents_inner</a>
		<?php
	}
);

/**
 * snow_monkey_prepend_entry_content
 * @since 10.8.0
 */
add_action(
	'snow_monkey_prepend_entry_content',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_prepend_entry_content" href="<?php echo esc_url( home_url( '/snow_monkey_prepend_entry_content' ) ); ?>" role="button">snow_monkey_prepend_entry_content</a>
		<?php
	}
);

/**
 * snow_monkey_append_entry_content
 * @since 10.8.0
 */
add_action(
	'snow_monkey_append_entry_content',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_append_entry_content" href="<?php echo esc_url( home_url( '/snow_monkey_append_entry_content' ) ); ?>" role="button">snow_monkey_append_entry_content</a>
		<?php
	}
);

/**
 * snow_monkey_before_entry_content
 */
add_action(
	'snow_monkey_before_entry_content',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_before_entry_content" href="<?php echo esc_url( home_url( '/snow_monkey_append_entry_content' ) ); ?>" role="button">snow_monkey_before_entry_content</a>
		<?php
	}
);

/**
 * snow_monkey_after_entry_content
 */
add_action(
	'snow_monkey_after_entry_content',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_after_entry_content" href="<?php echo esc_url( home_url( '/snow_monkey_after_entry_content' ) ); ?>" role="button">snow_monkey_after_entry_content</a>
		<?php
	}
);

/**
 * snow_monkey_append_archive_entry_content
 * @since 10.8.0
 */
add_action(
	'snow_monkey_append_archive_entry_content',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_append_archive_entry_content" href="<?php echo esc_url( home_url( '/snow_monkey_append_archive_entry_content' ) ); ?>" role="button">snow_monkey_append_archive_entry_content</a>
		<?php
	}
);

/**
 * snow_monkey_prepend_archive_entry_content
 * @since 10.8.0
 */
add_action(
	'snow_monkey_prepend_archive_entry_content',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_prepend_archive_entry_content" href="<?php echo esc_url( home_url( '/snow_monkey_prepend_archive_entry_content' ) ); ?>" role="button">snow_monkey_prepend_archive_entry_content</a>
		<?php
	}
);

/**
 * snow_monkey_before_archive_entry_content
 * @since 10.8.0
 */
add_action(
	'snow_monkey_before_archive_entry_content',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_before_archive_entry_content" href="<?php echo esc_url( home_url( '/snow_monkey_before_archive_entry_content' ) ); ?>" role="button">snow_monkey_before_archive_entry_content</a>
		<?php
	}
);

/**
 * snow_monkey_append_archive_entry_content
 * @since 10.8.0
 */
add_action(
	'snow_monkey_after_archive_entry_content',
	function() {
		?>
		<a class="c-btn c-btn--block c-blinking p-snow_monkey_after_archive_entry_content" href="<?php echo esc_url( home_url( '/snow_monkey_after_archive_entry_content' ) ); ?>" role="button">snow_monkey_after_archive_entry_content</a>
		<?php
	}
);

/**
 * snow_monkey_entry_meta_items
 */
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
	10,
	1
);

/**
 * snow_monkey_display_contents_outline
 */
add_filter( 'snow_monkey_display_contents_outline', '__return_true' );

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