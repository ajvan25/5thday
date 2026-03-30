<?php
//include "db_connect.php";
require_once "db_connect.php";
//echo "Retrieve the products";
$sql = "SELECT * FROM books";
echo $sql;
$result = mysqli_query($connect, $sql);
//var_dump($result);
$layout = '';
if (mysqli_num_rows($result) > 0) {
    //fetch data
    while ($row = mysqli_fetch_assoc($result)) {
        $layout .= "<div>
       
        <div class='card'  style='width: 18rem;'>
        <img src='{$row['picture']}' class='card-img-top' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>{$row['title']}</h5>
            <p class='card-text'>{$row['author']}</p>
            <p class='card-text'>{$row['year']}</p>
            <p class='card-text'>{$row['genre']}</p>
            <div>
            
            <a href='update.php?id={$row["book_id"]}' class='btn btn-primary'>Update</a>
             <a href='delete.php?id={$row["book_id"]}' class='btn btn-danger'>Delete</a>
             <a href='details.php?id={$row["book_id"]}' class='btn btn-primary'>Details</a>
            
        </div>
        </div>
    </div>
    ";
    }
    //$layout = 'We will fetch the datas in here';
} else {
    $layout = "<h3> No data found </h3>";
}
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
    <div class="container mt-5">
        <a href="create.php" class="btn btn-primary">Create new book</a>
        <h1 class="my-3">Books List</h1>
        <div class=" row-row cols-1 row-cols-md-2 my-8 row-cols-lg-3">
            <?= $layout ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>



</html>