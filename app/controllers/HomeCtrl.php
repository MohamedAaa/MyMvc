<?php

/**
 * Description of HomeCtrl
 *
 * @author Mario
 */
class HomeCtrl extends Controller {

    public function index($params = '') {

        $user = $this->model('user');
        $data = $user->all();
        $this->view('home/index', ['users' => $data]);
    }

    public function add() {

        $this->view('home/add');
    }

    public function store() {
        if (!empty($_POST)) {
            $user = $this->model('user');
            $add = $user->add($_POST);
            
            if($add == TRUE){
                header('Location: /public/home');
                exit;
            }  else {
                $this->view('error',['error'=>'not add please check your data']);
                die();
            }
        } else {
            header('Location: /public/home');
            exit;
        }
    }
    
    public function edit($id) {
        
        $user  = $this->model('user');
        $fetch = $user->getById($id);
        $this->view('home/edit',[$fetch]);
    }
    
    public function update($id) {
        $user   = $this->model('user');
        $update = $user->update($id);
        
        if($update == TRUE){
            header('Location: /public/home');
            exit;
        }else{
            $this->view('erorr',['error'=>'not Update please check your data']);
        }
    }
    
    
    public function delete($id) {
        
        $user   = $this->model('user');
        $delete = $user->delete($id);
        
        if($delete == TRUE){
            header('Location: /public/home');
            exit;
        }else{
            $this->view('erorr',['error'=>'not Deleted check your data']);
        }
    }

}
