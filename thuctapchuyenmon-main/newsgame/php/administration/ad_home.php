<?php
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');


    $sqlAdminMenu = 'SELECT * FROM adminmenu';
    $resultAdminMenu = mysqli_query($conn, $sqlAdminMenu);


    if(isset($_GET['id_user'])){
        $id_user = $_GET['id_user'];
    }
    else {
        $id_user = null;
    }
    $sqlUserLogin = "SELECT * FROM user WHERE id_user = '$id_user'";
    $resultUserLogin = mysqli_query($conn, $sqlUserLogin);
    $rowUserLogin = mysqli_fetch_array($resultUserLogin);

    //echo 'name user: ' . $rowUserLogin['name_user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administration Home</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        a:hover{
            color: red;
        }

        img:hover {
            opacity: 0.5;
        }

    </style>

</head>

<body>
    <!-- header -->
    <div class="container">
        <div class="row" style="text-align: center; background-color: lightseagreen;">
            <!-- logo -->
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                <a href="">
                    <img style="width:100%; height: 70px;" src="https://gameviet.mobi/wp-content/uploads/2020/02/download-hinh-nen-lien-quan-mobile-gameviet.mobi_-1280x640.jpg" alt="logo">
                </a>
            </div>

            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
            <br/><br/>
                <h1>Game world news site</h1>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-2 col-sm-12">
                        <br/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-2 col-sm-12">
                    <?php 
                            if (mysqli_num_rows($resultUserLogin) > 0) {
                                echo $rowUserLogin['email_user'];
                            }
                            else {
                                echo '';
                            }
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-2 col-sm-12">
                        <a href="logout.php">Logout</a> 
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12">
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                <hr style="height: 2px; border-width: 0; color: gray; background-color: gray;">
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
            </div>
        </div>
        
        <div class="row">
            <!-- menu user -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                </div>
                <nav class="navbar navbar-expand-md bg-dark navbar-dark" style="text-align: center;">
                    
                    <a class="nav-link" href="ad_home.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <?php 
                                if (mysqli_num_rows($resultAdminMenu) > 0) {
                                    //  hiển thị dữ liệu ra website
                                    while($row = mysqli_fetch_assoc($resultAdminMenu)) { 
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $row['link_adminMenu']; ?>"> <?php echo $row['name_adminMenu']; ?></a>
                            </li>
                            <?php
                                    }
                                }
                                else {
                                    echo '0 result';
                                }
                            ?>

                        </ul>
                    </div>
                </nav>

            </div>
        </div>
    </div>

    
<!-- slider start-->
<div class="container">
        <div class="row" style="margin: 50px 0;">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">

                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="http://i.imgur.com/gNx0td7.jpg" alt="Los Angeles" width="1100" height="500">
                    </div>
                    <div class="carousel-item">
                        <img src="https://img2.2game.info/re/l/skyrimspecialedition/images/mod/14031/1605681779.jpeg" alt="Chicago" width="1100" height="500">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.tgdd.vn/2020/05/content/bo-hinh-nen-valorant-dep-mat-cho-may-tinh-dien-thoai-game-thu-khong-nen-bo-qua-background-800x450-1.jpg" alt="New York" width="1100" height="500">
                    </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
 
            </div>
        </div>
    </div>



    <!-- content -->
    

    <!-- footer -->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3>About Us</h3>
                <p>We bring the most accurate and fastest news possible to you</p>
                <p>Hope what we do can help you in some way.</p>
                <p>Thank you for coming to us</p>
            </div>
            <div class="col-sm-4">
                <h3>Tutorial</h3>
                <p><a href="">Home</a></p>
                <p><a href="">Image game</a></p>
                <p><a href="">News</a></p>
                <p><a href="">Category game</a></p>
            </div>
            <div class="col-sm-4">
                <h3>Contact</h3>
                <p>Email: dovansang2536@gmail.com</p>
                <p>Phone Number: 1234567890</p>
                <p>Group Facebook: news game (null)</p>
            </div>
        </div>
    </div>
</body>

</html>