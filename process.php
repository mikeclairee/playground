<?php

    include "conn.php";
    session_start();

    // This code is for registration
    if(isset($_POST['reg_button'])){

        $name=$_POST["nm"];
        $email=$_POST["email"];
        $pass=$_POST["pass"];
        $pn=$_POST["pn"];


        $insertuser=mysqli_query($conn, "INSERT INTO user
        VALUES('0','$name','$email','$pass','$pn')");

        if($insertuser==TRUE) {
            ?>
            <script>
                alert("Your Registration was Successful!");
                window.location.href="index.php";
            </script>
            <?php

        }else{
            ?>
            <script>
                alert("Error Registration!\nTry Again!");
                window.location.href="reg.php";
            </script>
            <?php

        }

    } //This is the closing of registration


    //This is for Login!

    if(isset($_POST['login'])) {
        $email=$_POST['login_email'];
        $pass=$_POST['login_pass'];

        $check=mysqli_query($conn, "SELECT * FROM user
        WHERE email='$email' AND password='$pass'");

        $num=mysqli_num_rows($check);

        if($num>=1) {
            $_SESSION['email']=$email;
            ?>
            <script>
                alert("Account Accepted! Welcome Users!");
                window.location.href="userhome.php";
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Email or Password not Found!");
                window.location.href="index.php";
            </script>
            <?php
        }

    }


    //Update user / account
    if(isset($_POST['update_account'])){

        $id = $_GET['id'];        
        $upname = $_POST['up_name'];
        $upemail = $_POST['up_email'];
        $uppass = $_POST['up_pass'];
        $uppn = $_POST['up_pn'];

        $updateacacount=mysqli_query($conn, "UPDATE user SET name='$upname',
        email='$upemail', password='$uppass', phone_number='$uppn'
        WHERE id='$id'");

        if($updateacacount==true){
            ?>
            <script>
                alert("Data was change!");
                window.location.href="userhome.php";
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Data was not change!");
                window.location.href="update_profile.php";
            </script>
            <?php
        }

    }


    if(isset($_POST['create_post'])) {

        $title = $_POST['title'];
        $date = $_POST['mydate'];
        $desc = $_POST['desc'];
        $posted_by = $_POST['posted_by'];

        $insertpost = mysqli_query($conn, "INSERT INTO post 
        VALUES ('0','$title','$date','$desc','$posted_by')");

        if($insertpost==true) {
            
            ?>
            <script>
                alert("Post was inserted in the DB!");
                window.location.href="userhome.php"
            </script>
            <?php

        }else{

            ?>
            <script>
                alert("Error in Posting!");
                window.location.href="createpost.php"
            </script>
            <?php

        }

    }

?>