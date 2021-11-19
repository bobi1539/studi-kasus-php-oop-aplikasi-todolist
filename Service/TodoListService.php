<?php

namespace Service;

use Entity\TodoList;
use Repository\TodoListRepository;

interface TodoListService
{
    public function showTodoList(): void;

    public function addTodoList(string $todo): void;

    public function deleteTodoList(int $number): void;
}

class TodoListServiceImpl implements TodoListService
{


    private TodoListRepository $repository;

    public function __construct(TodoListRepository $repository)
    {
        $this->repository = $repository;
    }

    public function showTodoList(): void
    {
        $todoList = $this->repository->findAll();

        if ($todoList == null) {
            echo "==Tidak Ada Todo List==" . PHP_EOL;
        } else {
            echo "TODO LIST" . PHP_EOL;
            foreach ($todoList as $number => $value) {
                echo "$number. {$value->getTodoList()}" . PHP_EOL;
            }
        }
    }

    public function addTodoList(string $todo): void
    {
        $todoList = new TodoList($todo);
        $this->repository->save($todoList);
        echo "Sukses Menambahkan Todo" . PHP_EOL;
    }

    public function deleteTodoList(int $number): void
    {
        $result = $this->repository->remove($number);

        if ($result) {
            echo "Sukses Menghapus todo" . PHP_EOL;
        } else {
            echo "Gagal Menghapus todo" . PHP_EOL;
        }
    }
}
