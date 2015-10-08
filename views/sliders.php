<section id="slider">
  <div id="wrapper" class="container_16">
    <div class="peKenBurns peNoJs" data-autopause="image" data-thumb="disabled" data-mode="kb" data-controls="always" data-shadow="enabled" data-logo="enabled" >
    <?php foreach ($sliders as $key => $slider): $text = array_rand($texts); ?>
      <div classes="peKb_active" data-delay="5" data-thumb="img/thumbs/kb_01.jpg">
        <img src="<?= $slider['sl_img'] ;?>" alt="Banner Image 2" />
        <h1><?= $text['tx_texto'] ;?></h1>
      </div>
    <?php endforeach ?>
    </div>
  </div>
</section>
