<aside class="menu">
    <ul class="menu-list">
        <?php foreach ($categories as $category): ?>
            <li><a><?= $category['name'] ?></a></li>
        <?php endforeach; ?>
        <li><a>New Items</a></li>
        <li><a href="/items">All Items</a></li>
    </ul>

    <p class="menu-label">
        Categories
    </p>
</aside>