<html>
    <?php include 'ex/_head.php'; ?>
    <body>
         <?php include 'ex/_menu.php'; ?>
        <div class="about-box">
            <br /><br />
            <?php
            $query = $conn->query("SELECT * FROM `data` WHERE id=1");
            $fetch = $query->fetch_array(MYSQLI_ASSOC);
            $datapage = $fetch['contact'];
            echo $datapage;
            ?>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d841.882164322189!2d51.73018545309067!3d32.43178153488461!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fbc6a7ee93867e5%3A0x483de8794cb771e2!2z2KfYtdmB2YfYp9mGINmC2LfYsdmH!5e0!3m2!1sfa!2sir!4v1469356435344" width="100%" height="75%" frameborder="0" style="border:0" allowfullscreen></iframe>
            <br /><br />
        </div>
         <?php include 'ex/_footer.php'; ?>
    </body>
</html>
