<?php
    session_start();

    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');
    //require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/user/get_userLogin.php');

    // kiểm tra xem url có p hay không
    if(isset($_GET["p"])) {
        $p = $_GET["p"];
    } else {
        $p = "";
    }

    // lấy thông tin user từ SESSION sau khi người dùng đăng nhập
    if(isset($_SESSION['email_user'])){
        $email_user = $_SESSION['email_user'];
    }
    else {
        $url = "../user/user_login.php";
        header('location: ' .$url);
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            if($p != ""){
                $sqlTitle = "SELECT * FROM adminmenu WHERE link_adminMenu = '$p'";
                $queryTitle = mysqli_query($conn, $sqlTitle);
                $rowTitle = mysqli_fetch_array($queryTitle);
                echo $rowTitle['name_adminMenu'];
            } else if ($p = "ad_home.php" || $p = ""){
                echo 'Trang chủ';
            }
           
        ?>
    </title>

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

        .list-3:hover {
            border-left: 3px solid red;
        }
    </style>

</head>
<body style="font-family: Helvetica, Arial, sans-serif;">
    
    <div class="container">
        <div class="row" style="left: 0; top: 0; position: fixed; z-index: 100000; width: 100%; background-color: #333333;">
            <!-- menu user -->
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
                
                <nav class="navbar navbar-expand-md bg-dark navbar-dark" style="text-align: center; border-right: 3px solid red;">
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar" >
                        <ul class="navbar-nav">
                            <li>
                                <a class="nav-link" href="../administration/?p=ad_home.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                                    </svg>
                                </a>
                            </li>
                            <?php 
                                // truy vấn bảng adminmenu
                                $sqlAdmin = 'SELECT * FROM adminmenu';
                                $resultAdmin = mysqli_query($conn, $sqlAdmin);

                                if (mysqli_num_rows($resultAdmin) > 0) {
                                    //  hiển thị dữ liệu ra website
                                    while($rowAdmin = mysqli_fetch_assoc($resultAdmin)) { 
                            ?>
                            <li class="nav-item" style="border-left: 1px solid red;">
                                <a class="nav-link <?php $rowAdmin['link_adminMenu']; ?>" href="?p=<?php echo $rowAdmin['link_adminMenu']; ?>"> <?php echo $rowAdmin['name_adminMenu']; ?></a>
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
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12" style="text-align: center; right: 0; bottom: o;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <br/>
                        
                        <?php 
                            if ($email_user != "") {
                        ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                <?php echo $email_user ?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="../user/user_logout.php">Đăng xuất</a></li>
                            </ul>
                        </div>
                        <?php
                            }
                        ?>
                </div>      
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-10">
                
            </div>
        </div>
    </div>


    <!-- header -->
    <div class="container">

        <div class="row" style="text-align: center; background-color: lightseagreen; margin-top: 100px;">
            <!-- logo -->
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                <a href="">
                    <img style="width:100%; height: 100%;" src="https://gameviet.mobi/wp-content/uploads/2020/02/download-hinh-nen-lien-quan-mobile-gameviet.mobi_-1280x640.jpg" alt="logo">
                </a>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
            <br/><br/>
                <p style="text-shadow: 5px 5px 5px silver; font-size: 50px; font-family:'Courier New', Courier, monospace; font-style: italic;">Game world news site</p>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                <!-- bên phải logo và chữ -->
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
    </div>



    <!-- content từ file khác -->

    <?php 
        switch($p) {
            case "ad_category_news.php":
                require "../administration/ad_category_news.php";
                break;
            case "ad_category_image.php":
                require "../administration/ad_category_image.php";
                break;
            case "ad_games.php":
                require "../administration/ad_games.php";
                break;
            case "ad_image.php":
                require "../administration/ad_image.php";
                break;
            case "ad_news.php":
                require "../administration/ad_news.php";
                break;
            case "ad_user.php":
                require "../administration/ad_user.php";
                break;
            default:
                require "../administration/ad_home.php";
                break;
        }
    ?>
    
    
    <!-- banner end -->
    <div class="container">
        <div class="row" style="margin: 5% 0px">
            <div class="col-lg-12">
                <img style="width: 100%; height: 200px;" src="https://image.freepik.com/free-vector/digital-neon-game-banner_1017-19897.jpg" alt="end game">
            </div>
        </div>
    </div>
   

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