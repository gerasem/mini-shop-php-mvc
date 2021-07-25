<?php

class Items extends AppModel
{
    public static function addItem($newItem)
    {
        $requiredFields = [
            'name',
            'price',
            'alias',
            'image_alias',
            'description',
            'category_id',
        ];

        $emptyFields = self::validate($requiredFields, $newItem);

        if (empty($emptyFields)) {
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
        } else {
            return $emptyFields;
        }

        return true;
    }

    public static function getNewItems($limit = 4)
    {
        $newItems = R::find('items', 'ORDER BY date desc LIMIT ?', [$limit]);
        return $newItems;
    }

    private static function validate($requiredFields, $newItem)
    {
        $emptyFields = [];
        foreach ($requiredFields as $field) {
            if (empty($newItem[$field])) {
                $emptyFields[] = $field;
            }
        }
        return $emptyFields;
    }
}