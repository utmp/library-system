<?php

	include "connection.php";
    include "student_navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="dashboard">
        <div class="dashboard-container">
            <div class="dashboard-row">
                <?php
             		$books=mysqli_query($db,"SELECT * FROM `books`");
             		$total_books=mysqli_num_rows($books);

             	?>
                <div class="dashboard-col-3">
                    <a href="student_books.php">
                        <h3><?=$total_books;?></h3>
                        Total Books
                    </a>
                </div>
                <?php
                    $requests=mysqli_query($db,"SELECT student.studentid,FullName,books.bookid,bookname,ISBN,price FROM student inner join issueinfo on student.studentid=issueinfo.studentid inner join books on issueinfo.bookid=books.bookid where issueinfo.approve='' and student.student_username='$_SESSION[login_student_username]'");
                    $total_requests=mysqli_num_rows($requests);
                ?>
                <div class="dashboard-col-3">
                    <a href="request_book.php">
                        <h3><?=$total_requests;?></h3>
                        Total Books requests
                    </a>
                </div>
                <?php
                    $var='<p style="color:yellow; background-color:red;">EXPIRED</p>';
                    $issue=mysqli_query($db,"SELECT student.studentid,FullName,books.bookid,bookname,ISBN,price FROM student inner join issueinfo on student.studentid=issueinfo.studentid inner join books on issueinfo.bookid=books.bookid where student.student_username='$_SESSION[login_student_username]' and (issueinfo.approve='Yes' or issueinfo.approve='$var')");
                    $total_issue=mysqli_num_rows($issue);

                ?>
                <div class="dashboard-col-3">
                    <a href="student_issue_info.php">
                        <h3><?=$total_issue;?></h3>
                        Total Books issued
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>