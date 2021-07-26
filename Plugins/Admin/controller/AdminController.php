<?php

final class AdminController extends AppController
{
    public function index()
    {
        require_once ROOT . '/Plugins/Admin/view/index.php';

        return true;
    }

    public function login()
    {
        require_once ROOT . '/Plugins/Admin/view/login.php';

        return true;
    }
}