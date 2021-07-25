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
<div class="container">
    <h1 class="title is-1">Add Category</h1>
    <?php if (isset($errorForView)): ?>
        <div class="notification is-danger">
            <button class="delete"></button>
            <h3 class="title is-4">Error:</h3>
            <p><?= $errorForView ?></p>
        </div>
    <?php endif; ?>

    <?php if (isset($_COOKIE["message"])) : ?>
        <div class="notification is-success">
            <button class="delete"></button>
            <h3 class="title is-4">Success</h3>
            <p><?= $_COOKIE["message"] ?></p>
        </div>
    <?php endif; ?>

    <form action="<?= htmlspecialchars($_SERVER["REQUEST_URI"]) ?>" method="post">
        <nav class="panel">
            <?php foreach ($categoriesForView as $category) : ?>
                <a class="panel-block">
                    <?= $category['name'] ?>
                </a>
            <?php endforeach; ?>

            <div class="panel-block">
                <p class="control">
                    <input class="input" name="new_category" type="text" placeholder="New Category">
                </p>
            </div>
            <div class="panel-block">
                <input type="submit" name="add_category" class="button is-link is-outlined" value="Add Category"/>
            </div>
        </nav>
    </form>
</div>
<?php include ROOT . '/views/elements/footer.php'; ?>