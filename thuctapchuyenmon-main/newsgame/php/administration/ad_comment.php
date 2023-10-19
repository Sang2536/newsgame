<div class="container">
        <div class="row justify-content-center" style="margin: 50px 0px 10px 0px;">
            <div class="col-lg-6">
                <a href="/newsgame/php/administration/ad_category_news_add.php" class="btn btn-primary stretched-link">Add categorynews</a>       
            </div>

            <!-- search id and id_category -->
            <div class="col-lg-6">
                <div class="row">
                    <p>Search 'id_categorynews' or 'id_categorycategorynews' or 'name_categorynews'</p>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-inline" method="POST">
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputPassword2" class="sr-only">Key word</label>
                                <input type="tect" name="searchCategoryNews" class="form-control" id="inputPassword2" placeholder="Key word">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h3>Database phpMyAdmin (mySQL)</h3>
                <hr>
                
                <div>
                    <table class="table table-dark table-hover table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">id_categoryNews</th>
                                <th scope="col">name_categoryNews</th>
                                <th scope="col">link_categoryNews</th>
                                <th scope="col">Sửa </th>
                                <th scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                //  số dữ liệu của bảng ... có trong db
                                echo 'Số dữ liệu có trong bảng là ' . mysqli_num_rows($result) . '<br />';

                                 //  lặp hết dữ liệu có trong db
                                 if (mysqli_num_rows($result) > 0) {
                                    //  hiển thị dữ liệu ra website
                                    while($row = mysqli_fetch_assoc($result)) { 
                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $row['id_categoryNews']; ?>
                                </th>
                                <td>
                                    <?php echo $row['name_categoryNews']; ?>
                                </td>
                                <td>
                                    <?php echo $row['link_categoryNews']; ?>
                                </td>
                                <td>
                                    <a href="ad_category_news_update.php?id_categoryNews=<?php echo $row['id_categoryNews']; ?>">Sửa</a>
                                </td>
                                <td>
                                    <a onclick="return remove(<?php echo $row['id_categoryNews']; ?>)" href="ad_category_news_remove.php?id_categoryNews=<?php echo $row['id_categoryNews']; ?>">Xóa</a>
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                                else {
                                    echo '0 result';
                                }
        
                                //  đóng kết nối
                                mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');

    $sql = 'SELECT * FROM categorynews';

    if(isset($_POST['searchCategoryNews']) && $_POST['searchCategoryNews'] != ''){
        $sql = 'SELECT * FROM categorynews WHERE id_categoryNews like "%' . $_POST['searchCategoryNews'] .'%" or name_categoryNews like "%' . $_POST['searchCategoryNews'] .'%"';
    }
    
    $result = mysqli_query($conn, $sql);