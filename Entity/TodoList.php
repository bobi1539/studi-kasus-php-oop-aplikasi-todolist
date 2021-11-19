<?php

namespace Entity;

class TodoList
{
    private string $todoList;

    public function __construct(string $todoList = "")
    {
        $this->todoList = $todoList;
    }

    public function getTodoList(): string
    {
        return $this->todoList;
    }

    public function setTodoList(string $todoList): void
    {
        $this->todoList = $todoList;
    }
}
