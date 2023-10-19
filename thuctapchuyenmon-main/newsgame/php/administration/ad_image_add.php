<?php 
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');

    if(isset($_POST['submitAdd'])){
        $id_image = $_POST['id_image'];
        $id_categoryImage = $_POST['id_categoryImage'];
        $name_image = $_POST['name_image'];
        $url_image = $_POST['url_image'];

        if($id_categoryImage == ""){echo '"Image id category" field cannot be empty.';}
        if($name_image == ""){echo '"Image name" field cannot be empty.';}
        if($url_image == ""){echo '"Image URL" field cannot be empty.';}

        $sql = "INSERT INTO image(id_image, id_categoryImage, name_image, url_image) 
        VALUES('$id_image', '$id_categoryImage', '$name_image', '$url_image')";
        $result = mysqli_query($conn, $sql);

        $url = 'ad_image.php';
        header('location: ' .$url);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Image</title>

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
            <div class="col-lg-6" style="background-color: aquamarine; margin: 0px 4%">
                
                <h3>Add Image</h3>
                <hr>
                <div>
                    <div>
                        <form class="form" method="POST" enctype="multipart/form-data">
                            <br>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Image id category</label>
                                <select name="id_categoryImage" class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <?php

                                        $sqlCateImg = 'SELECT * FROM categoryimage';
                                        $resultCateImg = mysqli_query($conn, $sqlCateImg);

                                        //  lặp hết dữ liệu có trong db
                                        if (mysqli_num_rows($resultCateImg) > 0) {
                                            //  hiển thị dữ liệu ra website
                                            while($row = mysqli_fetch_assoc($resultCateImg)) { 
                                    ?>
                                    
                                    <option value="<?php echo $row['id_categoryImage'] ?>"> <?php echo $row['id_categoryImage'] . ' - ' . $row['name_categoryImage'] ?> </option>
                                    <?php
                                            }
                                        }
                                        else {
                                            echo 'No data';
                                        }
                
                                        //  đóng kết nối
                                        mysqli_close($conn);
                                    ?>
                                </select>
                            </div>

                            <br>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Image name</label>
                                <input type="text" name="name_image" class="form-control" id="formGroupExampleInput" placeholder="Enter image name" required>
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Image URL</label>
                                <input type="url" name="url_image" class="form-control" id="exampleInputPassword1" placeholder="Enter image URL" required>
                            </div>

                            <br>

                            <button type="submit" name="submitAdd" class="btn btn-primary">Submit Add</button>

                            <br>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>