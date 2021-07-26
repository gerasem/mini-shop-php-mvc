<aside class="menu">
    <p class="menu-label">
        Categories
    </p>
    <ul class="menu-list">
        <?php foreach ($categoriesForView as $category): ?>
            <li>
                <a class="<?= $categoryAliasForView == $category['alias'] ? 'is-active' : '' ?>"
                   href="/category/<?= $category['alias'] ?>">
                    <?= $category['name'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <p class="menu-label">
        Get Items
    </p>
    <ul class="menu-list">
        <li>
            <a class="<?= $_SERVER['REQUEST_URI'] == '/items/new' ? 'is-active' : '' ?>"
            href="/items/new">New Items</a>
        </li>
        <li>
            <a class="<?= $_SERVER['REQUEST_URI'] == '/items/all' ? 'is-active' : '' ?>"
            href="/items/all">All Items</a>
        </li>
    </ul>
</aside>