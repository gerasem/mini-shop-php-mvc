<!doctype html>
<html lang="de" class="">
<head>
    <?php include ROOT . '/views/elements/head.php'; ?>
    <meta name="description" content="">
    <title></title>
</head>
<body>
<div class="container is-fluid">
    <?php include ROOT . '/views/elements/navbar.php'; ?>
</div>
<div class="container is-fluid">
    <div class="columns">
        <div class="column is-one-fifth">
            <?php include ROOT . '/views/elements/categories.php'; ?>
        </div>
        <div class="column">
            <h1 class="title is-1">New items</h1>
            <?php if (empty($newItemsForView)) : ?>
                <p class="block">Nothing found</p>
            <?php endif; ?>
            <div class="columns">
                <?php
                foreach ($newItemsForView as $item) {
                    include ROOT . '/views/elements/item.php';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include ROOT . '/views/elements/footer.php'; ?>
</body>
</html>

