<?php
include ROOT.'/controllers/AppController/AppController.php';

final class FrontendController extends AppController
{
    public function actionIndex()
    {
        require_once $this->render(__FUNCTION__);

        return true;
    }
}