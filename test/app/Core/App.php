<?php

namespace App\Core;

class App
{
    protected $controller;
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        $controllerName = 'HomeController';

        if (isset($url[0]) && file_exists(__DIR__ . '/../Controllers/' . ucfirst($url[0]) . 'Controller.php')) {
            $controllerName = ucfirst($url[0]) . 'Controller';
            unset($url[0]);
        }

        $controllerClass = '\\App\\Controllers\\' . $controllerName;
        $this->controller = new $controllerClass();

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl()
    {
        if (isset($_GET['url'])) {
            $url = filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL);
        } else {
            $requestUri = $_SERVER['REQUEST_URI'] ?? '';
            $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
            $path = parse_url($requestUri, PHP_URL_PATH);
            $basePath = str_replace('\\', '/', dirname($scriptName));

            if ($basePath !== '/' && $basePath !== '\\' && strpos($path, $basePath) === 0) {
                $path = substr($path, strlen($basePath));
            }

            $url = trim($path, '/');
        }

        if ($url === '') {
            return ['home'];
        }

        return explode('/', $url);
    }
}