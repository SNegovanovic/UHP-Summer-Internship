<?php
return array(
    '/'               => 'PagesController:index',

    '/authors/create' => 'AuthorController:create',
    '/authors/update' => 'AuthorController:update',
    '/authors/show'   => 'AuthorController:show',
    '/authors/showAll' => 'AuthorController:showAll',
    '/authors/showAllAsJson' => 'AuthorController:showAllAsJson',
    '/authors/getBy' => 'AuthorController:getBy',
    '/authors/delete' => 'AuthorController:delete',

    '/user/create'    => 'UserController:create',
    '/user/update'   => 'UserController:update',
    '/user/show'    => 'UserController:show',
    '/user/showAll'    => 'UserController:showAll',
    '/user/delete'   => 'UserController:delete',
    '/user/index'   => 'UserController:index',
    '/user/register'   => 'UserController:register',
    '/user/login'   => 'UserController:login',
    '/user/logout'   => 'UserController:logout',

    '/genre/create'   => 'GenreController:create',
    '/genre/update'   => 'GenreController:update',
    '/genre/show'   => 'GenreController:show',
    '/genre/showAll'   => 'GenreController:showAll',
    '/genre/delete'   => 'GenreController:delete',

    '/book/create'    => 'BookController:create',
    '/book/update'    => 'BookController:update',
    '/book/show'    => 'BookController:show',
    '/book/showAll'    => 'BookController:showAll',
    '/book/delete'    => 'BookController:delete',

    '/lending/create' => 'LendingController:create',
    '/lending/update' => 'LendingController:update',
    '/lending/show' => 'LendingController:show',
    '/lending/showAll' => 'LendingController:showAll',
    '/lending/delete' => 'LendingController:delete'
);