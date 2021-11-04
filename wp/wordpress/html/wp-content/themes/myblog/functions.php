<?php
// 初期化をする際に
add_action('init', function () {
    // wpに準備されている関数
    add_theme_support('title-tag');
    // テーマに対してサポートする項目(投稿のサムネイル)を増やしたいですよと
    add_theme_support('post-thumbnails');
});
// phpの閉じたタグがないのは、あっても構わないが、 -->
// 作法的にファイルの最後がphpの閉じにあたる場合は省略可

/* アイキャッチ画像がなければ、標準画像を取得するif構文、関数を作成追加 */
function get_eyecatch_with_default()
{
    // サムネイルのIDを返してもらって、取得
    if (has_post_thumbnail()) :
        // IDを指定することによって今見ている投稿に指定されているアイキャッチを取り出せる
        $id = get_post_thumbnail_id();
        // 画像を使用する場合はそれに見合ったサイズを指定する
        $img = wp_get_attachment_image_src($id, 'large');
    else :
        // なければディレクトリないにあるデフォルトの画像を表示
        $img = array(get_template_directory_uri() . '/img/post-bg.jpg');
    endif;
    // 定義を呼び出した際に変数に戻すことができる
    return $img;
}

http://127.0.0.1:8080/%e3%81%a6%e3%81%99%e3%81%a8/