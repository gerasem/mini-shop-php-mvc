<?php

class Items extends AppModel
{
    const SHOW_BY_DEFAULT_ON_MAIN_PAGE = 4;
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
    public static function getNewItems($limit = self::SHOW_BY_DEFAULT_ON_MAIN_PAGE)
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

    /**
     * Get Items from category
     * @param $slug
     * @param int $page
     * @return mixed
     */
    public static function getItemsFromCategory($slug, $page = 1)
    {
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $categoryId = self::getIdFromSlug($slug, 'categories');
        $items = R::load('categories', $categoryId);

        $result['categoryName'] = $items->name;
        $result['items'] = $items->with('LIMIT ? OFFSET ?', [
            self::SHOW_BY_DEFAULT,
            $offset,
        ])->ownItemsList;
        return $result;
    }

    /**
     * Get all items
     * @param int $page
     * @return array
     */
    public static function getAllItems($page = 1)
    {
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $items = R::find('items', 'LIMIT :limit OFFSET :offset', [
            'limit' => self::SHOW_BY_DEFAULT,
            'offset' => $offset,
        ]);
        return $items;
    }

    /**
     * get count items
     * @param $categoryId
     * @return int
     */
    public static function getItemsCount($slug)
    {
        if($slug === 0) {
            return R::count('items');
        } else {
            $categoryId = self::getIdFromSlug($slug, 'categories');
            return R::count('items', ' categories_id = ? ', [$categoryId]);
        }
    }
}