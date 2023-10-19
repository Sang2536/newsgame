<?php
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');
    session_start();


    if(isset($_SESSION['email_user']) && isset($_SESSION['password'])){
        $email_user = $_SESSION['email_user'];
        $password = $_SESSION['password'];

        echo 'Email: ' . $_SESSION['email_user'] . '<br/>Password: ' .$_SESSION['password'];
    }
    else {
        $urlUser = 'vidu_1.php';
        header('location: ' .$urlUser);
    }

    if(isset($_POST['btnNext'])){
        $urlUser = 'vidu_3.php';
        header('location: ' .$urlUser);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vidu 2</title>
</head>
<body>
    <p style="background-color: lightseagreen; color:red;">
        <?php  echo $_SESSION['email_user']; ?>
    </p>

    <form class="form" method="POST" enctype="multipart/form-data">
        <button type="submit" name="btnNext" class="btn btn-primary">Next</button>
    </form>
    
</body>
</html>