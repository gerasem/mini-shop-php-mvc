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
            <h1 class="title is-1"><?= $itemForView->name ?></h1>
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><a href="#">Bulma</a></li>
                    <li><a href="#">Documentation</a></li>
                    <li><a href="#">Components</a></li>
                    <li class="is-active"><a href="#" aria-current="page">Breadcrumb</a></li>
                </ul>
            </nav>
            <div class="columns">
                <div class="column">
                    <figure class="image is-square">
                        <img src="https://bulma.io/images/placeholders/256x256.png">
                    </figure>
                </div>
                <div class="column is-narrow">
                    <figure class="image is-128x128">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                    </figure>
                    <br>
                    <figure class="image is-128x128">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                    </figure>
                </div>
                <div class="column">

                    <nav class="level">
                        <div class="level-item has-text-centered">
                            <div>
                                <p class="heading">Price</p>
                                <?php if (!empty($itemForView->old_price)): ?>
                                    <div class="tag is-danger">
                                        Sale <?= number_format(100 - $itemForView->price / $itemForView->old_price * 100, 2) ?>
                                        %
                                    </div>
                                <?php endif; ?>
                                <p class="title is-1"><small>
                                        <del><?= $itemForView->old_price ?> €</del>
                                    </small> <?= $itemForView->price ?> €
                                </p>

                            </div>
                        </div>
                    </nav>

                    <div class="buttons is-centered">
                        <button class="button is-success">Buy</button>
                        <button class="button is-info">Favorite</button>
                    </div>

                    <div class="content">
                        <?= $itemForView->parametrs ?>
                    </div>
                </div>

            </div>
            <div class="content">
                <?= $itemForView->description ?>
            </div>
        </div>

        <?php //pr($itemForView);exit; ?>

    </div>
<?php include ROOT . '/views/elements/footer.php'; ?>