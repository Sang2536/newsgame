
<?php 
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');

?>



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <a style="background-color: thistle; font-size: 25px;" href="ad_index.php?p=ad_news.php">Quay lại</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <hr style="height: 2px; border-width: 0; color: gray; background-color: gray;">
                <h3>Dữ liệu bài viết</h3>
                <br>
            </div>
        </div>
    </div>

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
        $limit = 5;
 
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
        <div>
            <table class="table table-dark table-hover table-bordered" style="text-align: center;">
                <thead>
                    <tr>
                        <th scope="col">id_news</th>
                        <th scope="col">id_categoryNews</th>
                        <th scope="col">title_news</th>
                        <th scope="col">description_news</th>
                        <th scope="col">content_news</th>
                        <th scope="col">urlImage_news</th>
                        <th scope="col">image new</th>
                        <th scope="col">dateCreate_post</th>
                        <th scope="col">numberOfReaders_news</th>
                        <th scope="col">Sửa </th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // PHẦN HIỂN THỊ TIN TỨC
                    // BƯỚC 6: HIỂN THỊ DANH SÁCH TIN TỨC
                    while ($row = mysqli_fetch_assoc($result)){
                    ?>
            
                    <tr>
                        <th scope="row">
                            <?php echo $row['id_news']; ?>
                        </th>
                        <td>
                            <?php echo $row['id_categoryNews']; ?>
                        </td>
                        <td>
                            <?php echo $row['title_news']; ?>
                        </td>
                        <td>
                            <?php echo $row['description_news']; ?>
                        </td>
                        <td style="overflow: scroll; -webkit-line-clamp: 10; -webkit-box-orient: vertical; display: -webkit-box; width: 500px;">
                            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                                <?php echo $row['content_news']; ?>
                            </div>
                        </td>
                        <td>
                            <a href="<?php echo $row['urlImage_news']; ?>">
                                <?php echo $row['urlImage_news']; ?>
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo $row['urlImage_news']; ?>">
                                <img style="width: 100px; height 100px;" src="<?php echo $row['urlImage_news']; ?>">
                            </a>
                            </td>
                        <td>
                            <?php echo $row['dateCreate_post']; ?>
                        </td>
                        <td>
                            <?php echo $row['numberOfReaders_news']; ?>
                        </td>
                        <td>
                            <a style="background-color: yellow; padding: 5px 10px; color: black;" href="ad_news_update.php?id_news=<?php echo $row['id_news']; ?>">Sửa</a>
                        </td>
                        <td>
                            <a onclick="return remove(<?php echo $row['id_news']; ?>)" style="background-color: red; padding: 5px 10px; color: black;" href="ad_news_remove.php?id_news=<?php echo $row['id_news']; ?>">Xóa</a>
                        </td>
                    </tr>
            
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>


        <div class="container">
        <div class="row justify-content-begin">
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                <nav aria-label="Page navigation example" style="left: 0; bottom: 0; margin: 20px; position: fixed; z-index: 100000;">
                    <p style="color: red; font-size: 20px;">
                        Mục trang
                    </p>
                    <ul class="pagination">
                        
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<li class="page-item" style="margin: 0px 2px;"><a class="page-link" href="ad_news_paging.php?page='.($current_page - 1).'">Prev</a></li>';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<li class="page-item" style="margin: 0px 2px;"><a class="page-link" style="color: red; border: 1px solid red;" href="ad_news_paging.php?page='.($current_page).'">'.$i.'</a></li> ';
                    
                }
                else{
                    echo ' <li class="page-item"><a class="page-link" href="ad_news_paging.php?page='.$i.'">'.$i.'</a></li>';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<li class="page-item" style="margin: 0px 2px;"><a class="page-link" href="ad_news_paging.php?page='.($current_page + 1).'">Next</a></li> ';
            }
           ?>
                        <li class="page-item" style="margin: 0px 2px;">
                        
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>