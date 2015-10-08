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

<script type="text/javascript">
  $(".rslides").responsiveSlides({
    speed: 1000,
    timeout: 4000,
    maxwidth: ""
  });
</script>
<?php

include_once 'footer.php';

?>