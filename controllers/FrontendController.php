<?php
include ROOT . '/controllers/AppController.php';

final class FrontendController extends AppController
{
    public function index()
    {
        require_once ROOT.'/views/frontend/index.php';

        return true;
    }

}