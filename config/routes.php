<?php

use Library\Route;

return  array(
    'default' => new Route('/', 'Site', 'index'),
    'index' => new Route('/index.php', 'Site', 'index'),
    'add' => new Route('/add/', 'Site', 'add'),
    'edit' => new Route('/edit/{id}', 'Site', 'edit', array('id' => '[0-9]+')),
    'search' => new Route('/search/', 'Site', 'search'),

    'app_user' => new Route('/api/users', 'Api', 'users'),
    'app_edit' => new Route('/api/users/{id}', 'Api', 'update', array('id' => '[0-9]+')),
    'app_delete' => new Route('/api/delete/{id}', 'Api', 'delete', array('id' => '[0-9]+')),
    'api_search' => new Route('/api/users/search/{name}', 'Api', 'search', array('name' => '[a-zA-Z]+')),


);


