<!DOCTYPE html>
<!-- <html lang="en"> -->
<html <?php language_attributes(); ?>>

<head>

  <?php get_header(); ?>

</head>

<body>
  <!-- パーツを使用 -->
  <?php get_template_part('includes/header'); ?>

  <!-- アーカイブではif構文を使って様々なタイトルを表示する -->

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <!-- tagのページを別のファイルで作成してもよいが、共通部分を作成した際に不便
            同一のページで処理を分けて表示を変える -->
            <?php if (is_category()) : ?>
              <!-- カテゴリーアーカイブページならture,でなければfalse -->
              <h1>Category</h1>
              <!-- 作成者の審議 -->
            <?php elseif (is_author()) : ?>
              <h1>Author</h1>
            <?php elseif (is_date()) : ?>
              <h1>Date</h1>
            <?php else : ?>
              <h1>Tag</h1>
            <?php endif; ?>
            <!-- テンプレートタグを使用して表示しているページのタイトルを表示するためのもの -->
            <span class="subheading"><?php wp_title(``); ?></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <!-- 条件分岐 -->
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <div class="post-preview">
              <!-- 各ページのリンク -->
              <a href="<?php the_permalink(); ?>">
                <h2 class="post-title">
                  <?php the_title(); ?>
                </h2>
                <h3 class="post-subtitle">
                  <?php the_excerpt(); ?>
                </h3>
              </a>
              <p class="post-meta">Posted by
                <!-- 著者名 -->
                <?php the_author(); ?>
                <!-- 作成日 -->
                on <?php the_time(get_option('date_format')); ?>
              </p>
            </div>
            <hr>
          <?php endwhile; ?>

          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        <?php else : ?>
          <p>記事が見つかりませんでしたよ！</p>
        <?php endif; ?>
      </div>
      <!-- 分岐終了 -->
    </div>
  </div>

  <hr>

  <!-- パーツを使用 -->
  <?php get_template_part('includes/footer'); ?>

  <!-- パーツに全て含めないのはあるページでは要素を含めいたい、加えたい際に分けた方が扱いやすいかも -->

  <?php get_footer(); ?>
</body>

</html>