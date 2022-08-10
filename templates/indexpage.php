<div class="container">
    <div class="col-12">
        <div class="carousel slide" data-bs-ride="carousel" id="myCarousel">
            <div class="carousel-inner">
                <?php foreach($pictures as $key => $picture):?>
                <div class="carousel-item <?php if($key==0){echo 'active';}?>">
                    <img src="/imgs/cars_picture/<?=$picture?>" alt="" class="d-block w-100">
                </div>
                <?php endforeach;?>
                <button type="button" class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#myCarousel">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button type="button" class="carousel-control-next" data-bs-slide="next" data-bs-target="#myCarousel">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>
</div>