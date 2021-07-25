<!doctype html>
<html lang="de" class="">
<body>
<div class="container is-fluid">
    <?php include ROOT . '/views/frontend/elements/navbar.php'; ?>
</div>
<div class="container">
    <h1 class="title is-1">Add Item</h1>
    <?php if (!empty($emptyFields)): ?>
        <div class="notification is-danger">
            <button class="delete"></button>
            <h3 class="title is-4">These fields are required:</h3>
            <ul>
                <?php foreach ($emptyFields as $field): ?>
                    <li><?= ucfirst($field) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (isset($success)) : ?>
        <div class="notification is-success">
            <button class="delete"></button>
            <h3 class="title is-4">Success</h3>
        </div>
    <?php endif; ?>

    <form action="<?= htmlspecialchars($_SERVER["REQUEST_URI"]) ?>" method="post">
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Name <span>*</span></label>
                    <div class="control">
                        <input class="input" name="item[name]" type="text">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Alias <span>*</span></label>
                    <div class="control">
                        <input class="input" name="item[alias]" type="text">
                    </div>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Price <span>*</span></label>
                    <div class="control">
                        <input class="input" name="item[price]" type="text">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Old Price</label>
                    <div class="control">
                        <input class="input" name="item[old_price]" type="text">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Image alias <span>*</span></label>
                    <div class="control">
                        <input class="input" name="item[image_alias]" type="text">
                    </div>
                </div>
            </div>
        </div>


        <div class="field">
            <label class="label">Category</label>
            <div class="control">
                <div class="select">
                    <select name="item[category_id]">
                        <?php foreach ($categories as $key => $category): ?>
                            <option value="<?= $key ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Description</label>
            <div class="control">
                <textarea class="textarea" name="item[description]"></textarea>
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
<?php include ROOT . '/views/frontend/elements/footer.php'; ?>

</body>
<head>
    <?php include ROOT . '/views/frontend/elements/head.php'; ?>
    <meta name="description" content="">
    <title></title>
</head>
</html>

