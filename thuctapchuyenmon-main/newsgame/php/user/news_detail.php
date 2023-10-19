<?php 
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date_comment = date('d/m/Y - H:i:s'); 
    echo 'Now: ' . $date_comment;

    // category news database
    $sqlCateNews = 'SELECT * FROM categorynews';
    $resultCateNews = mysqli_query($conn, $sqlCateNews);
    //$rowCateNews = mysqli_fetch_array($resultCateNews);

    // news database
    if(isset($_GET['id_news'])){
        $id_news = $_GET['id_news'];

        // tăng số lượt xem bài viết lên 1
        // sẽ tăng ngay cả khi chưa thoát ra mà chỉ cần tab lại
        $sqlView = "UPDATE news SET numberOfReaders_news = numberOfReaders_news + 1 WHERE id_news = '$id_news'";
        $resultView = mysqli_query($conn, $sqlView);
    }
    $sqlNews = "SELECT * FROM news WHERE id_news = '$id_news'";
    $resultNews = mysqli_query($conn, $sqlNews);
    $rowNews = mysqli_fetch_array($resultNews);
    $view = $rowNews['numberOfReaders_news'];
    echo 'View = ' .$view + 1;

    

    
    if(isset($_GET['id_categoryNews'])){
        $id_categoryNews = $_GET['id_categoryNews'];
    }

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


    echo ' id_news = ' . $rowNews['id_news'] . 'id_categoryNews = ' . $rowNews['id_categoryNews'];


    // news database
    // $sqlNews = "SELECT * FROM news WHERE id_news = $id_news";
   
    // $resultNews = mysqli_query($conn, $sqlNews);
    // $rowNews = mysqli_fetch_array($resultNews);
    

    if(isset($_POST['submitAdd'])){
        $content_comment = $_POST['content_comment'];
        //$date_comment = date_default_timezone_set('Asia/Ho_Chi_Minh');

        if($content_comment == ""){echo '"content comment" field cannot be empty.';}

        if($id_user = $_GET['id_user']){
            $sql = "INSERT INTO commentposts(id_news, id_user, content_comment, date_comment) 
            VALUES('$id_news', '$id_news', '$content_comment', '$date_comment')";
            $result = mysqli_query($conn, $sql);
        }

        $url = 'ad_comment.php';
        header('location: ' .$url);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Detail</title>

    <<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
<body style="font-family: Helvetica, Arial, Tahoma, sans-serif;">

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


<!-- // content detail post -->
    <div class="container">
        <div class="row">

        <?php
            // news database
            // $sqlNews = "SELECT * FROM news WHERE id_news = $id_news";
        
            // $resultNews = mysqli_query($conn, $sqlNews);
            // $rowNews = mysqli_fetch_array($resultNews);
        ?>

            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <h1>
                            <b>
                                <?php
                                    echo $rowNews['title_news'] . '<br/>';
                                ?>
                            </b>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-0">
                     
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                        <?php
                            echo $rowNews['dateCreate_post'] . '<br/><br/>';
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <?php
                            echo $rowNews['description_news'];
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="text-align: justify;">
                        <?php
                            echo $rowNews['content_news'];
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-1" style=" padding: 4px;">
               
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
    </div>

    <!-- danh sách lựa chọn khác khi đọc xong -->
    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                <h3>Bài viết khác</h3>
                <hr style="height: 2px; border-width: 0; color: gray; background-color: gray;">
            </div>
        </div>
        <div class="row">
            <?php

                $rowidCateNews = $rowNews['id_categoryNews'];
                $rowidNews = $rowNews['id_news'];


                // cần biết id_categoryNews từ id_news của bài vừa đọc thông qua INNER JOIN
                $sqlBonusNews = "SELECT *, DATEDIFF(DATE(CURDATE()), DATE(dateCreate_post)) AS days_difference
                FROM news
                WHERE id_categoryNews = '$rowidCateNews'
                GROUP BY dateCreate_post, id_news, id_categoryNews, urlImage_news, title_news, content_news
                ORDER BY days_difference ASC
                LIMIT 8";
                $resultBonusNews = mysqli_query($conn, $sqlBonusNews);
                //$rowBonusNews = mysqli_fetch_array($resultBonusNews);


                if (mysqli_num_rows($resultBonusNews) > 0) {
                    //echo 'Số dữ liệu có trong bảng là ' . mysqli_num_rows($resultBonusNews) . '<br />';
                                            
                    //  hiển thị dữ liệu ra website
                    while($row = mysqli_fetch_assoc($resultBonusNews)) {

            ?>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12" style="border: 2px solid red; height: 350px; height: auto;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <a class="news_post nav-link" href="news_detail.php?id_news=<?php echo $row['id_news']; ?>">
                            
                            <img src="<?php echo $row['urlImage_news']; ?>" style="width: 100%; height: 200px;; height: 200px; object-fit: contain;"  alt="img" >
                                                                       
                        </a>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <a class="news_post nav-link" href="news_detail.php?id_news=<?php echo $row['id_news']; ?>">
                                                        
                            <b>
                                <h5><?php echo $row['title_news']; ?></h5>
                            </b>
                                                                    
                        </a>
                    </div>
                </div>

            </div>

            <?php
                    }
                }
                else {
                    echo '0 result';
                }
                        
                //  đóng kết nối
                mysqli_close($conn);
            ?>

        </div>
    </div>


<!-- banner end -->
    <div class="row" style="margin: 5% 0px">>
        <div class="col-lg-12">
            <img style="width: 100%; height: 200px;" src="https://image.freepik.com/free-vector/digital-neon-game-banner_1017-19897.jpg" alt="end game">
        </div>
    </div>


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