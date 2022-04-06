<?php

namespace Routers;

use Exception;
use Controllers;

class PatternRouter
{
    private function stripParameters($uri)
    {
        if (str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }

    //Displays general 404 error message
    function display404View()
    {
        http_response_code(404);
        ob_start();
        require __DIR__ . "/../views/_404.php";
        $content = ob_get_clean();
    
        $layout = $this->getLayout();
        return str_replace("{{content}}", $content, $layout);
    }

    //Get the code of the template used on every page. 
    function getLayout()
    {
        ob_start();
        require_once __DIR__ . '/../views/layout.php';
        return ob_get_clean();
    }

    public function route($uri)
    {
        // ignore query parameters
        $uri = $this->stripParameters($uri);

        $explodedUri = explode('/', strtolower($uri));

        // set default controller/method
        $defaultcontroller = 'Home';
        $defaultmethod = 'index';

        // check if we are requesting an api route
        $api = false;
        if (str_starts_with($uri, "api")) {
            $explodedUri[0] = $explodedUri[1];
                
            $explodedUri[1] = null;
            if(isset($explodedUri[2])){
                $explodedUri[1] = $explodedUri[2];
            }
            $api = true;
        }

        // read controller/method names from URL
        if (!isset($explodedUri[0]) || empty($explodedUri[0])) {
            $explodedUri[0] = $defaultcontroller;
        }

        $controllerName = ucfirst($explodedUri[0]) . "Controller";

        if (!isset($explodedUri[1]) || empty($explodedUri[1])) {
            $explodedUri[1] = $defaultmethod;
        }

        $methodName = $explodedUri[1];
        

        if($api){
            $controllerClass = "Api\\" . $controllerName;
        }else{
            $controllerClass = "Controllers\\" . $controllerName;
        }

        if (class_exists($controllerClass)) {
            $controllerObj = new $controllerClass();
        }else{
            echo $this->display404View();
            die();
        }
        if (!method_exists($controllerObj, $methodName)) {
            echo $this->display404View();
            die();
        }

        // dynamically call relevant controller method
        try {
            $controllerObj = new $controllerClass();
            $controllerObj->$methodName();
        } catch (Exception $e) {
            echo $this->display404View();
            die();
        }
    }
}
