<?php
include ROOT . '/controllers/AppController.php';

final class AdminController extends AppController
{
    public function index()
    {
        require_once ROOT . '/Plugins/Admin/view/admin/index.php';

        return true;
    }

    public function login()
    {
        require_once ROOT . '/Plugins/Admin/view/admin/login.php';

        return true;
    }
}