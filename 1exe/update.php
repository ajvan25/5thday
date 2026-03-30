<?php
require_once "db_connect.php";

$sql = "SELECT * FROM books";
$result = mysqli_query($connect, $sql);
$cards = '';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cards .= "<div>
        <div class='card' my-3'>
        <img src='pictures/{$row["picture"]}' class='card-img-top' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>{$row['title']}</h5>
            <p class='card-text'>{$row['author']}</p>
            <p class='card-text'>{$row['year']}</p>
            <p class='card-text'>{$row['genre']}</p>
            <a href='details.php?id={$row["book_id"]}' class='btn btn-primary'>Update</a>
        </div>
      </div>
    </div>";
    }
} else {
    $cards = "<h3>No data found</h3>";
}


mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col col-md-6 mx-auto">
                <a href="index.php" class="btn btn-secondary my-4">Back</a>
                <h3>Update Book</h3>
                <form method="post" enctype="multipart/form-data">
                    <!-- Update form fields go here -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control" id="author" name="author">
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="text" class="form-control" id="year" name="year">
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <input type="text" class="form-control" id="genre" name="genre">
                    </div>
                    <div class="mb-3">
                        <label for="picture" class="form-label">Picture</label>
                        <input type="file" class="form-control" id="picture" name="picture">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

        <a href="create.php" class="btn btn-primary">Create new book</a>
        <h1 class="my-3">Books List</h1>

        <div class=" row-row cols-1 row-cols-md-2 my-8 row-cols-lg-3">
            <?= $cards ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>



</html>