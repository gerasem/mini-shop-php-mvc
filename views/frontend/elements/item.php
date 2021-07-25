<div class="column">
    <a class="card" href="<?=$item->alias?>">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="/images/<?=$item->image_alias?>.png" alt="<?=$item->name?>">
            </figure>
        </div>
        <div class="card-content">
            <p class="title is-4"><?=$item->name?></p>
            <p class="subtitle is-6"><?=$item->price?> Euro</p>
        </div>
        <footer class="card-footer">
            <a href="#" class="card-footer-item">Favorite</a>
            <a href="#" class="card-footer-item">Buy</a>
        </footer>
    </a>
</div>