<?php
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');
    
    if(isset($_GET['id_image'])){
        $id_image = $_GET['id_image'];
    }
?>

<?php 
    $sql = "DELETE FROM image WHERE id_image = $id_image";
    $result = mysqli_query($conn, $sql);

    $url = 'ad_image.php';
    header('location: ' .$url);
?>