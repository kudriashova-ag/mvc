<h1 class="text-center">HOME</h1>

<?php foreach ($categories as $category) : ?>
  <article>
    <h3><?= $category->name ?></h3>
  </article>
<?php endforeach ?>



<?php foreach ($news as $new) : ?>
  <article>
    <h3><a href="/news/<?= $new->id ?>"><?= $new->title ?></a></h3>
    <div><?= $new->content ?></div>
  </article>
<?php endforeach ?>