<?php
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');
    
    if(isset($_GET['id_user'])){
        $id_user = $_GET['id_user'];
    }
?>

<?php 
    $sql = "DELETE FROM user WHERE id_user = $id_user";
    $result = mysqli_query($conn, $sql);

    $url = 'ad_user.php';
    header('location: ' .$url);
?>