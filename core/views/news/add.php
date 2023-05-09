<h1 class="text-center">Додати новину</h1>
<form method="POST" action="/news/store">

  <div class="form-group">
    <label for="title">Заголовок:</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>

  <div class="form-group">
    <label for="content">Зміст:</label>
    <textarea class="form-control" id="content" name="content" rows="5"></textarea>
  </div>

  <div class="form-group">
    <label for="category">Category:</label>
    <select class="form-control" id="category" name="category">
      <?php foreach ($categories as $category) : ?>
        <option value="<?= $category->id ?>"><?= $category->name ?></option>
      <?php endforeach ?>
    </select>
  </div>

  <button type="submit" class="btn btn-primary mt-5">Опублікувати новину</button>
</form>