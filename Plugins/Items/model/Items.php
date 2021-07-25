<?php

class Items extends AppModel
{
    /**
     * New Item insert
     * @param $newItem
     * @return bool|string
     */
    public static function addItem($newItem)
    {
        try {
            // check if alias is already in use
            if (self::_aliasDuplicate($newItem['alias'])) {
                throw new Exception("The alias is already in use");
            }
            $newItem['alias'] = self::_generateSlug($newItem['name']);

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

            //DB insert
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
            R::store($item);

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
    public static function getNewItems($limit = 4)
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
        $itemId = self::_getIdFromSlug($slug);
        $item = R::load('items', $itemId);
        return $item;
    }


    /**
     * PRIVATE
     * check alias (slug) duplicate
     * @param $alias
     * @return bool
     */
    private static function _aliasDuplicate($alias)
    {
        if (R::find('items', 'alias = ?', [$alias])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * PRIVATE
     * select if from items where alias is **
     * @param $slug
     * @return string
     */
    private static function _getIdFromSlug($slug)
    {
        return R::getCell('SELECT id FROM items WHERE alias = ?', [$slug]);
    }

    /**
     * PRIVATE
     * generate alias (slug) from string
     * @param $text
     * @param string $divider
     * @return false|string|string[]|null
     */
    private static function _generateSlug($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}