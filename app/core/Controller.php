<?php

/**
 * Description of Controller
 *
 * @author Mario
 */
class Controller {

    //put your code here

    protected function model($model) {

        $fileModel = MODEL . $model . '.php';
        if (file_exists($fileModel)) {
            require_once $fileModel;
        }

        return new $model();
    }

    public function view($view, $param = []) {
        extract($param);
        $fileView = VIEW . $view . '.php';
        if (file_exists($fileView)) {
            require_once $fileView;
        } else {
            $param['error'] = 'View not found';
            require_once VIEW . 'erorr.php';
        }
    }

}
