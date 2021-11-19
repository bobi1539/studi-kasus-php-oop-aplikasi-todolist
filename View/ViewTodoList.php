<?php


namespace View;

use Helper\InputHelper;
use Service\TodoListService;

class ViewTodoList
{
    private TodoListService $service;

    public function __construct(TodoListService $service)
    {
        $this->service = $service;
    }

    public function showTodoList()
    {
        while (true) {

            $this->service->showTodoList();

            echo "MENU" . PHP_EOL;
            echo "1. Tambah Todo" . PHP_EOL;
            echo "2. Hapus Todo" . PHP_EOL;
            echo "x. Keluar" . PHP_EOL;

            $result = InputHelper::input("Pilih menu: ");

            if ($result == "1") {
                $this->addTodoList();
            } else if ($result == "2") {
                $this->deleteTodoList();
            } else if ($result == "x") {
                break;
            } else {
                echo "Menu tidak tersedia" . PHP_EOL;
            }
        }
        echo "Good Bye" . PHP_EOL;
    }

    private function addTodoList(): void
    {
        echo "MENAMBAH TODO" . PHP_EOL;

        $todo = InputHelper::input("Todo, x untuk batal");
        if ($todo == "x") {
            echo "Batal Menambah Todo" . PHP_EOL;
        } else {
            $this->service->addTodoList($todo);
        }
    }

    private function deleteTodoList(): void
    {
        echo "MENGHAPUS TODO" . PHP_EOL;

        $number = InputHelper::input("Nomor Todo, x untuk batal");
        if ($number == "x") {
            echo "Batal Menghapus Todo" . PHP_EOL;
        } else {
            $this->service->deleteTodoList($number);
        }
    }
}
