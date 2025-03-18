
<articles-intro id="featured">

  <header>
    <h2 class='attention-voice'>Featured Projects & Ideas</h2>

    <p class='calm-voice'> Explore a curated selection of innovative art and design projects, rendered to inspire.</p>
  </header>

  <article-grid>
    <?php include('articles_data.php'); ?><!-- acting as an example database -->

    <?php foreach ($database as $article) { ?> 
      <?php include('article-card.php'); ?>
    <?php } ?>
  </article-grid>

</articles-intro>
