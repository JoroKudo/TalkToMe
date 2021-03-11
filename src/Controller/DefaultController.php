<?php

namespace App\Controller;

use App\View\View;


class DefaultController
{

    public function index()
    {
        // In diesem Fall möchten wir dem Benutzer die View mit dem Namen
        //   "default_index" rendern. Wie das genau funktioniert, ist in der
        //   View Klasse beschrieben.
        $view = new View('default/index');
        $view->title = 'Startseite';
        $view->heading = 'Startseite';
        $view->display();
    }
}
