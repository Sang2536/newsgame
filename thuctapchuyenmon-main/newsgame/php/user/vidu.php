<?php 
    require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/connect/connect.php');
    //require_once('D:/DOWNLOAD/New folder/htdocs/newsgame/php/user/get_userLogin.php');
    

    // news database
    $sqlNews = 'SELECT *, DATEDIFF(DATE(CURDATE()), DATE(dateCreate_post)) AS days_difference
    FROM news
    GROUP BY dateCreate_post, id_news
    HAVING DATEDIFF(DATE(CURDATE()), DATE(dateCreate_post)) >= 0
    ORDER BY days_difference ASC
    LIMIT 3';
    $resultNews = mysqli_query($conn, $sqlNews);
    $rowNews = mysqli_fetch_assoc($resultNews); // lấy data đầu tiên của câu truy vấn SQL
    // Khi lặp sẽ bỏ qua data này và lấy từ data kế tiếp

    //echo '<br/><br/>id_categoryNews' . $rowNews['id_categoryNews'];


    // news database
    $sqlCateNews = 'SELECT * FROM categorynews';
    $resultCateNews = mysqli_query($conn, $sqlCateNews);
    //$rowCateNews = mysqli_fetch_array($resultCateNews);
    
?>


    <style>
        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        .active, .accordion:hover {
            background-color: #80ffe5; 
        }

        .panel {
            padding: 0 18px;
            display: none;
            background-color: white;
            overflow: hidden;
        }
    </style>



    <div class="container">
        <?php
            $sqlCateImg = 'SELECT * FROM categoryimage';
            $resultCateImg = mysqli_query($conn, $sqlCateImg);
            //$rowCateNews = mysqli_fetch_array($resultCateNews);

            if (mysqli_num_rows($resultCateImg) > 0) {
                //  hiển thị dữ liệu ra website

                while($row = mysqli_fetch_assoc($resultCateImg)) {
        ?>
        <div class="row" style="margin: 100px 0px 70px 0px;">
            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                        <button class="accordion">
                            Nhấn vào để xem ảnh
                        </button>

                        <div class="panel">
                            <div class="row">
                                
                                    <?php
                                        // truy vấn đến image
                                        $id_category = $row['id_categoryImage'];
                                        $sqlImg = "SELECT * FROM image WHERE id_categoryImage = $id_category";
                                        $resultImg = mysqli_query($conn, $sqlImg);

                                        while($rowImg = mysqli_fetch_assoc($resultImg)) {
                                    ?>
                                    
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" style="padding: 10px;">
                                        <img src="<?php echo $rowImg['url_image'] ?>" style="width: 100%; height: 400px;" alt="load img false">
                                        <p style="font-size: 20px; text-align:center; height: 100px;"> <?php echo $rowImg['name_image']; ?> </p>
                                    </div>

                                    <?php
                                        }
                                    ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
                }
            }
            else {
                echo '0 result';
            }
        ?>
    </div>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>