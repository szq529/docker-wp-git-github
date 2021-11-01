<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

  <?php get_header(); ?>

</head>

<body <?php body_class(); ?>>

<?

  <?php get_template_part('includes/header'); ?>

  <!-- バグを回避するためにif文を記述しておく -->
  <?php if (have_posts()) : ?>
    <!-- start the loop -->
    <?php while (have_posts()) : the_post(); ?>
      <!-- Page Header -->
      <?php
      // サムネイルがあれば
      if (has_post_thumbnail()) :
        // サムネイルのIDを返してもらって、取得
        $id = get_post_thumbnail_id();
        // IDを指定することによって今見ている投稿に指定されているアイキャッチを取り出せる
        // 画像を使用する場合はそれに見合ったサイズを指定する
        $img = wp_get_attachment_image_src($id, 'large');
      else :
        // なければデフォルトの画像を表示
        $img = array(get_template_directory_uri() . '/img/post-bg.jpg');
      endif;
      ?>

      <!-- <?php
            $eyecatch = get_eyecatch_with_default();
            ?> -->
      <!-- 画像パス[0]indexを指定し、出力 -->
      <header class="masthead" style="background-image: url('<?php echo $img[0]; ?>')">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">

            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="post-heading">
                <!-- タイトル出力 -->
                <h1><?php the_title(); ?></h1>
                <span class="meta">Posted by
                  <!-- 作成者(templatetag) -->
                  <?php the_author(); ?>
                  <!-- 作成日(templatetag)常に一件表示 -->
                  on <?php the_date(); ?>
                </span>
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- Post Content -->
      <article>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <!-- サムネイル表示のテンプレートタグを使用して表示 -->
              <!-- パラメータはオプションで($size,$attr(属性のこと))がある -->
              <?php get_the_post_thumbnail(); ?>
              <!-- 投稿(templatetag) -->
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </article>

      <hr>

    <?php endwhile; ?>
    <!-- bug回避のためなので、elseはない２ -->
  <?php endif; ?>


  <?php get_template_part('includes/footer'); ?>

  <?php get_footer(); ?>

</body>

</html>