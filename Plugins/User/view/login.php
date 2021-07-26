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
    <h1 class="title is-1">User log in</h1>

    <?php if (isset($errors) && is_array($errors)): ?>
        <div class="notification is-danger">
            <button class="delete"></button>
            <h3 class="title is-4">Error:</h3>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= htmlspecialchars($_SERVER["REQUEST_URI"]) ?>" method="post">
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">E-Mail <span>*</span></label>
                    <div class="control">
                        <input required class="input" type="email" name="email" placeholder="E-Mail"
                               value="<?= $email ?>"/>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Password <span>*</span></label>
                    <div class="control">
                        <input required class="input" type="password" name="password" placeholder="Password"
                               value="<?= $password ?>"/>
                    </div>
                </div>
            </div>
        </div>
        <input class="button is-link" type="submit" name="submit" value="log in"/>
    </form>
</div>


<?php include ROOT . '/views/elements/footer.php'; ?>