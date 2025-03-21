
<articles-intro>

  <header>
    <h2 class='attention-voice'>Latest News & Highlights</h2>

    <p class='calm-voice'>Catch up with all the action, on and off the field.</p>
  </header>

  <article-grid>
    <?php foreach ($data['articleCards'] as $card) { ?> 
      <?php include('article-card.php'); ?>
    <?php } ?>
  </article-grid>

</articles-intro>
