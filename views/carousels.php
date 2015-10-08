<section id="banner">
  <div class="text-en"></div>

  <div class="container-banner">
    <div class="image_carousel">
      <div id="foo2">
        <?php foreach ($carousels as $carousel): ?>
        <img src="<?= $carousel['cr_img'] ;?>" title="<?= $carousel['cr_url'] ;?>" onclick="openUrlBanner(this)" />
        <?php endforeach ?>
      </div>
      <div class="clearfix"></div>
      <a class="prev" id="foo2_prev" href="#"><span>prev</span></a>
      <a class="next" id="foo2_next" href="#"><span>next</span></a>
      <div class="pagination" id="foo2_pag"></div>
    </div>
  </div>
</section>