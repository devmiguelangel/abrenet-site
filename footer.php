<?php

require 'classes/Carousel.php';

$carousel = new Carousel();

?>
    <?= $carousel->getCarousel() ;?>
    </div>
<script type="text/javascript">
    $(".rslides").responsiveSlides({
        speed: 1000,
        timeout: 4000,
        maxwidth: ""
    });

    setCarouFredSel();
</script>
    <footer>
        <div id="footer-content">
<?php
// $menu->getMenuFooter($lang);
?>
        </div>
        <div class="about">
            Powered by <a href="http://www.coboser.com/" target="_blank">Sibas 2013</a>
        </div>
    </footer>
</body>
    
</html>