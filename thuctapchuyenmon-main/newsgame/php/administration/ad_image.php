<?php 
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');

    $sql = 'SELECT * FROM image';

    if(isset($_POST['searchImage']) && $_POST['searchImage'] != ''){
        $sql = 'SELECT * FROM image WHERE id_categoryImage like "%' . $_POST['searchImage'] .'%" or id_image like "%' . $_POST['searchImage'] .'%" or name_image like "%' . $_POST['searchImage'] .'%"';
    }
    
    $result = mysqli_query($conn, $sql);


    $sqlAdminMenu = 'SELECT * FROM adminmenu';
    $resultAdminMenu = mysqli_query($conn, $sqlAdminMenu);


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
    <title>Administration Image</title>

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

<body>
    <!-- header -->
    <div class="container">
        <div class="row" style="text-align: center; background-color: lightseagreen;">
            <!-- logo -->
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                <a href="">
                    <img style="width:100%; height: 70px;" src="https://gameviet.mobi/wp-content/uploads/2020/02/download-hinh-nen-lien-quan-mobile-gameviet.mobi_-1280x640.jpg" alt="logo">
                </a>
            </div>

            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
            <br/><br/>
                <h1>Game world news site</h1>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-2 col-sm-12">
                        <br/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-2 col-sm-12">
                    <?php 
                            if (mysqli_num_rows($resultUserLogin) > 0) {
                                echo $rowUserLogin['email_user'];
                            }
                            else {
                                echo '';
                            }
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-2 col-sm-12">
                        <a href="logout.php">Logout</a> 
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
        
        <div class="row">
            <!-- menu user -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                </div>
                <nav class="navbar navbar-expand-md bg-dark navbar-dark" style="text-align: center;">
                    
                    <a class="nav-link" href="ad_home.php">
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
                                if (mysqli_num_rows($resultAdminMenu) > 0) {
                                    //  hiển thị dữ liệu ra website
                                    while($row = mysqli_fetch_assoc($resultAdminMenu)) { 
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $row['link_adminMenu']; ?>"> <?php echo $row['name_adminMenu']; ?></a>
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
                </nav>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center" style="margin: 50px 0px 10px 0px;">
            <div class="col-lg-6">
                <a href="/newsgame/php/administration/ad_image_add.php" class="btn btn-primary stretched-link">Add Image</a>       
            </div>

            <!-- search id and id_category -->
            <div class="col-lg-6">
                <div class="row">
                    <p>Search 'id_image' or 'id_categoryImage' or 'name_image'</p>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-inline" method="POST">
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputPassword2" class="sr-only">Key word</label>
                                <input type="tect" name="searchImage" class="form-control" id="inputPassword2" placeholder="Key word">
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
            <div class="col-lg-12">
                <h3>Database phpMyAdmin (mySQL)</h3>
                <hr>
                
                <div>
                    <table class="table table-dark table-hover table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">id_image</th>
                                <th scope="col">id_categoryImage</th>
                                <th scope="col">name_image</th>
                                <th scope="col">url_image</th>
                                <th scope="col">image</th>
                                <th scope="col">Sửa </th>
                                <th scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                //  số dữ liệu của bảng ... có trong db
                                echo 'Số dữ liệu có trong bảng là ' . mysqli_num_rows($result) . '<br />';

                                 //  lặp hết dữ liệu có trong db
                                 if (mysqli_num_rows($result) > 0) {
                                    //  hiển thị dữ liệu ra website
                                    while($row = mysqli_fetch_assoc($result)) { 
                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $row['id_image']; ?>
                                </th>
                                <td>
                                    <?php echo $row['id_categoryImage']; ?>
                                </td>
                                <td>
                                    <?php echo $row['name_image']; ?>
                                </td>
                                <td>
                                    <a href="<?php echo $row['url_image']; ?>">
                                        <?php echo $row['url_image']; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo $row['url_image']; ?>">
                                        <img style="width: 100px; height 100px;" src="<?php echo $row['url_image']; ?>">
                                    </a>
                                </td>
                                <td>
                                    <a href="ad_image_update.php?id_image=<?php echo $row['id_image']; ?>">Sửa</a>
                                </td>
                                <td>
                                    <a onclick="return remove(<?php echo $row['id_image']; ?>)" href="ad_image_remove.php?id_image=<?php echo $row['id_image']; ?>">Xóa</a>
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                                else {
                                    echo '0 result';
                                }
        
                                //  đóng kết nối
                                mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- banner end -->
    <div class="row" style="margin: 5% 0px">>
        <div class="col-lg-12">
            <img style="width: 100%; height: 200px;" src="https://image.freepik.com/free-vector/digital-neon-game-banner_1017-19897.jpg" alt="end game">
        </div>
    </div>
    
    <script>
        function remove(id) {
            return confirm('Are you sure you want to delete the id = ' + id + ' element?')
        }
    </script>
</body>

</html>