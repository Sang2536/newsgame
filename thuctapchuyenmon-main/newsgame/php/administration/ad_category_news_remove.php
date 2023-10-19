<?php
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');
    
    if(isset($_GET['id_categoryNews'])){
        $id_categoryNews = $_GET['id_categoryNews'];
    }
?>

<?php 
    $sql = "DELETE FROM categorynews WHERE id_categoryNews = $id_categoryNnews";
    $result = mysqli_query($conn, $sql);

    $url = 'ad_category_news.php';
    header('location: ' .$url);
?>