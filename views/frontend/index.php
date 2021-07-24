<!doctype html>
<html lang="de" class="">
<head>
    <?php include 'elements/head.php'; ?>
    <meta name="description" content="">
    <title></title>
</head>
<body>
<div class="container is-fluid">
    <?php include 'elements/navbar.php'; ?>
</div>
<div class="container is-fluid">
    <div class="columns">
        <div class="column is-one-fifth">
            <?php include 'elements/categories.php'; ?>
        </div>
        <div class="column">
            <h1 class="title is-1">New items</h1>
            <div class="columns">
                <?php include 'elements/item.php' ?>
                <?php include 'elements/item.php' ?>
                <?php include 'elements/item.php' ?>
            </div>
            <div class="block content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias animi ducimus eaque ex
                excepturi officia provident sed temporibus tenetur unde, velit, vero. Alias autem nam odio placeat quasi
                velit.
            </div>
        </div>
    </div>
</div>

<?php include 'elements/footer.php'; ?>
</body>
</html>

