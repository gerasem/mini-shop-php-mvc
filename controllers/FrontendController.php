<?php
include ROOT . '/controllers/AppController.php';
include ROOT . '/Plugins/Categories/model/Categories.php';
include ROOT . '/Plugins/Items/model/Items.php';

final class FrontendController extends AppController
{
    public function index()
    {
        $categories = Categories::get();

        $newItems = Items::getNewItems();
        require_once ROOT.'/views/frontend/index.php';

        return true;
    }

}