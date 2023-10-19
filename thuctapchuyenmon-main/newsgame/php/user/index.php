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
        $email_user = "";
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
            if($p == "" || $p == 'home.php'){
                echo 'Trang chủ';
            } else {
                $sqlTitle = "SELECT * FROM categorynews WHERE link_categoryNews = '$p'";
                $queryTitle = mysqli_query($conn, $sqlTitle);
                $rowTitle = mysqli_fetch_array($queryTitle);
                echo $rowTitle['name_categoryNews'];
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
        <div class="row" style="left: 0; top: 0; position: fixed; z-index: 100000; width: 100%;">
            <!-- menu user -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                
                <nav class="navbar navbar-expand-md bg-dark navbar-dark" style="text-align: center;">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar" >
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="../user/?p=home.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                                    </svg>
                                </a>
                            </li>

                            <?php 
                                 // truy vấn bảng categorynews
                                $sqlCateNews = 'SELECT * FROM categorynews';
                                $resultCateNews = mysqli_query($conn, $sqlCateNews);

                                if (mysqli_num_rows($resultCateNews) > 0) {
                                    //  hiển thị dữ liệu ra website
                                    while($rowCateNews = mysqli_fetch_assoc($resultCateNews)) { 
                            ?>
                            <li class="nav-item" style="border-left: 1px solid red;" id="<?php echo $p ?> myClick" onmouseup="myClick()">
                                <a class="nav-link" href="?p=<?php echo $rowCateNews['link_categoryNews']; ?>"> <?php echo $rowCateNews['name_categoryNews']; ?></a>
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
                                <label for="inputPassword2" class="sr-only">Nhập từ khóa</label>
                                <input type="text" name="searchField" class="form-control" id="inputPassword2" placeholder="Key word" required>
                            </div>
                            <button type="submit" name="searchBtn" class="btn btn-primary mb-2" style="float: right;">Tìm kiếm</button>
                        </form>
                    </div>
                </nav>
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

    <!-- search khi có key word, bình thường sẽ ẩn-->
    <!-- // sự kiện khi nhấn button search -->
    <div class="container" >
        <?php
            if(isset($_POST['searchBtn'])){
                $searchField = $_POST['searchField'];
    
                // kiểm tra xem có dữ liệu nhập vào không
                if($searchField != ''){
                    //echo 'key word:  ' . $searchField;
        
                    $sqlSearch = "SELECT * 
                    FROM news 
                    WHERE title_news LIKE '%" . $_POST['searchField'] ."%' OR description_news LIKE '%" . $_POST['searchField'] ."%' 
                    LIMIT 1, 10";
                    $resultSearch = mysqli_query($conn, $sqlSearch);
        
                    // $url = 'search.php?searchField=' .$searchField;
                    // header('location: ' .$url);
        ?>
        <div class="row shadow p-3 mb-5 bg-body rounded">
            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 ">
                <h1>KẾT QUẢ TÌM KIẾM</h1>
                <hr style="height: 2px; border-width: 0; color: gray; background-color: gray;">
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 ">
            </div>
        </div>

        <div class="row shadow p-3 mb-5 bg-body rounded">
            <?php

                    if (mysqli_num_rows($resultSearch) > 0) {
                        while($row = mysqli_fetch_assoc($resultSearch)) {
            ?>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="row" style="height: auto; border-left: 2px solid red;">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12" style="height: fit-content">
                        <a href="news_detail.php?id_news=<?php echo $row['id_news']; ?>">
                            <img src="<?php echo $row['urlImage_news']; ?>" style="width: 100%; height: 150px;"  alt="img" >
                        </a>
                    </div>

                    <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12" style="height:fit-content; text-align: justify;">
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
                <hr style="height: 2px; border-width: 0; color: gray; background-color: gray;">
            </div>


        <?php
                        }
                    }
                    else {
                        echo '0 result';
                    }
            ?>
        </div>
        <?php
                }
                else {
                    echo 'Vui lòng nhập vào "Key word"';
                }
            }
        ?>
    </div>


    <!-- content từ file khác -->

    <?php 
        switch($p) {
            case "tournaments.php":
                require "../user/tournaments.php";
                break;
            case "gamers_streamers.php":
                require "../user/gamers_streamers.php";
                break;
            case "game_guide.php":
                require "../user/game_guide.php";
                break;
            case "daily_life.php":
                require "../user/daily_life.php";
                break;
            case "games.php":
                require "../user/games.php";
                break;
            case "picture.php":
                require "../user/picture.php";
                break;
            case "news_detail.php":
                require "../user/news_detail.php";
                break;
            default:
                require "../user/home.php";
                break;
        }
    ?>

    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                <h1>Bài viết khác</h1>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
                <hr style="height: 2px; border-width: 0; color: gray; background-color: gray;">
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
            </div>
        </div>
    </div>

    <?php require "../user/paging_news.php"; ?>

        <div class="row justify-content-end" style="text-align: right;">
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12" style="margin: 50px;">
                <nav aria-label="Page navigation example">
                    
                    <ul class="pagination" >
                        <?php 
                            // PHẦN HIỂN THỊ PHÂN TRANG
                            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                
                            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                            if ($current_page > 1 && $total_page > 1){
                                echo '<li class="page-item" style="margin: 0px 2px;"><a class="page-link" href="index.php?page='.($current_page - 1).'">Prev</a></li>';
                            }
                
                            // Lặp khoảng giữa
                            for ($i = 1; $i <= $total_page; $i++){
                                // Nếu là trang hiện tại thì hiển thị thẻ span
                                // ngược lại hiển thị thẻ a
                                if ($i == $current_page){
                                    echo '<li class="page-item" style="margin: 0px 2px;"><a class="page-link" style="color: red; border: 1px solid red;" href="index.php?page='.($current_page).'">'.$i.'</a></li> ';
                                }
                                else{
                                    echo ' <li class="page-item" style="margin: 0px 2px;"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
                                }
                            }
                
                            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                            if ($current_page < $total_page && $total_page > 1){
                                echo '<li class="page-item" style="margin: 0px 2px;"><a class="page-link" href="index.php?page='.($current_page + 1).'">Next</a></li> ';
                            }
                        ?>
                    </ul>
                </nav>
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

    <script>
        function myClick() {
            var rootStyle = document.getElementById('myClick').style;
            rootStyle.setProperty('color', "red");
            rootStyle.setProperty('background', "darkcyan");
        }
    </script>
</body>
</html>