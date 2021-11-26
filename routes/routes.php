<?php
use Controllers\MainController;
use Controllers\ArticlesController;

return [
    '~^articles/(\d+)$~' => [ArticlesController::class, 'view'],
    '~^$~' => [MainController::class, 'main'],
];