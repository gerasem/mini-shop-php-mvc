<?php

include ROOT . '/Plugins/Items/model/Items.php';
include ROOT . '/Plugins/Categories/model/Categories.php';

final class CategoriesController extends AppController
{
    public function add()
    {
        $categoriesForView = Categories::getCategories();

        if (isset($_POST['add_category'])) {
            $categoryName =  $this->clearData($_POST['new_category']);

            $result = Categories::addCategory($categoryName);
            if($result === true) {
                setcookie("message", "New category added", time() + 1, '/');
                header("Location: /categories/add");
                exit;
            } else{
                $errorForView = $result;
            }

        }

        require_once ROOT . '/Plugins/Categories/view/add.php';

        return true;
    }
}