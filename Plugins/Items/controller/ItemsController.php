<?php
include ROOT . '/controllers/AppController.php';
include ROOT . '/Plugins/Items/model/Items.php';
include ROOT . '/Plugins/Categories/model/Categories.php';

final class ItemsController extends AppController
{
    public function add()
    {
        $categories = Categories::get();

        if (isset($_POST['add_item'])) {
            $newItem = [];
            foreach ($_POST['item'] as $item => $value) {
                $newItem[$item] = $this->clearData($value);
            }
            $result = Items::addItem($newItem);
            if ($result !== true) {
                $emptyFields = $result;
            } else{
                $success = true;
            };
        }
        require_once ROOT . '/Plugins/Items/view/items/add.php';

        return true;
    }
}