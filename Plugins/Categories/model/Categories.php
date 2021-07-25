<?php

class Categories extends AppModel {
    public static function get()
    {
        return $categories = [
            1 => [
                'name' => 'Category 1',
            ],
            2 => [
                'name' => 'Category 2',
            ],
            3 => [
                'name' => 'Category 3',
            ],
        ];
    }
}