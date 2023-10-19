<?php 
    //Khai báo sử dụng session
    session_start();

    //đường dẫn đến file kết nối database
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');


    //tạo chuỗi ký tự ngẫu nhiêm
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
    $fogot_pass = substr(str_shuffle($permitted_chars), 0, 10);
    echo $fogot_pass;


    // Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["submitFogotEmail"])) {

		// lấy thông tin người dùng
		$email_user = $_POST["email_user"];

		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$email_user = strip_tags($email_user);
		$email_user = addslashes($email_user);

        
		if ($email_user == "") {
			echo "email nhận không được để trống!";
		} else{
			$sql = "SELECT * FROM user WHERE email_user = '$email_user'";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			$row_data = mysqli_fetch_array($query);

			if ($num_rows == 0) {
				echo "<script>alert('E-mail sai hoặc chưa được đăng ký.');</script>";
			}else{
                // Kiểm tra xem địa chỉ nhận có hợp lệ không
                $to_email = $email_user; // dịa chỉ nhận mail
                $secure_check = filter_var($to_email, FILTER_VALIDATE_EMAIL);
                if ($secure_check == false) {
                    echo "E-mail không tồn tại! Vui lòng kiểm tra lại";
                } else {
                     //send email 
                    $subject = 'Mã xác nhận '; //tiêu đề của mail
                    $message = 'Xin chào ' .  $email_user . '. <br/>>Đây là mã xác nhận của bạn: ' . $fogot_pass; // nội dung mail
                    $headers = 'From: newsgame@gmail.com'; //tùy chọn này có hoặc không, tham số này mở rộng cho phần header của mail
                    mail($to_email, $subject, $message, $headers);
                    echo '<script>alert("Mã xác nhận đã được gửi thành công! Vui lòng kiểm tra E-mail của bạn.");</script>';

                    echo '<style>#form-email {display: block;}</style>';
                    echo '<style>#form-pass {display: block;}</style>';
                    
                }
			}
		}
	}

    if (isset($_POST["submitFogotPassword"])) {
        if( $fogot_password == $fogot_pass) {
            header('locaion: doimatkhau.php');
        } else {
            echo '<script>alert("Mã xác nhận không đúng. Vui lòng liểm tra lại.");</script>';
        }                
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>

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

<body style="background-image: url(''); background-repeat: no-repeat, repeat; background-size: cover;">

    <div class="container" style="margin-top: 50px;">
    
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 " style="padding: 4px; ">
            </div>

            <div class="col-xl-6 col-lg-6 col-md-9 col-sm-12" style=" color: #ff0000; border-radius: 10px; border: 2px solid #ff0000;">
                <div class="row">
                    <div class="col-xl-10 col-lg-10 col-md-9 col-sm-9 " style="text-align: right;">
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 " style="text-align: right;">
                        <a class="nav-link" href="../user/news_detail.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 " style="text-align: center;">
                        <p style="font-size: 30px; font-weight: 600;">LẤY MẬT KHẨU</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                    </div>
                </div>
                
                <form class="form" method="POST" enctype="multipart/form-data" id="form-email">

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label" style="font-weight: 700; font-size: 25px;">Email</label>
                        <input type="text" name="email_user" class="form-control" id="formGroupExampleInput" placeholder="Enter user email" required>
                    </div>

                    <br/>

                    <div class="mb-3">
                        <button type="submit" name="submitFogotEmail" class="btn btn-primary">Gửi</button>
                    </div>

                    <br>

                </form>

                <form class="form" method="POST" enctype="multipart/form-data" hidden id="form-pass">


                    <div class="mb-3" class="maxacthuc">
                        <label for="formGroupExampleInput" class="form-label" style="font-weight: 700; font-size: 25px;">Mã xác nhận</label>
                        <input type="text" name="fogot_password" class="form-control" id="formGroupExampleInput" placeholder="Enter user email" required>
                    </div>

                    <br/>

                    <div class="mb-3">
                        <button type="submit" name="submitFogotPassword" class="btn btn-primary">Xác nhận</button>
                    </div>

                    <br>
                    <br>

                </form>

                <div class="mb-12">
                    <a style="padding: 5px 10px; color: black; float: left;" href="../user/user_registration.php">
                        Quay lại
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 " style=" padding: 4px; ">
                <img src="http://thegioihoanmy.vn/home/Uploads/PW2/Image/Tintuc/2014/CD/nv-1.jpg" alt="img login right" style="width: 100%; height: 100%">
            </div>
            
        </div>
</body>
</html>