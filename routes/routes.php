<?php
use Controllers\MainController;
use Controllers\ArticlesController;

return [
    '~^articles/(\d+)$~' => [ArticlesController::class, 'view'],
    '~^articles/(\d+)/edit$~' => [ArticlesController::class, 'edit'],
    '~^$~' => [MainController::class, 'main'],
];