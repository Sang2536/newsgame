<?php
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 " style="padding: 4px; ">
            </div>

            <div class="col-xl-6 col-lg-6 col-md-9 col-sm-12" style="background-color: cyan; border-radius: 10px;">
                <form class="form" method="POST" enctype="multipart/form-data">

                    <!-- User id indentity-->
                    <br/>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Email</label>
                        <input type="text" name="email_user" class="form-control" id="formGroupExampleInput" placeholder="Enter user email" required>
                    </div>

                    <br/>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nhập tên</label>
                        <input type="text" name="name_user" class="form-control" id="formGroupExampleInput" placeholder="Enter user email" required>
                    </div>

                    <br/>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" id="formGroupExampleInput" placeholder="Enter user pasword" required>
                    </div>

                    <br/>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nhập lại mật khẩu</label>
                        <input type="password" name="rePassword" class="form-control" id="formGroupExampleInput" placeholder="Enter user pasword" required>
                    </div>

                    <br/>

                    <button type="submit" name="submitRegester" class="btn btn-primary">Đâng ký</button>

                    <br>

                    </form>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 " style=" padding: 4px; ">
            </div>
            
        </div>
</body>
</html>