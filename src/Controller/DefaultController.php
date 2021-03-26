<?php
namespace App\Controller;
use App\View\View;
class DefaultController
{
    public function index()
    {
        $view = new View('default/index');
        $view->title = 'Startseite';
        $view->heading = 'Startseite';
        $view->display();
    }
}
