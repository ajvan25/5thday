<?php
require_once "db_connect.php";
if (!isset($_GET['id'])) {
    $id = $_GET['id'];

    // query to get one book details
    $sql = "SELECT * FROM books WHERE book_id = $id";
    $result = mysqli_query($connect, $sql); //click go button to run the query

    if (mysqli_num_rows($result) == 1) {
        // show the details of the book
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
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
        <h1> Product Details </h1>
        <div class="card my-3">
            <img src="pictures/<?= $row['picture'] ?>" class="card-img-top" alt="<?= $row['title'] ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $row['title'] ?></h5>
                <p class="card-text"><?= $row['author'] ?></p>
                <p class="card-text"><?= $row['year'] ?></p>
                <p class="card-text"><?= $row['genre'] ?></p>
                <a href="index.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>



</html