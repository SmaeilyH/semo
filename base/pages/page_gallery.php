<html>
    <?php include 'ex/_head.php'; ?>
    <body>
        <!-- Start Menu -->
<?php include 'ex/_menu.php'; ?>
        <!-- End Menu -->
        <script>
  $( function() {
    // run the currently selected effect
    function runEffectkht() {
      // Most effect types need no options passed by default
      var options = {};
      // Run the effect
      $( "#anlc" ).hide( 'blind', options, 250, function() {$( "#azmc" ).hide( 'blind', options, 250, function() {$( "#khtc" ).toggle( 'blind', options, 250 );} );} );
      $("#kht").css('background' , '#6497f6');
      $("#azm").css('background' , '#95baff');
      $("#anl").css('background' , '#95baff');
    };
    
    function runEffectazm() {
      // Most effect types need no options passed by default
      var options = {};
 
      // Run the effect
      $( "#khtc" ).hide( 'blind', options, 250, function() {$( "#anlc" ).hide( 'blind', options, 250, function() {$( "#azmc" ).toggle( 'blind', options, 250 );} );} );
      $("#azm").css('background' , '#6497f6');
      $("#kht").css('background' , '#95baff');
      $("#anl").css('background' , '#95baff');
    };
    
    function runEffectanl() {
      // Most effect types need no options passed by default
      var options = {};
 
      // Run the effect
      $( "#azmc" ).hide( 'blind', options, 250, function() {$( "#khtc" ).hide( 'blind', options, 250, function() {$( "#anlc" ).toggle( 'blind', options, 250 );} );} );
      $("#anl").css('background' , '#6497f6');
      $("#kht").css('background' , '#95baff');
      $("#azm").css('background' , '#95baff');
    };
 
    // Set effect from select menu value
    $( "#kht" ).on( "click", function() {
      runEffectkht();
    });
    
    $( "#azm" ).on( "click", function() {
      runEffectazm();
    });
    
    $( "#anl" ).on( "click", function() {
      runEffectanl();
    });
  } );
  </script>
        <div class="about-box">
            <br /><br />
            <ul style="direction: rtl; list-style: none;">
                <li id="kht" style="cursor: pointer; background: #95baff; height: 100px; width: 250px; border-radius: 99px; text-align: center; float: right; margin: auto; margin-right: 10%;"><br /><br />خط تولید</li>
                <li id="azm" style="cursor: pointer; background: #95baff; height: 100px; width: 250px; border-radius: 99px; text-align: center; float: right; margin: auto; margin-right: 10%;"><br /><br />آزمایشگاه</li>
                <li id="anl" style="cursor: pointer; background: #95baff; height: 100px; width: 250px; border-radius: 99px; text-align: center; float: right; margin: auto; margin-right: 10%;"><br /><br />انبار لوله</li>
            </ul>
            <div class="content" id="khtc" style="display: none;">
                <ul id="container" >
                    <?php
                        $query = $conn->query('SELECT * FROM `gallery` WHERE `ac`=1 AND `type`=1');
                        while ($fetch = $query->fetch_array(MYSQLI_ASSOC)){
                    ?>
                    <li class="element home germany"><a href="ex/photo/gallery/<?php echo $fetch['img']; ?>" title="<?php echo $fetch['title']; ?> &nbsp; <?php echo $fetch['date']; ?>" data-fancybox-group="group1" class="popup">
                        <div class="images"><img src="ex/photo/gallery/<?php echo $fetch['img']; ?>" alt="" style="opacity: 0.4" />
                            <div class="title">
                              <div class="title-wrap">
                                <h3><span><?php echo $fetch['title']; ?></span></h3>
                              </div>
                            </div>
                            <div class="subtitle">
                              <div class="subtitle-wrap">
                                <p> <span><?php echo $fetch['date']; ?></span> </p>
                              </div>
                            </div>
                        </div>
                    </a></li>
                        <?php } ?>
                </ul>
            </div>
            <div class="content" id="azmc" style="display: none;">
                <ul id="container" >
                    <?php
                        $query = $conn->query('SELECT * FROM `gallery` WHERE `ac`=1 AND `type`=2');
                        while ($fetch = $query->fetch_array(MYSQLI_ASSOC)){
                    ?>
                    <li class="element home germany"><a href="ex/photo/gallery/<?php echo $fetch['img']; ?>" title="<?php echo $fetch['title']; ?> &nbsp; <?php echo $fetch['date']; ?>" data-fancybox-group="group1" class="popup">
                        <div class="images"><img src="ex/photo/gallery/<?php echo $fetch['img']; ?>" alt="" style="opacity: 0.4" />
                            <div class="title">
                              <div class="title-wrap">
                                <h3><span><?php echo $fetch['title']; ?></span></h3>
                              </div>
                            </div>
                            <div class="subtitle">
                              <div class="subtitle-wrap">
                                <p> <span><?php echo $fetch['date']; ?></span> </p>
                              </div>
                            </div>
                        </div>
                    </a></li>
                        <?php } ?>
                </ul>
            </div>
            <div class="content" id="anlc" style="display: none;">
                <ul id="container" >
                    <?php
                        $query = $conn->query('SELECT * FROM `gallery` WHERE `ac`=1 AND `type`=3');
                        while ($fetch = $query->fetch_array(MYSQLI_ASSOC)){
                    ?>
                    <li class="element home germany"><a href="ex/photo/gallery/<?php echo $fetch['img']; ?>" title="<?php echo $fetch['title']; ?> &nbsp; <?php echo $fetch['date']; ?>" data-fancybox-group="group1" class="popup">
                        <div class="images"><img src="ex/photo/gallery/<?php echo $fetch['img']; ?>" alt="" style="opacity: 0.4" />
                            <div class="title">
                              <div class="title-wrap">
                                <h3><span><?php echo $fetch['title']; ?></span></h3>
                              </div>
                            </div>
                            <div class="subtitle">
                              <div class="subtitle-wrap">
                                <p> <span><?php echo $fetch['date']; ?></span> </p>
                              </div>
                            </div>
                        </div>
                    </a></li>
                        <?php } ?>
                </ul>
            </div>
            <br /><br />
        </div>
         <?php include 'ex/_footer.php'; ?>
    </body>
</html>