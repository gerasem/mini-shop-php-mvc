<?php
$image = "/images/default/item1.png";
if (file_exists(ROOT . "/images/{$item->image_alias}.png")) {
    $image = "/images/{$item->image_alias}.png";
}
?>
<div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="<?= $image ?>" alt="<?= $item->name ?>">
            </figure>
        </div>
        <div class="card-content">
            <p class="title is-4"><?= $item->name ?></p>
            <p class="subtitle is-6"><?= $item->price ?> Euro</p>
        </div>
        <footer class="card-footer">
            <a href="/item/<?= $item->alias ?>" class="card-footer-item">More</a>
            <a href="#" class="card-footer-item">Favorite</a>
            <a href="#" class="card-footer-item">Buy</a>
        </footer>
    </div>
</div>