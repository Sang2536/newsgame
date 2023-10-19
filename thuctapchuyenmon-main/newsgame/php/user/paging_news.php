<?php
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ví dụ phân trang trong PHP và MySQL</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    <body>
        <div class="container">
            <div class="row" style="margin-top: 50px;">
                <?php 
                    // PHẦN XỬ LÝ PHP
                    // BƯỚC 1: KẾT NỐI CSDL
                    //có sắn rồi
            
                    // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                    $result = mysqli_query($conn, 'SELECT COUNT(id_news) AS total FROM news');
                    $row = mysqli_fetch_assoc($result);
                    $total_records = $row['total'];
            
                    // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 4;
            
                    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                    // tổng số trang
                    $total_page = ceil($total_records / $limit);
            
                    // Giới hạn current_page trong khoảng 1 đến total_page
                    if ($current_page > $total_page){
                        $current_page = $total_page;
                    }
                    else if ($current_page < 1){
                        $current_page = 1;
                    }
            
                    // Tìm Start
                    $start = ($current_page - 1) * $limit;
            
                    // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
                    // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
                    $result = mysqli_query($conn, "SELECT * FROM news LIMIT $start, $limit");
            
                ?>

                <?php 
                    // PHẦN HIỂN THỊ TIN TỨC
                    // BƯỚC 6: HIỂN THỊ DANH SÁCH TIN TỨC
                    while ($row = mysqli_fetch_assoc($result)){
                ?>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6" style="width: 90%;">
                            <div class="row">
                                <a href="news_detail.php?id_news=<?php echo $row['id_news']; ?>">
                                    <img src="<?php echo $row['urlImage_news']; ?>" alt="img news" style="height: 150px; width: 90%;">
                                    <p style="height: 150px; width: 90%; text-align: justify;"><?php echo $row['title_news']; ?></p>
                                </a>
                            </div>
                            <div class="row">
                            </div>
                            <div class="row">
                                <?php echo $row['dateCreate_post']; ?>
                            </div>
                        </div>
                <?php
                    }
                ?>
            </div>

            <!-- <div class="row justify-content-end" style="text-align: right;">
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12" style="margin: 50px;">
                    <nav aria-label="Page navigation example">
                        
                        <ul class="pagination" >
                            <?php 
                                // PHẦN HIỂN THỊ PHÂN TRANG
                                // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                    
                                // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                                if ($current_page > 1 && $total_page > 1){
                                    echo '<li class="page-item" style="margin: 0px 2px;"><a class="page-link" href="paging_news.php?page='.($current_page - 1).'">Prev</a></li>';
                                }
                    
                                // Lặp khoảng giữa
                                for ($i = 1; $i <= $total_page; $i++){
                                    // Nếu là trang hiện tại thì hiển thị thẻ span
                                    // ngược lại hiển thị thẻ a
                                    if ($i == $current_page){
                                        echo '<li class="page-item" style="margin: 0px 2px;"><a class="page-link" style="color: red; border: 1px solid red;" href="paging_news.php?page='.($current_page).'">'.$i.'</a></li> ';
                                    }
                                    else{
                                        echo ' <li class="page-item" style="margin: 0px 2px;"><a class="page-link" href="paging_news.php?page='.$i.'">'.$i.'</a></li>';
                                    }
                                }
                    
                                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                                if ($current_page < $total_page && $total_page > 1){
                                    echo '<li class="page-item" style="margin: 0px 2px;"><a class="page-link" href="paging_news.php?page='.($current_page + 1).'">Next</a></li> ';
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div> -->
    </body>
</html>