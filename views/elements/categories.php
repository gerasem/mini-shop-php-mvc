<aside class="menu">
    <p class="menu-label">
        Categories
    </p>
    <ul class="menu-list">
        <?php foreach ($categoriesForView as $category): ?>
            <li><a><?= $category['name'] ?></a></li>
        <?php endforeach; ?>
    </ul>
    <p class="menu-label">
        Get Items
    </p>
    <ul class="menu-list">
        <li><a>New Items</a></li>
        <li><a href="/items">All Items</a></li>
    </ul>
</aside>