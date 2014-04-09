<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->headLink()->appendStylesheet($this->view->baseUrl($this->view->publicUrl . 'public/bootstrap/3.1/css/bootstrap.css'));
        $this->view->headScript()->appendFile($this->view->baseUrl($this->view->publicUrl . 'public/bootstrap/3.1/js/bootstrap.js'));
    }


}

