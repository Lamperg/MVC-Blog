<?php

//Router class
Class Router {

    private $path;
    private $args = array();

    function __construct() {
        
    }

    //Set path to controllers folder
    function setPath($path) {
        $path = rtrim($path, '/\\');
        $path .= DS;

        if (is_dir($path) == false) {
            throw new Exception('Invalid controller path: `' . $path . '`');
        }
        $this->path = $path;
    }

    //The definition of the controller and action from URL
    private function getController(&$file, &$controller, &$action, &$args) {
        $route = (empty($_GET['route'])) ? '' : $_GET['route'];
        unset($_GET['route']);
        if (empty($route)) {
            $route = 'index';
        }

        //Getting parts URL
        $route = trim($route, '/\\');
        $parts = explode('/', $route);

        //Search controller
        $cmd_path = $this->path;
        foreach ($parts as $part) {
            $fullpath = $cmd_path . $part;
            if (is_dir($fullpath)) {
                $cmd_path .=$part . DS;
                array_shift($parts);
                continue;
            }

            //Find file
            if (is_file($fullpath . '.php')) {
                $controller = $part;
                array_shift($parts);
                break;
            }
        }

        //Default index use
        if (empty($controller)) {
            $controller = 'index';
        }

        //Getting action
        $action = array_shift($parts);
        if (empty($action)) {
            $action = 'index';
        }
        $file = $cmd_path . $controller . '.php';
        $args = $parts;
    }

    function start() {
        //Analyze path
        $this->getController($file, $controller, $action, $args);

        if (is_readable($file) == false) {
            die('404 Not Found');
        }
        include ($file);
        $class = 'Controller_' . $controller;
        $controller = new $class();

        if (is_callable(array($controller, $action)) == false) {
            die('404 Not Found');
        }
        $controller->$action();
    }

}
