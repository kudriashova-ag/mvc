<h1 class="text-center">HOME</h1>
<a href="/news/pdf">Save as pdf</a>


<?php foreach ($news as $new) : ?>
  <article>
    <h3><a href="/news/<?= $new->id ?>"><?= $new->title ?></a></h3>
    <div><?= $new->content ?></div>
    <a href="/news/edit/<?= $new->id ?>" class="btn btn-warning">Edit</a>
    <a href="/news/remove/<?= $new->id ?>" class="btn btn-danger">Remove</a>
  </article>
  <hr>
<?php endforeach ?>