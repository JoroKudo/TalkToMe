<?php

namespace App\Controller;

use App\Repository\ChatRepository;
use App\Repository\UserRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class ChatController
{
    public function index()
    {
        $chatRepository = new ChatRepository();

        $view = new View('chat/index');
        $view->title = 'Benutzer';
        $view->heading = 'Chat';
        $view->mgss = $chatRepository->readAll();
        $view->display();
    }

    public function load(){

        $chatRepository = new ChatRepository();
        $view = new View('chat/load');

        $view->mgss = $chatRepository->readAll();
        $view->displayWithoutHeader();
    }

    public function doCreate()
    {
        $message = $_POST['message'];
        $chatRepository = new ChatRepository();
        $chatRepository->create($message);
    }

    public function delete()
    {
        $chatRepository = new ChatRepository();
        $chatRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }

}
