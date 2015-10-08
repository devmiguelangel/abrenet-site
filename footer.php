<?php

// require 'classes/Carrousel.class.php';

?>
<section id="banner">
    <div class="text-en"></div>

    <div class="container-banner">
        <div class="image_carousel">
            <div id="foo2">
<?php
//$carrousel = new Carrousel();
//$carrousel->getCarrousel();

?>
            </div>
            <div class="clearfix"></div>
            <a class="prev" id="foo2_prev" href="#"><span>prev</span></a>
            <a class="next" id="foo2_next" href="#"><span>next</span></a>
            <div class="pagination" id="foo2_pag"></div>
        </div>
    </div>

</section>
    
    <footer>
        <div id="footer-content">
<?php
$menu->getMenuFooter($lang);
?>
        </div>
        <div class="about">
            Powered by <a href="http://www.coboser.com/" target="_blank">Coboser 2013</a>
        </div>
    </footer>
</body>
    
</html>