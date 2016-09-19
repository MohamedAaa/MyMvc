<?php

/**
 * @author Mario
 */
class App {
    //put your code here
    
    protected $controller = 'HomeCtrl';
    protected $method = 'index';
    protected $params = [];
    

    public function __construct() {
        
        $url = $this->parseUrl();
        $ctrl = CTRL.ucfirst($url[0]).'Ctrl.php';
        
        if(file_exists($ctrl)){
            $this->controller = ucfirst($url[0]).'Ctrl';
            unset($url[0]);
            require_once $ctrl;
        }else{
            $param['error'] = 'Controller not found';
            require_once VIEW.'erorr.php';
            die();
        }
        $this->controller = new $this->controller();
        
        if (isset($url[1])){
            
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }else{
                $param['error'] = 'Method not found';
                require_once VIEW.'erorr.php';
                die();
            }
        }
        
        $this->params = $url ? array_values($url) : [];
        
        call_user_func_array([$this->controller, $this->method],  $this->params);
    }
    
    
    function parseUrl() {
        
        if(!empty($_GET['url'])){
            return explode('/', filter_var(rtrim($_GET['url'], '/'),FILTER_SANITIZE_URL));
        }
        
        return ['home','index'];
    }
    
}


