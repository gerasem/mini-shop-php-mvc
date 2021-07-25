<?php
include ROOT . '/controllers/AppController.php';
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
            if($result === true) {
                setcookie("message", "New item added", time() + 1, '/');
                header("Location: /items/add");
                exit;
            } else{
                $errorForView = $result;
            }

        }

        require_once ROOT . '/Plugins/Items/view/add.php';

        return true;
    }

    public function get($alias){
        $categoriesForView = Categories::getCategories();
        $itemForView = Items::getItem($alias);
        require_once ROOT . '/Plugins/Items/view/get.php';

        return true;
    }

    public function getItemsFromCategory($alias){
        $categoriesForView = Categories::getCategories();
        $itemsForView = Items::getItemsFromCategory($alias);
        require_once ROOT . '/Plugins/Items/view/getAll.php';

        return true;
    }
}