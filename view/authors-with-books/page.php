<h1>Authors with books</h1>
<div class="card-group">
<?php
while ($author = $authors->fetch_assoc()) {
?>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"><?php echo $author['author_name']; ?></h5>
      <p class="card-text">
      <ul class="list-group">
<?php
  $courses = selectBookssByAuthor($author['author_id']);
  while ($course = $courses->fetch_assoc()) {
?>
    <li class="list-group-item"><?php echo $book['book_number']; ?> - <?php echo $book['year']; ?> - <?php echo $book['month']; ?> - <?php echo $book['day']; ?></li>
<?php
  }
?>
      </ul>
      </p>
      <p class="card-text"><small class="text-body-secondary">Publisher: <?php echo $author['publisher']; ?></small></p>
    </div>
  </div>
<?php
}
?>
</div>
