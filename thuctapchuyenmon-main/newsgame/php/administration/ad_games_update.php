<?php 
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');

    if(isset($_GET['id_game'])){
        $id_game = $_GET['id_game'];
    }
?>

<?php
    if(isset($_POST['submitUpdate'])){
        $id_game = $_POST['id_game'];
        $name_game = $_POST['name_game'];
        $category_game = $_POST['category_game'];
        $graphics_game = $_POST['graphics_game'];
        $urlImage_game = $_POST['urlImage_game'];
        $overview_game = $_POST['overview_game'];


        if($name_game == ""){echo '"games id category" field cannot be empty.';}
        if($category_game == ""){echo '"games name" field cannot be empty.';}
        if($graphics_game == ""){echo '"games URL" field cannot be empty.';}

        if($name_game != "" && $category_game != "" && $graphics_game != ""){
            $sql = "UPDATE games 
            SET name_game = '$name_game', category_game = '$category_game', graphics_game = '$graphics_game' , urlImage_game = '$urlImage_game', overview_game='$overview_game'
            WHERE id_game = $id_game";
            $result = mysqli_query($conn, $sql);
            
            $url = 'ad_games.php';
            header('location: ' .$url);
        }
    }
?>

<?php
    $sql = "SELECT * FROM games WHERE id_game = $id_game";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update games</title>

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
                                <a class="nav-link" href="#">Category games</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">news</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> games</a>
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
                <h3>Add games</h3>
                <hr>
                <div>
                    <div>
                        <form class="form" method="POST" enctype="multipart/form-data">
                            <br>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">
                                    Id. Id đang chọn đẻ sửa: <?php echo $row['id_game']; ?>
                                </label>
                                <label for="formGroupExampleInput" class="form-label">Nhập id mới</label>
                                <input type="text" name="id_game" class="form-control" id="formGroupExampleInput" placeholder="Enter games name" value="<?php echo $row['id_game']; ?>" required>
                            </div>

                            <br/>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên game</label>
                                <input type="text" name="name_game" class="form-control" id="exampleInputPassword1" placeholder="Enter games URL" value="<?php echo $row['name_game']; ?>" required>
                            </div>

                            <br/>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Thể loại game</label>
                                <input type="text" name="category_game" class="form-control" id="formGroupExampleInput" placeholder="Enter games name" value="<?php echo $row['category_game']; ?>" required>
                            </div>

                            <br>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Đồ họa game</label>
                                <select name="graphics_game" class="form-select" aria-label="Default select example">
                                    <option selected value="<?php echo $row['graphics_game']; ?>"><?php echo $row['graphics_game']; ?></option>
                                    <option value="3D">3D</option>
                                    <option value="2D">2D</option>
                                </select>
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Hình ảnh game</label>
                                <textarea class="form-control" name="urlImage_game" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 50px;">
                                    <?php echo $row['urlImage_game']; ?>
                                </textarea>
                            </div>

                            <br>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Tổng quan game</label>
                                <textarea class="form-control" name="overview_game" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px;">
                                    <?php echo $row['overview_game']; ?>
                                </textarea>
                            </div>

                            <br>

                            <button type="submit" name="submitUpdate" class="btn btn-primary">Sửa</button>

                            <br>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>