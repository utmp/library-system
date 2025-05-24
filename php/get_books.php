<?php
include "connection.php";

$search = mysqli_real_escape_string($db, $_GET['search']);
$category = mysqli_real_escape_string($db, $_GET['category']);

$query = "SELECT books.bookid, books.bookpic, books.bookname, category.categoryname, 
          authors.authorname, books.ISBN, books.price, quantity, status 
          FROM `books` 
          JOIN `category` ON category.categoryid=books.categoryid 
          JOIN `authors` ON authors.authorid=books.authorid";

if($category != "selectcat") {
    $query .= " WHERE books.categoryid = '$category'";
    if(!empty($search)) {
        $query .= " AND bookname LIKE '%$search%'";
    }
} else if(!empty($search)) {
    $query .= " WHERE bookname LIKE '%$search%'";
}

$result = mysqli_query($db, $query);
$output = '';

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $output .= '<div class="card">
            <img src="../images/'.$row['bookpic'].'">
            <div class="card-body">
                <h4 style="font-size: 18px;">'.$row['bookname'].'</h4>
                <p style="font-size: 18px">Price: '.$row['price'].' tl</p>
                <div class="overlay"></div>
                <div class="sub-card">
                    <p><b>Book Name: &nbsp;</b>'.$row['bookname'].'</p>
                    <p><b>Category Name: &nbsp;</b>'.$row['categoryname'].'</p>
                    <p><b>Author Name: &nbsp;</b>'.$row['authorname'].'</p>
                    <p><b>ISBN: &nbsp;</b>'.$row['ISBN'].'</p>
                    <p><b>Quantity: &nbsp;</b>'.$row['quantity'].'</p>
                    <p><b>Price:</b>'.$row['price'].' tl</p>
                    <p><b>Status: &nbsp;</b><span>'.$row['status'].'</span></p>
                </div>
            </div>
        </div>';
    }
} else {
    $output = '<p style="text-align: center; width: 100%;">Sorry! No Books found. Try searching again</p>';
}

echo $output;
?>