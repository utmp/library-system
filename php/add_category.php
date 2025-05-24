<?php

	include "connection.php";
    include "admin_navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="edit-profile-container">
        <div class="form">
            <div class="form-container">
                <div class="form-btn form-password">
                    <span onclick="login()" style="width: 100%;">Add Category</span>
                    <hr id="indicator" class="indi-password add-author">
                </div>
                <form action="" id="loginform" method="post">
                    <input type="text" placeholder="Category Name" name="categoryname" required>
                    <button type="submit" class="btn" name="add">Add</button>
                </form>
            </div>
        </div>
    </div>
    <?php
		if(isset($_POST['add']))
		{

			mysqli_query($db,"INSERT INTO category VALUES('','$_POST[categoryname]') ;");
			?>
			<script type="text/javascript">
				
				alert("Category added successfully.");
			</script>
			<?php

		}

	?>
    <div class="footer">
        <div class="footer-row">
            <div class="footer-left">
                <h1>Opening Hours</h1>
                24/7 open
            </div>
            <div class="footer-middle">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d446.1963192461604!2d32.657594692552216!3d41.207841543378066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4083535a4c97b665%3A0xbeb2785ee29c578!2zS2FyYWLDvGsgw5xuaXZlcnNpdGVzaSBLYW1pbCBHw7xsZcOnIEvDvHTDvHBoYW5lc2k!5e0!3m2!1str!2str!4v1747988563845!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
            <div class="footer-right">
                <h1>Get In Touch</h1>
                <p>Kılavuzlar Mahallesi 413. Sokak No: 10 Karabük Üniversitesi Merkez Kampüsü<i class="fas fa-map-marker-alt"></i></p>
                                <a href="https://kutuphane.karabuk.edu.tr/index.aspx" style="color:black">website<i class="fas fa-paper-plane"></i></a>

                <p>444 0 478<i class="fas fa-phone-alt"></i></p>
            </div>
        </div>
        <div class="social-links">
            <a href="https://www.instagram.com/kbukutuphane"><i class="fab fa-instagram-square"></i></a>
            <a href="https://www.youtube.com/@KBUKamilGulecKutuphanesi"><i class="fab fa-youtube"></i></a>
            <p>&copy; 2025 Copyright by Karabuk</p>
        </div>
    </div>
</body>
</html>