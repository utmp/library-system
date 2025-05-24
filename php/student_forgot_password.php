<?php

    include "connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library Management System</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                   <a href="index.php"><img src="../images/logo2.jpg" alt="Logo" style="border-radius: 50%;"></a> 
                </div>
                <div class="title">
                <a href="index.php"><h3>Online Library Management System</h3></a>
                </div>
                <nav>
                    <ul id="menuitems">
                        <li><a href="index.php"><i class="fas fa-home"></i>  Home</a></li>
                        <li><a href=""><i class="fas fa-book"></i> Books</a></li>
                        <li><a href="admin.php"><i class="fas fa-user-shield"></i> Admin</a></li>
                        <li><a href="student.php"><i class="fas fa-users"></i> Student</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="banner">
        <div class="form">
            <div class="form-container">
                <div class="form-btn form-password">
                    <span onclick="login()" style="width: 100%;">Recover Password</span>
                    <hr id="indicator" class="indi-password">
                </div>
                <form action="" id="loginform" method="post">
                    <input type="text" placeholder="User Name" name="student_username" required>
                    <input type="email" placeholder="Email" name="Email" required>
                    <input type="password" placeholder="Enter New Password" name="password" id="forgot" required>
                    <span class='show-hide-forgot'><i class="fas fa-eye" id="eye-forgot"></i></span>
                    <button type="submit" class="btn" name="change">Change</button>
                </form>
            </div>
        </div>
    </div>

    <?php

		if(isset($_POST['change']))
		{

			$res=mysqli_query($db,"SELECT * FROM `student` WHERE student_username='$_POST[student_username]' AND Email='$_POST[Email]' ;");
			$count=mysqli_num_rows($res);
			if($count==0)
			{
				?>
				<script type="text/javascript">
					alert("The username or email doesn't match.");

				</script>
				<?php
			}
			else
			{
				if(mysqli_query($db,"UPDATE student SET Password='$_POST[password]' WHERE student_username='$_POST[student_username]' AND Email='$_POST[Email]';"))
				{
					?>
					<script type="text/javascript">
						alert("Your Password is successfully changed");
					</script>
				<?php
				}
			}
	
			
		}

	?>
    <div class="footer">
        <div class="footer-row">
            <div class="footer-left">
                <h1>Opening Hours</h1>
                24/7 open
            </div>
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
    <script>
        var pass2 = document.getElementById("forgot");
        var showbtn2 = document.getElementById("eye-forgot");
        showbtn2.addEventListener("click",function(){
            if(pass2.type === "password"){
                pass2.type = "text";
                showbtn2.classList.add("hide");
            }
            else{
                pass2.type = "password";
                showbtn2.classList.remove("hide");
            }
        });
    </script>
</body>
</html>