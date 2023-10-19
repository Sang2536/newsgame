<?php 
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');
    //require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/user/get_userLogin.php');
    

    // news database
    $sqlNews = 'SELECT *, DATEDIFF(DATE(CURDATE()), DATE(dateCreate_post)) AS days_difference
    FROM news
    GROUP BY dateCreate_post, id_news
    HAVING DATEDIFF(DATE(CURDATE()), DATE(dateCreate_post)) >= 0
    ORDER BY days_difference ASC
    LIMIT 3';
    $resultNews = mysqli_query($conn, $sqlNews);
    $rowNews = mysqli_fetch_assoc($resultNews); // lấy data đầu tiên của câu truy vấn SQL
    // Khi lặp sẽ bỏ qua data này và lấy từ data kế tiếp

    //echo '<br/><br/>id_categoryNews' . $rowNews['id_categoryNews'];


    // news database
    $sqlCateNews = 'SELECT * FROM categorynews';
    $resultCateNews = mysqli_query($conn, $sqlCateNews);
    //$rowCateNews = mysqli_fetch_array($resultCateNews);


    // user database
    if(isset($_GET['id_user'])){
        $id_user = $_GET['id_user'];
    }
    else {
        $id_user = null;
    }
    $sqlUserLogin = "SELECT * FROM user WHERE id_user = '$id_user'";
    $resultUserLogin = mysqli_query($conn, $sqlUserLogin);
    $rowUserLogin = mysqli_fetch_array($resultUserLogin);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>

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
<body style="font-family: Helvetica, Arial, sans-serif;">

  <div div class="container">
        <div class="row" style="left: 0; top: 0; right: 0; position: fixed; z-index: 100000; width: 100%;">
            <!-- menu user -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                </div>
                <nav class="navbar navbar-expand-md bg-dark navbar-dark" style="text-align: center;">
                    
                    <a class="nav-link" href="home.php" >
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
                                if (mysqli_num_rows($resultCateNews) > 0) {
                                    //  hiển thị dữ liệu ra website
                                    while($rowCateNews = mysqli_fetch_assoc($resultCateNews)) { 
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $rowCateNews['link_categoryNews'] ?>"> <?php echo $rowCateNews['name_categoryNews'] ?></a>
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
                    <div>
                        <form class="form-inline" method="POST">
                            <div class="form-group mx-lg-3 mb-2">
                                <label for="inputPassword2" class="sr-only">Key word</label>
                                <input type="text" name="searchField" class="form-control" id="inputPassword2" placeholder="Key word" required>
                            </div>
                            <button type="submit" name="searchBtn" class="btn btn-primary mb-2">Tìm kiếm</button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- header -->
    <div class="container">

        <div class="row" style="text-align: center; background-color: lightseagreen; margin-top: 100px;">
            <!-- logo -->
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                <a href="">
                    <img style="width:100%; height: 70px;" src="https://gameviet.mobi/wp-content/uploads/2020/02/download-hinh-nen-lien-quan-mobile-gameviet.mobi_-1280x640.jpg" alt="logo">
                </a>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
            <br/><br/>
                <h1>Game world news site</h1>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                        <br/><br/>
                        
                        <?php 
                            if (mysqli_num_rows($resultUserLogin) > 0) {
                        ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                <?php echo $rowUserLogin['email_user']; ?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Đăng nhập</a></li>
                                <li><a class="dropdown-item" href="#">Đăng ký</a></li>
                                <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                            </ul>
                        </div>  
                        <?php
                            }
                            else {
                                echo '';
                        ?>
                        
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                Tài khoản
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Đăng nhập</a></li>
                                <li><a class="dropdown-item" href="#">Đăng ký</a></li>
                            </ul>
                        </div>
                        <?php
                            }
                        ?>
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
    </div>


    <div class="container">
        <div class="row">
            <?php

                if(isset($_GET['id_game'])){
                    $id_game = $_GET['id_game'];
                }
                else {
                    $id_game = null;
                }
                $sqlGame = "SELECT * FROM games WHERE id_game = '$id_game'";
                $resutlGame = mysqli_query($conn, $sqlGame);
                $rowGame = mysqli_fetch_array($resutlGame);

            ?>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                <div class="row " style="height: 300px;;">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <img src="<?php echo $rowGame['urlImage_game']; ?>"style="width: 100%; height: 250px; box-shadow: 5px 5px 5px silver;" alt="img game">
                        <p style="font-size: 20px; font-weight: 700; text-align: center;"><?php echo $rowGame['name_game']; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <p><?php echo 'Thể loại: ' . $rowGame['category_game']; ?></p>
                                <p><?php echo 'Đồ họa: ' . $rowGame['graphics_game']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12" style="text-align: justify;">
                <p><?php echo $rowGame['overview_game']; ?></p>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12">
                <p style="font-size: 25px;">GAME KHÁC</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12">
                <hr style="height: 2px; border-width: 0; color: gray; background-color: gray;">
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <?php
                $sqlGame = "SELECT * FROM games LIMIT 4";
                $resultGame = mysqli_query($conn, $sqlGame);

                if(mysqli_num_rows($resultGame) > 0) {
                    while($row = mysqli_fetch_assoc($resultGame)){
            ?>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="row" style="height: 400px; margin-top: 50px;">
                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                        <div class="row " style="height: 300px;;">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 game">
                                <a href="detail_game.php?id_game=<?php echo $row['id_game']; ?>">
                                    <img src="<?php echo $row['urlImage_game']; ?>"style="width: 100%; height: 250px;" alt="img game">
                                    <p style="font-size: 20px; font-weight: 700; text-align: center;"><?php echo $row['name_game']; ?></p>
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <p><?php echo 'Thể loại: ' . $row['category_game']; ?></p>
                                        <p><?php echo 'Đồ họa: ' . $row['graphics_game']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <hr style="height: 2px; border-width: 0; color: gray; background-color: gray;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                    }
                }
                else {
                    
                }
            ?>
        </div>
    </div>


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