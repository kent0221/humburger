<?php
// :::::::: WordPress機能追加 ::::::::

// add_theme_support('menus');//   ナビゲーションメニュー編集（メニュー機能が１つのときに使用）
add_theme_support('title-tag');//   タイトル出力
add_theme_support('post-thumbnails');//  フィードの設定
add_theme_support('automatic-feed-links');
add_theme_support('custom-header');


// :::::::: header.php ::::::::
// --- head: タイトル出力 ---//
function humburger_title($title)
{
    if (is_front_page() && is_home()) {
        $title = get_bloginfo('namespace', 'display');
    } elseif (is_singular()) {
        $title = single_post_title('', false);
    }
    return $title;
}
add_filter('pre_get_document_title', 'humburger_title');


// --- css, JavaScript読み込み ---//
function humburger_script()
{
    // google font: roboto
    wp_enqueue_style('roboto', '//fonts.googleapis.com/css2?family=Roboto&display=swap', array());
    // google font: m-plus
    wp_enqueue_style('m-plus', '//fonts.googleapis.com/css2?family=M+PLUS+1p&display=swap', array());
    // fontawesome
    wp_enqueue_style('fontawesome', '//use.fontawesome.com/releases/v5.15.4/css/all.css', array());
    // 自作css
    wp_enqueue_style('humburger', get_template_directory_uri().'/css/humburger.css', array());
    // スタイルシート
    wp_enqueue_style('humburger', get_template_directory_uri().'/style.css', array());
    // jQuery
    wp_enqueue_script('jQuery', get_template_directory_uri().'/js/jquery.min.js', array(), true);
    // 自作js
    wp_enqueue_script('script', get_template_directory_uri().'/js/script.js', array(), true);
}
add_action('wp_enqueue_scripts', 'humburger_script');


//::::ウィジェット::::
function humburger_widgets_init()
{
    register_sidebar(
        array(
            'name'=>'All menu',
            'id'=>'menu_widget',
            'description'=>'メニューの一覧',
            'before_widget'=>'<div id="%1$s" class="widget %2$s">',
            'after_widget'=>'</div>',
            'before_title'=>'<h3 class="p-gmenu__category">',
            'after_title'=>'</h3>'
        )
    );

    /**カスタマイズ
     * カスタムタクソノミーのターム一覧をカテゴリウィジェットへ適用させる処理
     */

    class WP_Widget_Categories_Taxonomy extends WP_Widget_Categories
    {
        private $taxonomy = 'category';

        public function widget($args, $instance)
        {
            if (!empty($instance['taxonomy'])) {
                $this->taxonomy = $instance['taxonomy'];
            }

            add_filter('widget_categories_dropdown_args', array( $this, 'add_taxonomy_dropdown_args' ), 10);
            add_filter('widget_categories_args', array( $this, 'add_taxonomy_dropdown_args' ), 10);
            parent::widget($args, $instance);
        }

        public function update($new_instance, $old_instance)
        {
            $instance = parent::update($new_instance, $old_instance);
            $taxonomies = $this->get_taxonomies();
            $instance['taxonomy'] = 'category';
            if (in_array($new_instance['taxonomy'], $taxonomies)) {
                $instance['taxonomy'] = $new_instance['taxonomy'];
            }
            return $instance;
        }

        public function form($instance)
        {
            parent::form($instance);
            $taxonomy = 'category';
            if (!empty($instance['taxonomy'])) {
                $taxonomy = $instance['taxonomy'];
            }
            $taxonomies = $this->get_taxonomies(); ?>
<p>
    <label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php _e('Taxonomy:', 'humburger'); ?></label><br />
    <select id="<?php echo $this->get_field_id('taxonomy'); ?>" name="<?php echo $this->get_field_name('taxonomy'); ?>">
        <?php foreach ($taxonomies as $value) : ?>
        <option value="<?php echo esc_attr($value); ?>" <?php selected($taxonomy, $value); ?>>
            <?php echo esc_attr($value); ?></option>
        <?php endforeach; ?>
    </select>
</p>
<?php
        }

        public function add_taxonomy_dropdown_args($cat_args)
        {
            $cat_args['taxonomy'] = $this->taxonomy;
            return $cat_args;
        }

        private function get_taxonomies()
        {
            $taxonomies = get_taxonomies(array(
            'public' => true,
        ));
            return $taxonomies;
        }
    }
    unregister_widget('WP_Widget_Categories');
    register_widget('WP_Widget_Categories_Taxonomy');
}



add_action('widgets_init', 'humburger_widgets_init');



// :::::::: メニュー ::::::::
// --- wp_nav_menu()にtheme_location加えたので以下が必要 ---//
register_nav_menus(
    array(
        'footer_info'=>'footer_info',
        )
);
    
    
//***********************************************
//ページネーションの設定: archive.php, archive-search.php
// 以下、テンプレート

// the_posts_pagination(
//     array(
//         'base'               => '%#%', // ページ番号付きのリンクを生成するために使われるベースの URL を指定
//                                        //%#%でページ番号のことで、下記の'format'に入る
//         'format'             => '?page=%#%', // ページネーションのパーマリンク構造
//         'total'              => $wp_query->max_num_pages, // 総ページ数
//         'current'            => max(1, get_query_var('paged')), // 現在のページ番号
//         'show_all'           => false, // 全てのページを表示する。falseの場合は以下end_size, mid_sizeで指定
//         'end_size'           => 1, // ページ番号リストの両端に表示するページ数
//         'mid_size'           => 1, // 現在のページの両端に表示するページ数
//         'prev_next'          => true, // リスト内に「前へ」「後へ」のリンクを表示するかどうか。表示する場合はprev_text, next_textで指定
//         'prev_text'          => __('previous page', 'textdmain'), // 前のページへ送るリンクテキスト
//         'next_text'          => __('next page', 'textdmain'), // 後のページへ送るリンクテキスト
//         'type'               => 'plain', // 戻り値の指定 plain or list
//         'add_args'           => false, // 追加のクエリ引数の配列
//         'add_fragment'       => false, // リンクに付け加えるテキスト
//         'before_page_number' => '', // 各ページ番号の前に入れるテキスト
//         'after_page_number'  => '', // 各ページ番号の後に入れるテキスト
//         'screen_reader_text' => __('Post Navigation', 'textdmain'), // スクリーンリーダー用のテキスト
//         )
// );

//***********************************************

/**$wp_query
 * WordPressがページ読み込みの際にデータベースから自動的に取得する様々なデータの集まりを格納している変数
 * グローバル宣言（global 〇〇）→ アクセスできるようになる
 *
 * $wp_query->max_num_pages: $wp_queryからデータ抽出：最大ページ数
 */

 /**str_replace(A,B,C)
  * ()内に指定した文字列Aを文字列Bに変換する
  * C：AをBに置き換えるのに使用
  */

/**get_pagenum_link()
 * ()内の数字からページ番号のリンクを返す
 */

 /** get_query_var('paged')
  * $wp_queryに格納されている現在のページ番号を取得
  * max(A, B)
  * AとBで比較して最大値を返す
  */


function the_pagenation()
{
    global $wp_query;
    $big = 999999999999;//あり得ない数字をただ入れているだけ

    if ($wp_query->max_num_pages <= 1) {
        return;
    }

    echo '<ul class="p-pagenation">';

    echo the_posts_pagination(
        array(
                'base'               => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'             => '', // 空だとデフォルト'?page=%#%'になる
                'total'              => $wp_query->max_num_pages, // 総ページ数
                'current'            => max(1, get_query_var('paged')), // 現在のページ番号
                'show_all'           => false, // 全てのページを表示する。falseの場合は以下end_size, mid_sizeで指定
                'end_size'           => 1, // ページ番号リストの両端に表示するページ数
                'mid_size'           => 1, // 現在のページの両端に表示するページ数
                'prev_next'          => true, // リスト内に「前へ」「後へ」のリンクを表示するかどうか。表示する場合はprev_text, next_textで指定
                'prev_text'          => '&lt;&lt;', // 前のページへ送るリンクテキスト
                'next_text'          => '&gt;&gt;', // 後のページへ送るリンクテキスト
                'type'               => 'list', // 戻り値の指定 plain or list(ulタグ)
                'screen_reader_text' => '', // スクリーンリーダー用のテキスト
            )
    );

    echo '</ul>';
}


/**カスタム投稿の追加
 *
 * $post_type.... カスタム投稿タイプのスラッグ（英数字小文字）
 * public.... true or false / 公開するかどうか（管理画面で編集するにはtrue）
 * label.... 管理画面のメニュー、カスタム投稿一覧ページに表示するカスタム投稿タイプの名前
 * labels.... 管理画面で表示されるラベルの文字列指定
 * hierarchial.... true or false / true->カテゴリ扱い, false->タグ扱い
 * show_ui.... true or false / 管理画面表示するかどうか（falseだと管理画面で操作できない）
 * supports..... 編集・新規作成ページに表示する項目を指定（例；タイトルと抜粋を表示-> supports=>array('title', 'excerpt')）
 *  array(
 *      'title',....タイトル
 *      'editor',....本文とその編集機能
 *      'autthor',....作成者
 *      'thumbnail',....アイキャッチ画像
 *      'excerpt',....抜粋
 *      'comments',....コメント一覧
 *      'trackbacks',....トラックバック送信
 *      'custom-fields',....カスタムフィールド
 *      'revisions',....リビジョン
 *      'page-attributes',....ページ属性（hierarcial: trueで、編集ページに親を選択するボックスを表示したい時に使用）
 *      'post-formats'....投稿フォーマット
 *      ),
 * 'menu_position'....管理画面にカスタム投稿のメニューを表示する位置（５ずつ刻みで、追加位置が１下がる）
 * 'menu_icon'....カスタム投稿メニューに表示するアイコンのURL
 * 'rewrite'....true or false / trueだと個々のページはカスタム投稿タイプのslugの入ったURLになる(trueの代わりにarray('slug'=>'別のslug')ともできる)
 * 'has_archive'....true or false / 記事の一覧ページ(archive)を生成するかどうか
 * 'public_queryable'....true or false / post_typeのクエリが実現可能かどうか（よくわからない）
 * 'exclude_from_search'....true or false / 検索対象にこのカスタム投稿タイプを除外するかどうか
 * 'query_var'....true or false / この投稿にquery_varキー内の名前を使用するかどうか（trueなら記事のスラッグ名が最後に入る）
 * 'show_in_nav_menus'....true or false / ナビゲーションメニューで選択可能かどうか
 * 'show_in_menu'....true or false / 管理画面のメニューに表示するかどうか
 * 'taxonomies'....この投稿タイプに使用するタクソノミーを関連づける（別途register_taxonomy()の登録が必要）
 * 'capability_type'....閲覧・編集・削除の権限を作るための文字列指定
 * 'capabiities'....この投稿タイプの権限を配列で指定
 * 'show_in_rest'....true or false / Gutenbergで編集可能にするかどうか
 *
 */

 //***********************************************
//  function create_custom_post_type(){
//     register_post_type(
//         $post_type,
//         array(
//             'public'=>true,
//             'label'=>'',
//             'labels'=>'',
//             'hierarchial'=>,
//             'show_ui'=>true,
//             'supports'=>array(
//                 'title',
//                 'editor',
//                 'autthor',
//                 'thumbnail',
//                 'excerpt',
//                 'comments',
//                 'trackbacks',
//                 'custom-fields',
//                 'revisions',
//                 'page-attributes',
//                 'post-formats'
//             ),
          
//             'menu_position'=>,
//             'menu_icon'=>,
//             'rewrite'=>,
//             'has_archive'=>true,
//             'public_queryable'=>,
//             'exclude_from_search'=>,
//             'query_var'=>,
//             'show_in_nav_menus'=>,
//             'show_in_menu'=>true,
//             'taxonomies'=>array(''),
//             'capability_type'=>,
//             'capabiities'=>,
//             'show_in_rest'=>true,
//         )
//       );
//    }
//  add_action('init', 'create_custom_post_type');
 //***********************************************


 function create_custom_post_type()
 {
     register_post_type(
         'item',
         array(
            'public'=>true,
            'label'=>'商品',
            'labels'=>'item',
            'hierarchical'=>true,
            'show_ui'=>true,
            'supports'=>array(
                'title',
                'editor',
                'autthor',
                'thumbnail',
                'excerpt',
                'comments',
                'trackbacks',
                'custom-fields',
                'revisions',
                'page-attributes',
                'post-formats'
            ),
          
            'menu_position'=>5,
            'menu_icon'=>'dashicons-store',
            'has_archive'=>true,
            'show_in_menu'=>true,
            'show_in_rest'=>true,
            'taxonomies'=>array('item_cat')
        )
     );

     register_taxonomy(
         'item_cat',
         'item',
         array(
             'label'=>'商品カテゴリー',
             'edit_item'=>'商品カテゴリーを編集',
             'public'=>true,
             'hierarchical'=>true,
             'show_admin_column'=>true
         )
     );
 }
 add_action('init', 'create_custom_post_type');


 //***********************************************
 //以下、デバッグ対応
 //***********************************************

/**
 * コンテンツの幅が定義されていません。
 * -> コンテンツの幅を定義する
 */
  if (! isset($content_width)) {
      $content_width = 1290;
  }