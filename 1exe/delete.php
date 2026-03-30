<?php
require_once "db_connect.php";
$id = $_GET['book_id'];
//finding the product by id
$sql = "SELECT * FROM books WHERE book_id = $id";
$result = mysqli_query($connect, $sql ); //click go button to run the query
//fetching the data
$row = mysqli_fetch_assoc($result);
if ($row['picture'] != "book.jpg") {
    unlink($row['picture']);
}
$delete = "DELETE FROM books WHERE book_id = $id";




if (mysqli_query($conn, $delete)) {
    header("Location: index.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
