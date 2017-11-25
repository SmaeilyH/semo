<html>
    <?php include 'ex/_head.php'; ?>
    <body>
         <?php include 'ex/_menu.php'; ?>
        <div class="about-box">
            <br /><br /><br /><br />
            <table>
                <?php
                $query = $conn->query('SELECT * FROM `certificates` WHERE `ac`=1');
                while ($fetch = $query->fetch_array(MYSQLI_ASSOC)){
                ?>
                <div style="text-align: center;">
                    <img src="ex/photo/certificates/<?php echo $fetch['img']; ?>" width="40%" /><p><?php echo $fetch['name']; ?></p>
                </div><br /><br /><br />
                <?php } ?>
            </table>
            </div>
            <br /><br />
        </div>
         <?php include 'ex/_footer.php'; ?>
    </body>
</html>
