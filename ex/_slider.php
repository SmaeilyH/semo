<div id="slider" style="direction: ltr; max-width: 100%;">
                <?php
                $query = $conn->query('SELECT * FROM `slider` WHERE `ac`=1');
                while ($fetch = $query->fetch_array(MYSQLI_ASSOC)){
                ?>
		<img src="ex/photo/slider/<?php echo $fetch['img']; ?>" alt="<?php echo $fetch['description']; ?>" />
                <?php } ?>
	</div>
    <script src="ex/js/ideal-image-slider.js"></script>
    <script src="ex/js/iis-bullet-nav.js"></script>
    <script src="ex/js/iis-captions.js"></script>
	<script>
	var slider = new IdealImageSlider.Slider('#slider');
    slider.addBulletNav();
    slider.addCaptions();
    slider.start();
	</script>