<?php


namespace tst;

// Стандартный контроллер, от которого будут наследываться другие.
abstract class Controller
{

    public array $data = [];
    public array $meta = [];
    public false|string $layout = '';
    public string $view = '';
    public object $model;

    // Принимает маршрут.
    public function __construct(public $route = [])
    {
    }

    public function getModel()
    {
        $model = 'app\models\\' . $this->route['admin_prefix'] . $this->route['controller'];
        if (class_exists($model)) {
            $this->model = new $model();
        }
    }

    public function getView()
    {
        $this->view = $this->view ?: $this->route['action'];
        (new View($this->route, $this->layout, $this->view, $this->meta))->render($this->data);
    }
    // Передаются данные из модели в массив data
    public function set($data)
    {
        $this->data = $data;
    }
    // Из контроллера в шаблон передаём метаданные страницы.
    public function setMeta($title = '', $description = '', $keywords = '')
    {
        $this->meta = [
            'title' => $title,
            'description' => $description,
            'keywords' => $keywords,
        ];
    }
}
