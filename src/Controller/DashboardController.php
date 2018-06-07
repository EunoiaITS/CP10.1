<?php
namespace App\Controller;

use App\Controller\AppController;


class DashboardController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->viewBuilder()->layout('frontend');
    }

    public function index()
    {
        $this->set('pic', $this->Auth->user('username'));
    }

    public function isAuthorized($user){
        if(in_array($this->request->action, ['index'])){
            return true;
        }

        return parent::isAuthorized($user);

    }

}
