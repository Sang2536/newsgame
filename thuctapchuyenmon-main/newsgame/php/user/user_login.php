<?php 
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');


    if(isset($_POST['submitAddUser'])){
        $email_user = $_POST['email_user'];
        $password = $_POST['password'];


        if($email_user == ""){echo '"email_user" field cannot be empty.';}
        if($password == ""){echo '"password" field cannot be empty.';}

        // login user Position_user = 'user'
        $sqlUser = "SELECT * FROM user WHERE email_user = '$email_user' AND password = '$password' AND Position_user = 'user'";
        $resultUser = mysqli_query($conn, $sqlUser);
        $rowUser = mysqli_fetch_array($resultUser);
        
         // login user Position_user = 'admin'
         $sqlAdmin = "SELECT * FROM user WHERE email_user = '$email_user' AND password = '$password' AND Position_user = 'admin'";
         $resultAdmin = mysqli_query($conn, $sqlAdmin);
         $rowAdmin = mysqli_fetch_array($resultAdmin);
         //echo 'name; ' . $rowAdmin['name_user'] . 'mail: ' . $rowAdmin['email_user'];

         // kiểm tra xem tài khoản thuộc 'user' hay 'admin'
        if (mysqli_num_rows($resultUser) > 0) {
            $urlUser = 'home.php?id_user=' .$rowUser['id_user'];
            header('location: ' .$urlUser);
        }
        else if (mysqli_num_rows($resultAdmin) > 0) {
            $urlAdmin = '../administration/ad_home.php?id_user=' .$rowAdmin['id_user'];
            header('location: ' .$urlAdmin);
        }
        else {
            echo 'That bai';
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>


    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 " style="padding: 4px; ">
            </div>

            <div class="col-xl-6 col-lg-6 col-md-9 col-sm-12" style="background-color: cyan; border-radius: 10px;">
                <form class="form" method="POST" enctype="multipart/form-data">

                    <!-- User id indentity-->
                    <br/>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">User email</label>
                        <input type="text" name="email_user" class="form-control" id="formGroupExampleInput" placeholder="Enter user email" required>
                    </div>

                    <br/>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">User password</label>
                        <input type="password" name="password" class="form-control" id="formGroupExampleInput" placeholder="Enter user pasword" required>
                    </div>

                    <br/>

                    <button type="submit" name="submitAddUser" class="btn btn-primary">Submit Add User</button>

                    <br>

                    </form>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 " style=" padding: 4px; ">
            </div>
            
        </div>
        
    <!-- banner end -->
    <div class="row " style="margin: 5% 0px ">
        <div class="col-lg-12 ">
            <img style="width: 100%; height: 200px; " src="https://image.freepik.com/free-vector/digital-neon-game-banner_1017-19897.jpg " alt="end game ">
        </div>
    </div>
</body>
</html>