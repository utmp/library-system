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
    <title>Online Library Management System</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

    <div class="banner">
        <div class="form">
            <div class="form-container">
                <div class="form-btn">
                    <span onclick="login()">Login</span>
                    <span onclick="reg()">Register</span>
                    <hr id="indicator">
                </div>
                <form action="" id="loginform" method="post">
                    <input type="text" placeholder="User Name" name="student_username" required>
                    <input type="email" placeholder="Email" name="Email" required>
                    <input type="password" placeholder="Password" name="Password" id="Pass" required>
                    <span class='show-hide'><i class="fas fa-eye" id="eye"></i></span>
                    <button type="submit" class="btn" name="login" style="margin-top:-10px;">Login</button>
                    <a href="student_forgot_password.php">Forgot Password?</a>
                    <div class="signup">
                        <p>New to this website?</p><span onclick="reg()">SignUp</span>
                    </div>
                </form>
                <form action="" id="regform" method="post" enctype="multipart/form-data">
                    <input type="text" placeholder="User Name" name="student_username" required>
                    <input type="text" placeholder="Full Name" name="FullName" required>
                    <input type="email" placeholder="Email" name="Email" required>
                    <input type="password" placeholder="Password" name="Password" id="Pass-reg" style="margin-bottom: 0;" required>
                    <span class='show-hide-reg'><i class="fas fa-eye" id="eye-reg"></i></span>
                    <input type="text" name="PhoneNumber" placeholder="Phone Number" style="margin-top:-15px;" required>
                    <div class="label">
                        <label for="pic">Upload Picture :</label>
                    </div>
                    <input type="file"  name="file" class="file" value="">
                    <button type="submit" class="btn" name="register">Register</button>
                </form>
            </div>
        </div>
    </div>

    <?php
if(isset($_POST['login']))
{
    $username = mysqli_real_escape_string($db, $_POST['student_username']);
    $email = mysqli_real_escape_string($db, $_POST['Email']);
    $password = $_POST['Password'];
    
    // First verify user exists and get their data
    $sql = "SELECT studentid, student_username, password, studentpic FROM `student` 
            WHERE student_username='$username' AND Email='$email' LIMIT 1";
    $res = mysqli_query($db, $sql);
    
    if(mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        
        // Debug the retrieved data - REMOVE IN PRODUCTION
        error_log("SQL Query: " . $sql);
        error_log("Retrieved row data: " . print_r($row, true));
        
        // Make sure we have a password hash before verifying
        if(isset($row['password']) && !empty($row['password'])) {
            if(password_verify($password, $row['password'])) {
                $_SESSION['login_student_username'] = $username;
                $_SESSION['studentid'] = $row['studentid'];
                $_SESSION['pic'] = $row['studentpic'];
                ?>
                <script type="text/javascript">
                    window.location="student_dashboard.php";
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("Invalid password");
                </script>
                <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                alert("Account password not set properly");
            </script>
            <?php
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("Invalid username or email");
        </script>
        <?php
    }
}
?>
    <?php

    if(isset($_POST['register']) && !empty($_FILES["file"]["name"]))
    {

        $count=0;
        $sql="SELECT * from student";
        $res=mysqli_query($db,$sql);
        

        while($row=mysqli_fetch_assoc($res))
        {
            if($row['student_username']==$_POST['student_username'])
            {
                $count=$count+1;
            }
        }
        if($count==0)
        {
             move_uploaded_file($_FILES['file']['tmp_name'],"../images/".$_FILES['file']['name']);
        $pic = $_FILES['file']['name'];
        $hashed_password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
        mysqli_query($db,"INSERT INTO `STUDENT` VALUES('','$_POST[student_username]','$_POST[FullName]','$_POST[Email]','$hashed_password','$_POST[PhoneNumber]','$pic');");
        ?>
        
        <?php        
        }
        else
        {
            ?>
                <script type="text/javascript">
                alert("This username is already registered.");
                </script>
            <?php
        }
    }
    else if(isset($_POST['register']))
    {

        $count=0;
        $sql="SELECT * from student";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
            if($row['student_username']==$_POST['student_username'])
            {
                $count=$count+1;
            }
        }
        if($count==0)
        {
            $hashed_password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
            mysqli_query($db,"INSERT INTO `STUDENT` VALUES('','$_POST[student_username]','$_POST[FullName]','$_POST[Email]','$hashed_password','$_POST[PhoneNumber]','user2.png');");
            ?>
            <script type="text/javascript">
                alert("Registration successful");
                // console.log("Original password: <?php echo $_POST['Password']; ?>");
                // console.log("Hashed password: <?php echo $hashed_password; ?>");
            </script>
            <?php        
        }
        else
        {
            ?>
                <script type="text/javascript">
                alert("This username is already registered.");
                </script>
            <?php
        }
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

   <script src="../js/student.js"></script>
</body>
</html>