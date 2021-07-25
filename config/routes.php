<?php
return [
    'admin' => 'admin/admin/index',
    'admin/login' => 'admin/admin/login',

    'items' => 'items/items/get',
    'items/add' => 'items/items/add',
    'items/edit/([0-9]+)' => 'items/items/edit',
    'items/delete/([0-9]+)' => 'items/items/delete',

    'item/([a-zA-Z0-9_\-\.]+)' => 'items/items/get/$1',

    'index.php' => '/frontend/index',
    'index' => '/frontend/index',
    'index.html' => '/frontend/index',
    '' => '/frontend/index',
];
