<?php 
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');

    if(isset($_GET['id_categoryNews'])){
        $id_categoryNews = $_GET['id_categoryNews'];
    }
?>

<?php
    if(isset($_POST['submitUpdate'])){
        //$id_categoryNews = $_POST['id_categoryNews'];
        $name_categoryNews = $_POST['name_categoryNews'];
        $link_categoryNews = $_POST['link_categoryNews'];


        //if($id_categoryNews == ""){echo '"News id category" field cannot be empty.';}
        if($name_categoryNews == ""){echo '"News name category" field cannot be empty.';}
        if($link_categoryNews == ""){echo '"News link category" field cannot be empty.';}


        if($id_categoryNews != ""){
                $sql = "UPDATE categorynews 
            SET name_categoryNews = '$name_categoryNews', link_categoryNews = '$link_categoryNews' 
            WHERE id_categoryNews = $id_categoryNews";
            $result = mysqli_query($conn, $sql);
            
            $url = 'ad_category_news.php';
            header('location: ' .$url);
        }
    }
?>

<?php
    $sql = "SELECT * FROM categorynews WHERE id_categoryNews = $id_categoryNews";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update News</title>

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
                                <a class="nav-link" href="#">Category News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">news</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> News</a>
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
                <h3>Add News</h3>
                <hr>
                <div>
                    <div>
                        <form class="form" method="POST" enctype="multipart/form-data">
                            <br>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">
                                    category news id: <?php echo $row['id_categoryNews']; ?>
                                </label>
                            </div>

                            <class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">category news name</label>
                                <input type="text" name="name_categoryNews" class="form-control" id="formGroupExampleInput" placeholder="Enter category news name" value="<?php echo $row['name_categoryNews']; ?>" required>
                            </class=>

                            <br>

                            <class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">category news link</label>
                                <input type="text" name="link_categoryNews" class="form-control" id="formGroupExampleInput" placeholder="Enter category news link" value="<?php echo $row['link_categoryNews']; ?>" required>
                            </class=>

                            <br>

                            <button type="submit" name="submitUpdate" class="btn btn-primary">Submit Update</button>

                            <br>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>