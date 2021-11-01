<?php
// 初期化をする際に
add_action('init', function () {
    // wpに準備されている関数
    // add_theme_support('title-tag');
    // テーマに対してサポートする項目(投稿のサムネイル)を増やしたいですよと
    add_theme_support('post-thumbnails');
});
// phpの閉じたタグがないのは、あっても構わないが、 -->
// 作法的にファイルの最後がphpの閉じにあたる場合は省略可

/* アイキャッチ画像がなければ、標準画像を取得する */
function get_eyecatch_with_default()
{
    if (has_post_thumbnail()) :
        $id = get_post_thumbnail_id();
        $img = wp_get_attachment_image_src($id, 'large');
    else :
        $img = array(get_template_directory_uri() . '/img/post-bg.jpg');
    endif;

    return $img;
}
