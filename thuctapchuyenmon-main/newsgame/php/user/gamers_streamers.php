<?php 
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');
    //require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/user/get_userLogin.php');

    /// news database
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

    // news database
    $sqlNews = 'SELECT *, DATEDIFF(DATE(CURDATE()), DATE(dateCreate_post)) AS days_difference
    FROM news 
    WHERE id_categoryNews = 2
    GROUP BY dateCreate_post
    HAVING DATEDIFF(DATE(CURDATE()), DATE(dateCreate_post)) >= 0
    ORDER BY days_difference ASC
    LIMIT 3';
    $resultNews = mysqli_query($conn, $sqlNews);
    $rowNews = mysqli_fetch_assoc($resultNews);
    echo $rowNews['id_news'] . ' - ' . $rowNews['dateCreate_post'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamers And Streamers</title>

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


    <div class="container">
        <div class="row" style="left: 0; top: 0; right: 0; position: fixed; z-index: 100000; width: 100%;">
            <!-- menu user -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                </div>
                <nav class="navbar navbar-expand-md bg-dark navbar-dark" style="text-align: center;">
                    
                    <a class="nav-link" href="home.php">
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
        <div class="row" style="text-align: center; margin-top: 100px; background-color: lightseagreen;">
            <!-- logo -->
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                <a href="">
                    <img style="width:100%; height: 70px;" src="https://gameviet.mobi/wp-content/uploads/2020/02/download-hinh-nen-lien-quan-mobile-gameviet.mobi_-1280x640.jpg" alt="logo">
                </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <br/><br/>
                <h1>Game world news site</h1>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
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


   <!-- search khi có key word, bình thường sẽ ẩn-->
<!-- // sự kiện khi nhấn button search -->

<?php
    if(isset($_POST['searchBtn'])){
        $searchField = $_POST['searchField'];
    
        // kiểm tra xem có dữ liệu nhập vào không
        if($searchField != ''){
            //echo 'key word:  ' . $searchField;
            
            $sqlSearch = "SELECT * 
            FROM news 
            WHERE title_news LIKE '%" . $_POST['searchField'] ."%' OR description_news LIKE '%" . $_POST['searchField'] ."%' 
            LIMIT 0, 25";
            $resultSearch = mysqli_query($conn, $sqlSearch);
            
            // $url = 'search.php?searchField=' .$searchField;
            // header('location: ' .$url);
?>
<div class="container" style="background-color: silver; margin-top: 50px; box-shadow: 5px 10px 5px #888888;">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 ">
                <h1>KẾT QUẢ TÌM KIẾM</h1>
                <hr style="height: 2px; border-width: 0; color: gray; background-color: gray;">
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 ">
            </div>
        </div>

        <div class="row">
            <?php

                    if (mysqli_num_rows($resultSearch) > 0) {
                                        
                        //  số dữ liệu của bảng ... có trong db
                        //echo 'Số dữ liệu có trong bảng là ' . mysqli_num_rows($resultNews) . '<br /><br />';
                        
                        //  hiển thị dữ liệu ra website
                        while($row = mysqli_fetch_assoc($resultSearch)) {
            ?>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="row" style="height: auto; border-left: 2px solid red;">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12" style="height: fit-content">
                        <a href="news_detail.php?id_news=<?php echo $row['id_news']; ?>">
                            <img src="<?php echo $row['urlImage_news']; ?>" style="width: 100%; height: 100px;"  alt="img" >
                        </a>
                    </div>

                    <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12" style="height:fit-content;">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                                <a href="news_detail.php?id_news=<?php echo $row['id_news']; ?>">
                                    <h3><?php echo $row['title_news']; ?></h3>
                                </a>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                                <p style="float: right;">
                                    <i>
                                        <?php echo $row['dateCreate_post']; ?>
                                    </i>
                                </p>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                                <p style="font-size: 15px;">
                                    <i>
                                    <?php echo $row['description_news']; ?> 
                                    </i>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
            </div>
            <?php
                        }
                    }
                    else {
                        echo '0 result';
                    }
            ?>
        </div>
    </div>
    <?php
            }
            else {
                echo 'Vui lòng nhập vào "Key word"';
            }
        }
    ?>

<!-- cotent gamers & streamers -->
<div class="container">
        <div class="row justify-content" style="width: 100%; height: auto; margin-bottom: 100px; margin-top: 50px;" style="background-color: lightseagreen;">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 news_big" style="padding-right: 0px 10px; margin-bottom: 30px;">
                
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <a class="news_post nav-link" href="news_detail.php?id_news=<?php echo $rowNews['id_news']; ?>">
                            
                            <img src="<?php echo $rowNews['urlImage_news']; ?>" style="width: 100%;"  alt="img" >
                            
                            <h3><?php echo $rowNews['title_news']; ?></h3>
                        
                        </a>
                    </div>
                </div>         

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <p><?php echo $rowNews['description_news']; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <h6 style="padding-left: 50%;"><?php echo $rowNews['dateCreate_post']; ?></h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                <?php
                     if (mysqli_num_rows($resultNews) > 0) {
                        while($row = mysqli_fetch_assoc($resultNews)) {
                ?>
                
                <div class="row">
                    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12" style="text-align: justify;">
                         <!-- echo 'id: ' . $row['id_news']; ?> -->
                        <a class="news_post nav-link" href="news_detail.php?id_news=<?php echo $row['id_news']; ?>">
                            
                            <img src="<?php echo $row['urlImage_news']; ?>" style="width: 100%; height: auto;"  alt="img" >
                            
                            <h5><?php echo $row['title_news']; ?></h5>
                        
                        </a>
                        <p style="float: right;"><?php echo $row['dateCreate_post']; ?></p>
                        <br/>
                        <hr style="height: 2px; border-width: 0; color: gray; background-color: gray;">
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-6 col-sm-12">
                    </div>
                </div>
                
                <?php
                        }
                    }
                    else {
                        echo '0 result';
                    }
        
                ?>
            </div>
            
           

            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12" style="padding: 4px; margin-top: 30px;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                       <p style="background-color: darkcyan; border-left: 7px solid red; font-size: 25px; font-weight: 700; text-align: center;">
                            Game ngẫu nhiên
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                        <br/>
                        <?php 
                            $sqlGame = 'SELECT * FROM games';
                            $resultGame = mysqli_query($conn, $sqlGame);

                            //echo mysqli_num_rows($resultGame) . '<br/>';
                            
                            $random = rand(1, mysqli_num_rows($resultGame)); // lấy ra id
                            //echo $random . '<br/>';

                            $sqlRandomGame = "SELECT * FROM games WHERE id_game = '$random'";
                            $resultRandomGame = mysqli_query($conn, $sqlRandomGame);
                            $rowRandomGame = mysqli_fetch_array($resultRandomGame);
                        ?>

                        <a class="news_post nav-link" href="detail_game.php?id_news=<?php echo $rowRandomGame['id_game']; ?>">
                            <img src="<?php echo $rowRandomGame['urlImage_game']; ?>" style="width: 100%; height: auto;" alt="error">
                            <b>
                                <p style="text-align: center; font-size: 20px;"> <?php echo $rowRandomGame['name_game'] ?></p>
                            </b>
                        </a>
                        <div>
                            <b>
                                <p>Thể loại: <?php echo $rowRandomGame['category_game']; ?></p>
                                <p>Đồ họa: <?php echo $rowRandomGame['graphics_game']; ?></p>
                            </b>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 "> 
                <h1>Tin khác</h1>
                <hr style="height: 2px; border-width: 0; color: gray; background-color: gray;">
            </div>
        </div>


        <div class="row" style="margin-top: 50px;">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 "> 
                <?php
                    $sql = 'SELECT *, DATEDIFF(DATE(CURDATE()), DATE(dateCreate_post)) AS days_difference
                    FROM news 
                    WHERE id_categoryNews = 2
                    GROUP BY dateCreate_post, id_news, description_news
                    ORDER BY days_difference ASC
                    LIMIT 4, 10';

                    $query = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($resultNews) > 0) {
                                        
                        //  hiển thị dữ liệu ra website
                        while($row = mysqli_fetch_assoc($query)) {
                ?>

                <div class="row" style="margin-bottom: 20px; height: 200px;">
                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                        <a class="news_post nav-link" href="news_detail.php?id_news=<?php echo $row['id_news']; ?>">
                                            
                            <img src="<?php echo $row['urlImage_news']; ?>" style="width: 100%;"  alt="img">
                                            
                        </a>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 " style="text-align: justify;">
                        <a class="news_post nav-link" href="news_detail.php?id_news=<?php echo $row['id_news']; ?>">
                                           
                            <h5><?php echo $row['title_news']; ?></h5>
                                  
                        </a>

                        <p style="float: right; font-size: 15px;">
                            <i>
                            <?php echo $row['dateCreate_post']; ?>
                            </i>
                        </p>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 ">

                    </div>
                </div>
                <hr style="height: 2px; border-width: 0; color: gray; background-color: gray;">

                <?php
                        }
                    }
                    else {
                        echo '0 result';
                    }
            
                ?>
            </div>

            <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 " >
            </div>

            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 " >
                <?php 
                    $sqlImg = 'SELECT * FROM image';
                    $resultImg = mysqli_query($conn, $sqlImg);

                    //echo mysqli_num_rows($resultGame) . '<br/>';
                            
                    $randomImg = rand(1, mysqli_num_rows($resultImg)); // lấy ra id
                    //echo $randomImg . '<br/>';

                    $sqlRandomImg = "SELECT * FROM image WHERE id_image = '$randomImg'";
                    $resultRandomImg= mysqli_query($conn, $sqlRandomImg);
                    $rowRandomImg = mysqli_fetch_array($resultRandomImg);
                ?>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                        <p style="font-size: 25px; border-left: 7px solid red; text-align: center; background-color: darkcyan">Ảnh</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                                <img src="<?php echo $rowRandomImg['url_image'] ?>" style="width: 100%; max-height: 250px;" alt="img eror">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- thêm 1 row hiển thị dọc ở đây nữa -->
        <div class="row" style="margin-top: 50px;">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                <!-- bắt đầu php -->
                <div class="row">
                    <!-- thử bắt đầu php từ đây xem có ngang đc k -->
                    <?php
                    $sql = 'SELECT *, DATEDIFF(DATE(CURDATE()), DATE(dateCreate_post)) AS days_difference
                    FROM news 
                    WHERE id_categoryNews = 2
                    GROUP BY dateCreate_post, id_news, title_news, description_news
                    ORDER BY days_difference ASC
                    LIMIT 4, 20';;

                    $query = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($resultNews) > 0) {
                                        
                        //  hiển thị dữ liệu ra website
                        while($row = mysqli_fetch_assoc($query)) {
                    ?>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12" style="height: 400px; text-align: justify; color: black;">
                            
                        <div class="row" style="height: 200px;">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="text-align: justify;">
                                <?php //echo 'id: ' . $row['id_news']; ?>
                                <a class="news_post nav-link" href="news_detail.php?id_news=<?php echo $row['id_news']; ?>">
                                        
                                    <img src="<?php echo $row['urlImage_news']; ?>" style="width: 100%; height: auto; max-width: 250px; object-fit: contain;"  alt="img" >
                                                        
                                </a>
                            </div>
                        </div>

                        <div class="row" style="height: auto; object-fit: contain;">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <a href="news_detail.php?id_news=<?php echo $row['id_news']; ?>">
                                    <br>
                                        <p style="color: black; height: 100px;"><?php echo $row['title_news']; ?></p>
                                    </br>
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="font-size: 15px; text-align: right;">
                                <p style="font-size: 14px;">
                                    <i>
                                        <?php echo $row['dateCreate_post']; ?>
                                    </i>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <hr style="height: 2px; border-width: 0; color: gray; background-color: gray;">
                            </div>
                        </div>
                    </div>
                     
                    <!-- kết thúc php thử ở đây -->
                        <?php
                            }
                        }
                        else {
                            echo '0 result';
                        }
                    
                        ?>
                </div>
            </div>
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