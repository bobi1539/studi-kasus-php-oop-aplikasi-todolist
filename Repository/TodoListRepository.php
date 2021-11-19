<?php

namespace Repository;

use Entity\TodoList;

interface TodoListRepository
{
    public function save(TodoList $todoList): void;

    public function findAll(): array;

    public function remove(int $number): bool;
}

class TodoListRepositoryImpl implements TodoListRepository
{

    private array $todoList = [];

    public function save(TodoList $todoList): void
    {
        $number = sizeof($this->todoList) + 1;
        $this->todoList[$number] = $todoList;
    }

    public function findAll(): array
    {
        return $this->todoList;
    }

    public function remove(int $number): bool
    {
        if($number > sizeof($this->todoList)) {
            return false;
        }

        for ($i = $number; $i < sizeof($this->todoList); $i++) {
            $this->todoList[$i] = $this->todoList[$i + 1];
        }

        unset($this->todoList[sizeof($this->todoList)]);

        return true;

    }
}
