<?php

class Items extends AppModel
{
    const SHOW_BY_DEFAULT = 4;
    /**
     * New Item insert
     * @param $newItem
     * @return bool|string
     */
    public static function addItem($newItem)
    {
        try {
            // check if alias is already in use
            if (self::aliasDuplicate($newItem['alias'], 'items')) {
                throw new Exception("The alias is already in use");
            }
            $newItem['alias'] = self::generateSlug($newItem['name']);

            // check if one of the fields is not filled
            $requiredFields = [
                'name',
                'price',
                'image_alias',
                'category_id',
                'description',
            ];
            foreach ($newItem as $item) {
                if (empty($item) && in_array($item, $requiredFields)) {
                    throw new Exception("One of the fields is not filled");
                }
            }
            if (!empty($newItem['old_price'])) {
                if ($newItem['old_price'] <= $newItem['price']) {
                    throw new Exception("Price is less than old price");
                }
            }
            //DB insert
            $category = R::dispense('categories');
            $category->id = $newItem['category_id'];

            $item = R::dispense('items');
            $item->name = $newItem['name'];
            $item->price = $newItem['price'];
            $item->alias = $newItem['alias'];
            $item->old_price = $newItem['old_price'];
            $item->rating_value = 5;
            $item->rating_count = 0;
            $item->image_alias = $newItem['image_alias'];
            $item->parametrs = '';
            $item->description = $newItem['description'];
            $item->category_id = $newItem['category_id'];
            $item->date = date("Y-m-d H:i:s");
            $category->ownItemsList[] = $item;
            R::store($category);

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    /**
     * Get 4 new items (for main page)
     * @param int $limit
     * @return array
     */
    public static function getNewItems($limit = self::SHOW_BY_DEFAULT)
    {
        $newItems = R::find('items', 'ORDER BY date desc LIMIT ?', [$limit]);
        return $newItems;
    }

    /**
     * Get Item select
     * @param $slug
     * @return \RedBeanPHP\OODBBean
     */
    public static function getItem($slug)
    {
        $itemId = self::getIdFromSlug($slug, 'items');
        $item = R::load('items', $itemId);
        return $item;
    }

    public static function getItemsFromCategory($slug)
    {
        $categoryId = self::getIdFromSlug($slug, 'categories');
        $items = R::load('categories', $categoryId);
        return $items;
    }

    public static function getAllItems()
    {
        $items = R::find( 'items');
        return $items;
    }


}