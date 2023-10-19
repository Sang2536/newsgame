<?php
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');
    
    if(isset($_GET['id_news'])){
        $id_news = $_GET['id_news'];
    }
?>

<?php 
    $sql = "DELETE FROM news WHERE id_news = $id_news";
    $result = mysqli_query($conn, $sql);

    $url = 'ad_news.php';
    header('location: ' .$url);
?>