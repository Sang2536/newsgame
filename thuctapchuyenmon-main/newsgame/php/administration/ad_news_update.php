<?php 
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');

    if(isset($_GET['id_news'])){
        $id_news = $_GET['id_news'];
    }
?>

<?php
    if(isset($_POST['submitUpdateNews'])){
        //$id_news = $_POST['id_news'];
        $id_categoryNews = $_POST['id_categoryNews'];
        $title_news = $_POST['title_news'];
        $description_news = $_POST['description_news'];
        $content_news = $_POST['content_news'];
        $urlImage_news = $_POST['urlImage_news'];
        $dateCreate_post = $_POST['dateCreate_post'];
        $numberOfReaders_news = $_POST['numberOfReaders_news'];


        if($id_categoryNews == ""){echo '"Image id category" field cannot be empty.';}
        if($title_news == ""){echo '"Image name" field cannot be empty.';}
        if($description_news == ""){echo '"description_news" field cannot be empty.';}
        if($content_news == ""){echo '"content_news" field cannot be empty.';}
        if($urlImage_news == ""){echo '"urlImage_news" field cannot be empty.';}
        if($dateCreate_post == ""){echo '"dateCreate_post" field cannot be empty.';}
        if($numberOfReaders_news == ""){echo '"numberOfReaders_news" field cannot be empty.';}


        if($id_categoryNews != "" && $title_news != "" && $description_news != "" && $content_news != "" 
            && $urlImage_news != "" && $dateCreate_post != "" && $numberOfReaders_news != "")
        {
            $sql = "UPDATE news 
            SET id_categoryNews = '$id_categoryNews', title_news = '$title_news', description_news = '$description_news', content_news = '$content_news', urlImage_news = '$urlImage_news', dateCreate_post = '$dateCreate_post'
            WHERE id_news = $id_news";

            $result = mysqli_query($conn, $sql);
            
            $url = 'ad_news.php';
            header('location: ' .$url);
        }
    }
?>

<?php
    $sql = "SELECT * FROM news WHERE id_news = $id_news";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Image</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- header -->
    <div class="container">
        <div class="row" style="background: lightcyan; margin-bottom: 5%">
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

    <div class="container">
        <div class="row justify-content-center">
            <!-- form input database -->
            <div class="col-lg-12" style="background-color: aquamarine;">
                <h3>Add Image</h3>
                <hr>
                <div>
                    <div>
                        <form class="form" method="POST" enctype="multipart/form-data">

                            <div class="row justify-content-center">
                                <!-- form left -->
                                

                                <div class="col-lg-6" style="background-color: aquamarine;">
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">
                                            News id: <?php echo $row['id_news']; ?>
                                        </label>
                                    </div>

                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Category id news</label>
                                        <select name="id_categoryNews" class="form-select" aria-label="Default select example">
                                            <option selected>This field must be reset. Current 'News Category Id': <?php echo $row['id_categoryNews']; ?></option>
                                            <?php

                                                $sqlCateNews = 'SELECT * FROM categorynews';
                                                $resultCateNews = mysqli_query($conn, $sqlCateNews);

                                                //  lặp hết dữ liệu có trong db
                                                if (mysqli_num_rows($resultCateNews) > 0) {
                                                    //  hiển thị dữ liệu ra website
                                                    while($rowCate = mysqli_fetch_assoc($resultCateNews)) { 
                                            ?>
                                            
                                            <option value="<?php echo $rowCate['id_categoryNews'] ?>"> <?php echo $rowCate['id_categoryNews'] . ' - ' . $rowCate['name_categoryNews'] ?> </option>
                                            <?php
                                                    }
                                                }
                                                else {
                                                    echo 'No data';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <br>

                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Title News</label>
                                        <textarea class="form-control" name="title_news" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;">
                                            <?php echo $row['title_news']; ?>
                                        </textarea>
                                    </div>

                                    <br>

                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Description News</label>
                                        <textarea class="form-control" name="description_news" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;">
                                            <?php echo $row['description_news']; ?>
                                        </textarea>
                                    </div>

                                    <br>

                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">URL Image Main News</label>
                                        <input type="text" name="urlImage_news" class="form-control" id="formGroupExampleInput" placeholder="Enter image name" value="<?php echo $row['urlImage_news']; ?>" required>
                                    </div>

                                    <br>

                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Date Create</label>
                                        <input type="date" name="dateCreate_post" class="form-control" id="formGroupExampleInput" placeholder="Enter image name" value="<?php echo $row['dateCreate_post']; ?>" required>
                                    </div>

                                    <br>

                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">numberOfReaders_news</label>
                                        <input type="number" name="numberOfReaders_news" class="form-control" id="formGroupExampleInput" placeholder="Enter image name" value="<?php echo $row['numberOfReaders_news']; ?>" required>
                                    </div>

                                </div>

                                <!-- form right -->
                                <div class="col-lg-6" style="background-color: aquamarine;">
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Content News</label>
                                        <textarea class="form-control" name="content_news" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 500px;">
                                            <?php echo $row['content_news']; ?>
                                        </textarea>
                                    </div>
                                </div>

                            </div>

                            <br>

                            <button type="submit" name="submitUpdateNews" class="btn btn-primary">Submit Update News</button>

                            <br>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center" style="margin-top: 50px;">
            <div class="col-lg-12">
                <img style="width: 100%; height: 200px;" src="https://image.freepik.com/free-vector/digital-neon-game-banner_1017-19897.jpg" alt="end game">
            </div>
        </div>
    </div>
</body>
</html>