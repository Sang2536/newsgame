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

 
    // truy vấn bảng adminmenu
    $sqlAdminMenu = 'SELECT * FROM adminmenu';
    $resultAdminMenu = mysqli_query($conn, $sqlAdminMenu);
    //$rowCateNews = mysqli_fetch_array($resultCateNews);


    // lấy thông tin user từ SESSION sau khi người dùng đăng nhập
    if(isset($_SESSION['email_user'])){
        $email_user = $_SESSION['email_user'];
    }
    else {
        header('Location: user_login.php');
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
            $sqlTitle = "SELECT * FROM adminmenu WHERE link_adminmenu = '$p'";
            $queryTitle = mysqli_query($conn, $sqlTitle);
            $rowTitle = mysqli_fetch_array($queryTitle);
            echo $rowTitle['name_adminmenu']; 
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

    <div class="container">
        <div class="row justify-content-center" style="margin: 50px 0px 50px 0px; text-align: center;">
            <div class="col-lg-4">
                <a href="/newsgame/php/administration/ad_news_add.php" class="btn btn-primary stretched-link">Add News</a>       
            </div>

            <div class="col-lg-4">
                <a href="ad_future_posts.php" class="btn btn-primary stretched-link">Future Post</a>       
            </div>

            <!-- search id and id_category -->
            <div class="col-lg-4">
                <form class="form-inline" method="POST">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Key word</label>
                        <input type="tect" name="searchNews" class="form-control" id="inputPassword2" placeholder="Search 'id_new' or 'id_categoryNews'">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                </form>
            </div>
        </div>
    </div>


    <!-- content file khác -->
    <?php 
        switch($p) {
            case "tournaments":
                require "../user/tournaments.php";
                break;
            case "gamers_streamers":
                require "../user/gamers_streamers.php";
                break;
            case "game_guide":
                require "../user/game_guide.php";
                break;
            case "daily_life":
                require "../user/daily_life.php";
                break;
            case "games":
                require "../user/games.php";
                break;
            case "picture":
                require "../user/picture.php";
                break;
            default:
                require "../user/viduindes.php";
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