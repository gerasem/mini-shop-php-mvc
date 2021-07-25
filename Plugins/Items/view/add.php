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
    <h1 class="title is-1">Add Item</h1>
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
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Name <span>*</span></label>
                    <div class="control">
                        <input class="input" name="item[name]" type="text"
                               value="<?= $newItem['name'] ?? '' ?>">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Alias</label>
                    <div class="control">
                        <input class="input" name="item[alias]" type="text"
                               value="<?= $newItem['alias'] ?? '' ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Price <span>*</span></label>
                    <div class="control">
                        <input required class="input" name="item[price]" type="text"
                               value="<?= $newItem['price'] ?? '' ?>">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Old Price</label>
                    <div class="control">
                        <input class="input" name="item[old_price]" type="text"
                               value="<?= $newItem['old_price'] ?? '' ?>">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Image alias <span>*</span></label>
                    <div class="control">
                        <input required class="input" name="item[image_alias]" type="text"
                               value="<?= $newItem['image_alias'] ?? '' ?>">
                    </div>
                </div>
            </div>
        </div>


        <div class="field">
            <label class="label">Category <span>*</span></label>
            <div class="control">
                <div class="select">
                    <select required name="item[category_id]">
                        <?php foreach ($categoriesForView as $key => $category): ?>
                            <option value="<?= $key ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Description <span>*</span></label>
            <div class="control">
                <textarea required class="textarea"
                          name="item[description]"><?= $newItem['description'] ?? '' ?></textarea>
            </div>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <input type="submit" name="add_item" class="button is-link" value="Submit"/>
            </div>
            <div class="control">
                <button class="button is-link is-light">Cancel</button>
            </div>
        </div>
    </form>
</div>
<?php include ROOT . '/views/elements/footer.php'; ?>