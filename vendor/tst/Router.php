<?php

namespace tst;

class Router
{
    // таблица маршрутов
    protected static array $routes = [];
    // конкретный маршрут
    protected static array $route = [];

    // добавление в таблицу маршрутов
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    // возвращает все маршруты
    public static function getRoutes(): array
    {
        return self::$routes;
    }

    // возвращает конкретный маршруты
    public static function getRoute(): array
    {
        return self::$route;
    }

    // убирает строку запроса из самого запроса
    protected static function removeQueryString($url)
    {
        // если урл не пустой то
        if ($url) {
            // разбиваем строку по символу &
            $params = explode('&', $url, 2);
            if (false === str_contains($params[0], '=')) {
                return rtrim($params[0], '/');
            }
        }
        return '';
    }

    // получаем урл страницы
    public static function dispatch($url)
    {
        //var_dump($url);
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            // echo 'ok';
            // Обьект контроллер
            $controller = 'app\controllers\\' . self::$route['admin_prefix'] . self::$route['controller'] . 'Controller';
            if (class_exists($controller)) {
                // Создаём экземпляр контроллера
                $controllerObject = new $controller(self::$route);
                $controllerObject->getModel();
                $action = self::lowerCamelCase(self::$route['action'] . 'Action');
                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                } else {
                    throw new \Exception("Метод {$controller}::{$action} не найден", 404);
                }
            } else {
                throw new \Exception("Контроллер {$controller} не найден", 404);
            }
        } else {
            // echo 'not ok';
            // Если страница не найдена, выводим 404-ю.
            throw new \Exception("Страница не найдена", 404);
        }
    }

    public static function matchRoute($url): bool
    {
        // return true;
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#", $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }
                if (!isset($route['admin_prefix'])) {
                    $route['admin_prefix'] = '';
                } else {
                    $route['admin_prefix'] = '\\';
                }
                debug($route);
                $route['controller'] = self::upperCamelCase($route['controller']);
                debug($route);
                return true;
            }
        }
        return false;
    }

    // CamelCase
    protected static function upperCamelCase($name): string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    // camelCase
    protected static function lowerCamelCase($name): string
    {
        return lcfirst(self::upperCamelCase($name));
    }
}
