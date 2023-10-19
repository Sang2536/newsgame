<?php
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');
    
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
    <title>News Games</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="/css/grid.css">

    <style>
        * {
            box-sizing: border-box;
        }
        
        .col {
            text-align: center;
            background-clip: content-box;
            margin-top: 8px;
            margin-bottom: 8px;
        }
        
        .center {
            margin-top: 100px;
            margin-bottom: 50px;
        }
        
        .right {
            width: 100%;
            height: auto;
            background-color: silver;
            border: 1px;
            margin-top: 20px;
        }
        
        .game_image {
            background-color: lightblue;
            border-radius: 8px;
            height: 200px;
        }
        
        .top_title {
            margin-top: 100px;
            background-color: #3366ff;
        }
    </style>
    <link rel="stylesheet" href="./grid.css">
</head>

<body>
    <!-- header -->
    <div class="container">
        <div class="row" style="background: lightcyan;">
            <!-- logo -->
            <div class="col-lg-1">
                <a href="">
                    <img style="width:50px; height: 50px;" src="https://gameviet.mobi/wp-content/uploads/2020/02/download-hinh-nen-lien-quan-mobile-gameviet.mobi_-1280x640.jpg" alt="logo">
                    <h5>News Game</h5>
                </a>
            </div>
            <!-- menu user -->
            <div class="col-lg-7">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">Administration</a>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="./homeGame.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Category new</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Category image</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">news</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> image</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <!-- search -->
            <div class="col-lg-4">
                <div class="row">
                    <p>Type search</p>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-inline">
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputPassword2" class="sr-only">Key word</label>
                                <input type="tect" class="form-control" id="inputPassword2" placeholder="Key word">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- content -->
    <div class="container">
    <div class="row" style="margin-top: 50px;">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 ">
                <?php
                    $sql = 'SELECT *, DATEDIFF(DATE(CURDATE()), DATE(dateCreate_post)) AS days_difference
                    FROM news 
                    GROUP BY dateCreate_post, id_news
                    HAVING DATEDIFF(DATE(CURDATE()), DATE(dateCreate_post)) < 0
                    ORDER BY days_difference ASC
                    LIMIT 100';;

                    $query = mysqli_query($conn, $sql);

                    echo 'Số dữ liệu có trong bảng là ' . mysqli_num_rows($query) . '<br />';

                    if (mysqli_num_rows($query) > 0) {
                                        
                        //  hiển thị dữ liệu ra website
                        while($row = mysqli_fetch_assoc($query)) {
                ?>

                <div class="row" style="background-color: #b8b894; margin-bottom: 20px;">
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                        <?php echo 'id: ' . $row['id_news'];?>
                        <a class="news_post nav-link" href="news_detail.php?id_news=<?php echo $row['id_news']; ?>">
                            
                            <img src="<?php echo $row['urlImage_news']; ?>" style="width: 100%; height: 200px; object-fit: contain;"  alt="img" >
                                            
                        </a>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 ">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                                    <a class="news_post nav-link" href="news_detail.php?id_news=<?php echo $row['id_news']; ?>">
                                                    
                                        <b>
                                            <h4><?php echo $row['title_news']; ?></h4>
                                        </b>
                                                    
                                    </a>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                                     <h6><?php echo $row['dateCreate_post']; ?></h6>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 " style="text-align: justify;">
                                    <h6><?php echo $row['description_news']; ?></h6>
                                </div>
                            </div>
                        
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

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 ">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 ">
                    </div>
                    <div class="col-xl-10 col-lg-18 col-md-10 col-sm-12 " style="background-color: lightskyblue;">
                        <?php
                            $sqlNewsLink = 'SELECT *, DATEDIFF(DATE(CURDATE()), DATE(dateCreate_post)) AS days_difference
                            FROM news 
                            GROUP BY dateCreate_post, id_news
                            HAVING DATEDIFF(DATE(CURDATE()), DATE(dateCreate_post)) < 0
                            ORDER BY days_difference ASC
                            LIMIT 100';

                            $queryNewsLink = mysqli_query($conn, $sqlNewsLink);

                            echo 'Số dữ liệu có trong bảng là ' . mysqli_num_rows($queryNewsLink) . '<br />';

                            if (mysqli_num_rows($queryNewsLink) > 0) {
                                                
                                //  hiển thị dữ liệu ra website
                                while($row = mysqli_fetch_assoc($queryNewsLink)) {
                        ?>
                        <a href="news_detail.php?id_news=<?php echo $row['id_news']; ?>">
                            <li>
                                <?php 
                                    echo $row['title_news'];
                                ?>
                            </li>
                        </a>
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