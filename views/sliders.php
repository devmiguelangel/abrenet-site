<ul class="rslides">
  <?php foreach ($sliders as $slider): 
    $text = array_rand($texts);
  ?>
    <li><img src="<?= $slider['sl_img'] ;?>" alt="<?= $text['tx_texto'] ;?>"></li>
  <?php endforeach ?>
</ul>