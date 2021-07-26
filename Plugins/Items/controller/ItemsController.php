<?php

include ROOT . '/Plugins/Items/model/Items.php';
include ROOT . '/Plugins/Categories/model/Categories.php';

final class ItemsController extends AppController
{
    public function add()
    {
        $categoriesForView = Categories::getCategories();

        if (isset($_POST['add_item'])) {
            $newItem = [];
            foreach ($_POST['item'] as $item => $value) {
                $newItem[$item] = $this->clearData($value);
            }
            $result = Items::addItem($newItem);
            if ($result === true) {
                setcookie("message", "New item added", time() + 1, '/');
                header("Location: /items/add");
                exit;
            } else {
                $errorForView = $result;
            }

        }

        require_once ROOT . '/Plugins/Items/view/add.php';

        return true;
    }

    public function getItem($alias)
    {
        $categoriesForView = Categories::getCategories();
        $itemForView = Items::getItem($alias);
        require_once ROOT . '/Plugins/Items/view/getItem.php';

        return true;
    }

    public function getItemsFromCategory($categoryAlias, $page = 1)
    {
        $categoryAliasForView = $categoryAlias;
        $categoriesForView = Categories::getCategories();
        $itemsForView = Items::getItemsFromCategory($categoryAlias, $page);
        $total = Items::getItemsCount($categoryAlias);
        $pagination = new Pagination($total, $page, Items::SHOW_BY_DEFAULT, 'page-');
        require_once ROOT . '/Plugins/Items/view/getItemsFromCategory.php';
        return true;
    }

    public function getAllItems($page = 1)
    {
        $categoriesForView = Categories::getCategories();
        $itemsForView = Items::getAllItems($page);
        $total = Items::getItemsCount(0);
        $pagination = new Pagination($total, $page, Items::SHOW_BY_DEFAULT, 'page-');
        require_once ROOT . '/Plugins/Items/view/getAllItems.php';
        return true;
    }

    public function getNewItems()
    {
        $categoriesForView = Categories::getCategories();
        $newItemsForView = Items::getNewItems(40);
        require_once ROOT . '/Plugins/Items/view/getNewItems.php';

        return true;
    }
}