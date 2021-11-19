<?php

require_once __DIR__ . "/View/ViewTodoList.php";
require_once __DIR__ . "/Entity/TodoList.php";
require_once __DIR__ . "/Helper/InputHelper.php";
require_once __DIR__ . "/Repository/TodoListRepository.php";
require_once __DIR__ . "/Service/TodoListService.php";

use Repository\TodoListRepositoryImpl;
use Service\TodoListServiceImpl;
use View\ViewTodoList;

echo "Aplikasi Todo List OOP" . PHP_EOL;

$repository = new TodoListRepositoryImpl();
$service = new TodoListServiceImpl($repository);
$view = new ViewTodoList($service);

$view->showTodoList();
