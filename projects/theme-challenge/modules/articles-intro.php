
<articles-intro>

  <header>
    <h2 class='attention-voice'>Our Work</h2>

    <p class='calm-voice'>Take a peek at some spaces we've transformed.</p>
  </header>

  <article-grid>
    <?php include('articles_data.php'); ?><!-- acting as an example database -->

    <?php foreach ($database as $article) { ?> 
      <?php include('article-card.php'); ?>
    <?php } ?>
  </article-grid>

</articles-intro>
