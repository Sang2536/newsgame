<?php 
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');

    if(isset($_POST['submitAdd'])){
        $id_game = $_POST['id_game'];
        $name_game = $_POST['name_game'];
        $category_game = $_POST['category_game'];
        $graphics_game = $_POST['graphics_game'];
        $urlImage_game = $_POST['urlImage_game'];
        $overview_game = $_POST['overview_game'];


        //if($id_categoryNews == ""){echo '"id category News" field cannot be empty.';}
        if($name_game == ""){echo '"name category News" field cannot be empty.';}
        if($category_game == ""){echo '"name category News" field cannot be empty.';}
        if($graphics_game == ""){echo '"name category News" field cannot be empty.';}
        if($overview_game == ""){echo '"name category News" field cannot be empty.';}


        $sql = "INSERT INTO games(id_game, name_game, category_game, graphics_game, urlImage_game, overview_game) 
        VALUES('$id_game', '$name_game', '$category_game', '$graphics_game', '$urlImage_game', '$overview_game')";
        $result = mysqli_query($conn, $sql);

        $url = 'ad_games.php';
        header('location: ' .$url);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Game</title>

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
                
                <h3>Add Game</h3>
                <hr>
                <div>
                    <div>
                        <form class="form" method="POST" enctype="multipart/form-data">

                            <!-- <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Image name</label>
                                <input type="text" name="id_categoryNews" class="form-control" id="formGroupExampleInput" placeholder="Enter Category News Id" required>
                            </div> -->

                            <br>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên game</label>
                                <input type="text" name="name_game" class="form-control" id="exampleInputPassword1" placeholder="Enter Category News Name" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Thể loại</label>
                                <input type="text" name="category_game" class="form-control" id="exampleInputPassword1" placeholder="Enter Category News Name" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Đồ họa game</label>
                                <select name="id_categoryImage" class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="3D">3D</option>
                                    <option value="2D">2D</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Hình rnh game</label>
                                <input type="text" name="urlImage_game" class="form-control" id="exampleInputPassword1" placeholder="Enter Category News Name" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Tổng quan về game</label>
                                <textarea class="form-control" name="overview_game" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
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