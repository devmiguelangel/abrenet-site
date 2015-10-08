<?php

include_once 'header.php';
require 'classes/Slider.php';

$slider = new Slider($lang);

?>
<div id="main">
    <?= $slider->getSlider() ;?>
    <div id="content-main">
    </div>
</div>
<?php

include_once 'footer.php';

?>