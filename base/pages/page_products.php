<html>
    <?php include 'ex/_head.php'; ?>
    <body>
        <!-- Start Menu -->
<?php include 'ex/_menu.php'; ?>
        <!-- End Menu -->
        <style>
            html { font-family: Arial, sans-serif; direction: rtl; }
            #final-tg  { width: 80%; margin: 10px auto; display: block; }

            #final-tg ul { margin: 0 auto; padding: 0; height: 50px; }
            #final-tg li { list-style-type: none; }
            #final-tg li a { color: #ccc; float: right; margin: 0 10px 0 0; padding: 5px 10px; text-decoration: none; }
            #final-tg li a:hover, #final-tg li a.selected { background: #95baff; color: #fff; }

            #final-tg .tile .caption {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    width: 100%;
                    background: url(ex/img/opaque.png);
                    font-family: cursive;
                    opacity:0;
                    transition: all .3s;
                    height: 100%;
            }
            #final-tg .tile > * {
                    border: 2px solid #444;
                    border-radius: 4px;
            }
            #final-tg .tile a:hover .caption {
                    opacity:1;
            }
            #final-tg .tile .caption h3 {
                    text-align: center;
                    color: #fff;   
                    margin-top: 2%;
            }
            .load {
                    width: 300px;
                    display: block;
                    margin: 20px auto;
                    color: #fff;
                    text-decoration: none;
                    background: #95baff;
                    padding: 10px;
                    text-align: center;
            }
            .item:hover{width:30%}
        </style>
        <script src="ex/js/jquery.finalTilesGallery.js"></script>
        <section id="final-tg">
        		<h1>محصولات تولیدی ما</h1>
                        <ul class="ftg-filters">
                    <li><a class="selected" href="">همه</a></li>
                    <li><a href="#set-1">لوله ها</a></li>
                    <li><a href="#set-2">اتصالات</a></li>
                </ul>

                <div class="ftg-items">
                    <?php
                        $query = $conn->query('SELECT * FROM `products` WHERE `ac`=1');
                        while ($fetch = $query->fetch_array(MYSQLI_ASSOC)){
                            echo    '<article class="tile ftg-set-' . $fetch['type'] . '">
                                        <a href="' . $addres . 'ptd/' . $fetch['id'] . '">
                                            <img class="item" src="ex/photo/pt/' . $fetch['imgnm'] . '" />
                                            <div class="caption">
                                                <strong><h3>برای اطلاعات بیشتر کلیک کنید</h3></strong>
                                            </div>
                                        </a>
                                    </article>';
                        }
                    ?>
                </div>
            </section>
            <pre></pre>
        
        <script>
            $("#final-tg").finalTilesGallery({
                minTileWidth: 180,
                margin: 30,
                gridCellSize: 20
            });
        </script>
         <?php include 'ex/_footer.php'; ?>
    </body>
</html>
