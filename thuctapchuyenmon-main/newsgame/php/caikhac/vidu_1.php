<?php
 
    session_start();
 
    include_once('config.php');
 
    //kiem tra cookid xem da tôn tai chua
 
    //neu chua thi minh ha dang nhap;
 
    if(empty($_SESSION['username'])){
 
        if(isset($cookie_name)){
 
            if(isset($_COOKIE[$cookie_name])){
 
                parse_str($_COOKIE[$cookie_name]);
 
                $sql2="select * from user where username='$usr' and password='$hash'";
 
                $result2=mysqli_query($sql2,$dbconect);
 
                if($result2){
 
                    header('location:infomation.php');
 
                    exit;
 
                }
 
            }
 
        }
 
    }
 
    else{
 
        header('location:infomation.php');
 
        exit;
 
    }   
 
 
    if(isset($_POST['submit'])){
 
         
 
        $username=$_POST['username'];
 
        $password=md5($_POST['password']);
 
        $a_check=((isset($_POST['remember'])!=0)?1:"");
 
        if($username=="" || $password==""){
 
            echo "vui long dien day du thong tin";
 
            exit;
 
        }
 
        else{
 
            $sql="select * from user where username='$username' and password='$password'";
 
            echo $sql;
 
            $result=mysqli_query($sql,$dbconect);
 
            if(!$result){
 
                echo "loi cau truy van".mysqli_error();
 
                exit;
 
            }
 
            $row=mysqli_fetch_array($result);
 
            $f_user=$row['username'];
 
            $f_pass=$row['password'];
 
            if($f_user==$username && $f_pass==$password){
 
                $_SESSION['username']=$f_user;
 
                $_SESSION['password']=$f_pass;
 
                if($a_check==1){
 
                    setcookie ($cookie_name, 'usr='.$f_user.'&hash='.$f_pass, time() + $cookie_time);
 
                }
 
                header('location:infomation.php');
 
                exit;
 
 
            }
 
        }
 
    }
 
 
?>
