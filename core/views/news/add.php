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
  <br>
  <button type="submit" class="btn btn-primary">Опублікувати новину</button>
</form>