<?php

class Categories extends AppModel {

    public static function getCategories()
    {
        $categories = R::find('categories', 'ORDER BY name');
        return $categories;
    }

    public static function addCategory($categoryName)
    {
        try {
            if(empty($categoryName)){
                throw new Exception("Category name is empty");
            }

            $slug = self::generateSlug($categoryName);

            // check if alias is already in use
            if (self::aliasDuplicate($slug, 'categories')) {
                throw new Exception("The alias is already in use");
            }

            $category = R::dispense('categories');
            $category->name = $categoryName;
            $category->alias = $slug;
            R::store($category);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }
}