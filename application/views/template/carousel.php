<div id="carouselExampleCaptions" class="carousel slide simple-carousel" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php $i = 0; ?>
        <?php foreach ($slide as $row) { ?>
            <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $i; ?>" class="<?= $i == 0 ? 'active' : ''; ?>"></li>
        <?php $i++; } ?>
    </ol>

    <div class="carousel-inner">
        <?php $count = 0; ?>
        <?php foreach ($slide as $row) { $count++; ?>
            <div class="carousel-item <?= $count == 1 ? 'active' : ''; ?>">
                <img src="<?= base_url('assets/images/slide/' . $row->image_path); ?>" class="d-block w-100 carousel-img" alt="...">
                <div class="carousel-caption">
                    <p class="slide_title"><?= $row->image_title; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>

    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<style>
/* ==== Simple Carousel Design ==== */
.simple-carousel {
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
  background-color: #fff;
  position: relative;

}

/* ==== Image Style ==== */
.carousel-img {
  border-radius: 5px;
}

.carousel-img:hover {
  transform: scale(1.03);
}


</style>
