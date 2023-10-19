<?php
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');
    
    if(isset($_GET['id_game'])){
        $id_game = $_GET['id_game'];
    }
?>

<?php 
    $sql = "DELETE FROM games WHERE id_game = $id_game";
    $result = mysqli_query($conn, $sql);

    $url = 'ad_games.php';
    header('location: ' .$url);
?>