<head>
        <meta charset="UTF-8">
        <meta lang="fa">
        <title><?php echo config('title'); ?></title>
        <link href="ex/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <script src="ex/js/jquery-1.7.2.min.js" type="text/javascript"></script>
        <script src="ex/js/jquery-ui.js" type="text/javascript"></script>
        <link href="ex/css/animate.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="ex/css/normalize.css">
        <link rel="stylesheet" href="ex/css/ideal-image-slider.css">
        <link rel="stylesheet" href="ex/css/default.css">
	<link rel="stylesheet" href="ex/css/component.css" />
        <link href="ex/css/contact.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="ex/css/styles.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="ex/css/flexslider.css" rel="stylesheet" type="text/css" media="screen">
        <link href="ex/css/jquery.fancybox.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="ex/css/retina-responsive.css" rel="stylesheet" type="text/css" media="screen" />
	<script src="ex/js/modernizr.custom.js"></script>
        <link href="ex/css/leyout.css" rel="stylesheet" type="text/css"/>
            <style media="screen">
            #slider {
                max-width: 900px;
                margin: 50px auto;
            }
            </style>
        <script>
$(function() {
$('a[href*=#]:not([href=#])').click(function() {
if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
var target = $(this.hash);
target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
if (target.length) {
$('html,body').animate({
scrollTop: target.offset().top
}, 1000);
return false;
}
}
});
});
</script>
    </head>