<?php
namespace App;

use AltoRouter;
use Exception;

class Router {
    private $viewPath;
    private $router;

    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
        $this->router = new \AltoRouter();
    }

    public function get(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('GET', $url, $view, $name);
        return $this;
    }

    public function match(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('GET|POST', $url, $view, $name);
        return $this;
    }

    public function post(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('POST', $url, $view, $name);
        return $this;
    }

    public function url(string $name, array $params = []){
        return $this->router->generate($name, $params);
    }

    public function run(): self
    {
        $match = $this->router->match();
        $params = $match['params'];
        $view = $match['target'];
        // dd($match);
        $name = $match['name'];
        $router = $this;
        
      
        try {
            $title = $name;
            ob_start();
            require $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php';
            $content = ob_get_clean();
            if($view=='indexControllers' || $view == 'loginControllers' || $view == 'signupControllers'){
                require '../templates/layoutHome.php';
            }else {
                require '../templates/layout.php';
            }
            
        } catch(Exception $e){
            header('Location: '.$this->url('login') . '?forbidden=1');
            exit();
        }
        return $this;
    }
}