<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./image/favicon.png" type="image/png">
    <title>Listing</title>
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>

  <body>

    <!-- header -->
    <?php include('../src/BlogBundle/Resources/views/header.php'); ?>

    <!-- main -->
      <main class="listing-bg">
        <div class="list-item">
          <div class="item">
          <?php foreach ($viewData['articles'] as $article): ?>
            <article>
              <div class="info-title">
                <h2><?= $article->getTitle() ?></h2>
              </div>
              <div class="info-item">
                <p>Infomations</p>
                <span class="category">Category : <?= $article->getCategory() ?></span>
                <span class="creation-date">Creation date : <?= $article->getCreatedAt() ?></span>
                <span class="creation-date">Content : <?= $article->getContent() ?></span>
              </div>
            </article>
          <?php endforeach; ?>
          </div>
        </div>
      </main>  
    <script src="/js/nav.js"></script>
  </body>
</html>