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

  public static function dispatch($url)
  {
    var_dump($url);
  }

}

