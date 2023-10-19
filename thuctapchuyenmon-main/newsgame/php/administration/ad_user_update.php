<?php 
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');

    if(isset($_GET['id_user'])){
        $id_user = $_GET['id_user'];
    }
?>

<?php
    if(isset($_POST['submitUpdateUser'])){
        //$id_image = $_POST['id_image'];
        $name_user = $_POST['name_user'];
        $email_user = $_POST['email_user'];
        $password = $_POST['password'];
        $Position_user = $_POST['Position_user'];
        $isBlock_user = $_POST['isBlock_user'];


        if($name_user == ""){echo '"name user" field cannot be empty.';}
        if($email_user == ""){echo '"email user" field cannot be empty.';}
        if($password == ""){echo '"password" field cannot be empty.';}
        if($Position_user == ""){echo '"Position user" field cannot be empty.';}
        if($isBlock_user == ""){echo '"isBlock_user" field cannot be empty.';}

        if($name_user != "" && $email_user != "" && $password != "" && $Position_user != "" && $isBlock_user != ""){
            $sql = "UPDATE user 
            SET name_user = '$name_user', email_user = '$email_user', password = '$password', Position_user = '$Position_user', isBlock_user = '$isBlock_user'  
            WHERE id_user = $id_user";
            $result = mysqli_query($conn, $sql);
            
            //echo 'Update' . $id_user . ' - ' . $name_user . ' - ' . $email_user . ' - ' . $password . ' - ' . $Position_user . ' - ' . $isBlock_user;
            $url = 'ad_user.php';
            header('location: ' .$url);
        }
    }
?>

<?php
    $sql = "SELECT * FROM user WHERE id_user = $id_user";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);

    //echo '<br/>' . $row['id_user'] . ' - ' . $row['name_user'] . ' - ' . $row['email_user'] . ' - ' . $row['password'] . ' - ' . $row['Position_user'] . ' - ' . $row['isBlock_user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>

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
                <h3>Update User</h3>
                <hr>
                <div>
                    <div>
                        <form class="form" method="POST" enctype="multipart/form-data">

                            <!-- User id indentity-->
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">User name: <?php echo $row['id_user']; ?></label>
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">User name</label>
                                <input type="text" name="name_user" class="form-control" id="formGroupExampleInput" placeholder="Enter user name" value="<?php echo $row['name_user']; ?>" required>
                            </div>

                            <br/>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">User email</label>
                                <input type="text" name="email_user" class="form-control" id="formGroupExampleInput" placeholder="Enter user email" value="<?php echo $row['email_user']; ?>" required>
                            </div>

                            <br/>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">User password (<= 10 characters)</label>
                                <input type="text" name="password" class="form-control" id="formGroupExampleInput" placeholder="Enter user pasword" value="<?php echo $row['password']; ?>" required>
                            </div>

                            <br/>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">User Position </label>
                                <select name="Position_user" class="form-select" aria-label="Default select example">
                                    <option selected><?php echo $row['Position_user']; ?></option>
                                    <option value="admin">admin</option>
                                    <option value="user">user</option>
                                </select>
                            </div>

                            <br/>

                            <div class="mb-3">
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">User is Block ? </label>
                                <select name="isBlock_user" class="form-select" aria-label="Default select example">
                                    <option selected><?php echo $row['isBlock_user']; ?></option>
                                    <option value="Locked">Locked</option>
                                    <option value="Unlock">Unlock</option>
                                    
                                </select>
                            </div>
                            </div>

                            <br/>

                            <br>

                            <button type="submit" name="submitUpdateUser" class="btn btn-primary">Submit Update User</button>

                            <br>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>