<!DOCTYPE html>
<!-- lange ="en" -->
<!-- templateタグでwpの設定言語に合わせて出力される -->
<html <?php language_attributes(); ?>>

<head>

  <?php get_header(); ?>

</head>

<!-- たくさんのbodytagが付加される
class属性を使ってjavascriptの稼働を制御したりする
wpの今の状況がどのようなものから推測することができる -->

<body <?php body_class(); ?>>

  <?php get_template_part('includes/header'); ?>

  <!-- バグを回避するためにif文を記述しておく -->
  <?php if (have_posts()) : ?>
    <!-- start the loop -->
    <?php while (have_posts()) : the_post(); ?>
      <!-- Page Header -->
      <?php
      // functions.phpで作成・追加した関数を使用
      $eyecatch = get_eyecatch_with_default();
      ?>
      <!-- 画像パス[0]indexを指定し、出力 -->
      <header class="masthead" style="background-image: url('<?php echo $eyecatch[0]; ?>')">
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