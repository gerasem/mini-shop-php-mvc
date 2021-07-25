<?php
include ROOT . '/controllers/AppController.php';
include ROOT . '/Plugins/Categories/model/Categories.php';

final class FrontendController extends AppController
{
    public function index()
    {
        $categories = Categories::get();
        require_once ROOT.'/views/frontend/index.php';

        return true;
    }

}