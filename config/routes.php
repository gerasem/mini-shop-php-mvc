<?php
return [
    'admin' => 'admin/admin/index',
    'admin/login' => 'admin/admin/login',

    'items/all/page-([0-9]+)' => 'items/items/getAllItems/$1',
    'items/all' => 'items/items/getAllItems',

    'items/add' => 'items/items/add',
    'items/edit/([0-9]+)' => 'items/items/edit',
    'items/delete/([0-9]+)' => 'items/items/delete',

    'items/new' => 'items/items/getNewItems',

    'item/([a-zA-Z0-9_\-\.]+)' => 'items/items/getItem/$1',
    'categories/add' => 'categories/categories/add',

    'category/([a-zA-Z0-9_\-\.]+)/page-([0-9]+)' => 'items/items/getItemsFromCategory/$1/$2',
    'category/([a-zA-Z0-9_\-\.]+)' => 'items/items/getItemsFromCategory/$1',

    'index.php' => '/frontend/index',
    'index' => '/frontend/index',
    'index.html' => '/frontend/index',
    '' => '/frontend/index',
];
