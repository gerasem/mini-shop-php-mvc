<?php
include ROOT . '/controllers/AppController.php';
include ROOT . '/Plugins/Categories/model/Categories.php';
include ROOT . '/Plugins/Items/model/Items.php';

final class FrontendController extends AppController
{
    public function index()
    {
        $categoriesForView = Categories::getCategories();

        $newItemsForView = Items::getNewItems();
        require_once ROOT . '/views/index.php';

        return true;
    }

}