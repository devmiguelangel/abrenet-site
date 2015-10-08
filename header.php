<?php

require 'classes/Menu.class.php';
require 'classes/Slider.php';

$lang = 'en';
if(isset($_GET['lang'])){
    $lang = strtolower(htmlspecialchars($_GET['lang']));
}else{
    $lang = 'en';
}

$slider = new Slider($lang);

$page = 1;
if(isset($_GET['71860c77c6745379b0d44304d66b6a13'])){
    $page = $_GET['71860c77c6745379b0d44304d66b6a13'];
}else{
    $page = 1;
}

function setLinkLang($lang){
    if($lang == 'en'){
?>

<script type="text/javascript">
$("#en-link").css({
    'color': '#808080',
    'cursor': 'none'
});
$("#en-link").click(function(e){ e.preventDefault(); });
</script>

<?php
    }elseif($lang == 'es'){
?>

<script type="text/javascript">
$("#es-link").css({
    'color': '#808080', 'cursor': 'none'
});
$("#es-link").click(function(e){ e.preventDefault(); });
</script>

<?php
    }
}


?>

<!DOCTYPE HTML>
<html>
<head>
<title>Abrenet</title>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="description" content="Abrenet Insurance for all" />
<meta name="author" content="Coboser" />
<meta name="keywords" content="Abrenet, abrenet, insurance, insurance for all, Coboser, coboser, la paz, bolivia, la paz bolivia, bancassurance, bancassurance solution, bancassurance software, bancassurance software solution, bancassurance automation, automated bancassurance, insurance software, insurance solution, broker insurance software, broker insurance solution, insurance automation, broker system solution, broker software solution, sistema para seguros masivos, software para seguros masivos, software para banca seguros, sistema para banca seguros, automatización de seguros, software banca seguros " />

    <link rel="stylesheet" href="responsiveSlides/responsiveslides.css" type="text/css">
    <link type="text/css" href="css/style-an.css" rel="stylesheet" />

<!--[if gte IE 9]>
  <style type="text/css">
    body {
       filter: none;
    }
  </style>
<![endif]-->

<!--[if lte IE 8]>
    <style type="text/css">
        #logo #logo-abrenet{
            background: url(img/abrenet-ie.png);
        }
    </style>
<![endif]-->


<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/modernizr.custom.40244.js"></script>
<script type="text/javascript" src="js/jquery.scrollTo.js"></script>
<script type="text/javascript" src="carouFredSel/jquery.carouFredSel-6.2.0.js"></script>
<script type="text/javascript" language="javascript" src="carouFredSel/helper-plugins/jquery.ba-throttle-debounce.min.js"></script>

<script src="responsiveSlides/responsiveslides.min.js"></script>

<script type="text/javascript" src="js/script-an.js"></script>
</head>
<?php
if($page != 1){
?>
<script type="text/javascript">
$(document).ready(function(){
    $.scrollTo('#content-main',1000);
})
</script>
<?php
}
?>
<body>
    <header>
        <div id="logo">
            <a href="index.php">
                <div id="logo-abrenet"></div>
                <p class="desc-logo">... Insurance for all</p>
            </a>
        </div>
        
        <div id="number-contact">
            <p>+1-305-390-2823</p>
            <div class="language">
                <a href="?lang=en&71860c77c6745379b0d44304d66b6a13=<?php echo $page; ?>" id="en-link">English</a> | 
                <a href="?lang=es&71860c77c6745379b0d44304d66b6a13=<?php echo $page; ?>" id="es-link">Español</a>
<?php
setLinkLang($lang);
?>
            </div>
        </div>
    </header>
    
    <nav>
<?php
$menu = new Menu();
$menu->menuMainMenu($lang,$page);

?>      
    </nav>
    <div id="main">
        <?= $slider->getSlider() ;?>