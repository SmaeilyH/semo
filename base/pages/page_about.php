<html>
    <?php include 'ex/_head.php'; ?>
    <body>
        <!-- Start Menu -->
<?php include 'ex/_menu.php'; ?>
        <!-- End Menu -->
        <div class="about-box">
            <br /><br />
            <?php
            $query = $conn->query("SELECT * FROM `data` WHERE id=1");
            $fetch = $query->fetch_array(MYSQLI_ASSOC);
            $datapage = $fetch['about'];
            echo $datapage;
            ?>
            <br /><br />
        </div>
         <?php include 'ex/_footer.php'; ?>
    </body>
</html>
