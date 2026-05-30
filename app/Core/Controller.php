<?php

namespace App\Core;

class Controller
{
    public function view(string $view, array $data = [])
    {
        extract($data);
        require_once __DIR__ . '/../Views/' . $view . '.php';
    }

    public function model(string $model)
    {
        require_once __DIR__ . '/../Models/' . $model . '.php';
        $model = '\\App\\Models\\' . $model;
        return new $model();
    }
}
