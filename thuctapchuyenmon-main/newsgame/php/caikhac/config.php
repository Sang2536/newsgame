<?php
 
    //cau hinh ket noi
 
    $db_localhost="localhost";
 
    $db_user="root";
 
    $db_pass="";
 
    $db_data="basic_php";
 
    $cookie_name = 'siteAuth';
 
     $cookie_time = (3600); // 30 days
 
    $dbconect=mysqli_connect($db_localhost,$db_user,$db_pass) or die('ket noi khong thanh cong');
 
    mysqli_select_db($db_data,$dbconect);
 
    mysqli_query("set names 'utf8'");
 
?>
