<div id="intro-carousel" class="carousel slide" data-ride="carousel" data-interval="false">

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="/static/images/space/<?=$space?>-1.jpg" alt="<?=$space?>">
        </div>
        <?php foreach(range(2,$number) as $i):?>
        <div class="item">
            <img src="/static/images/space/<?=$space?>-<?=$i?>.jpg" alt="<?=$space?>">
        </div>
        <?php endforeach;?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#intro-carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#intro-carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
