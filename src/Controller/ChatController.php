<?php

namespace App\Controller;

use App\Repository\ChatRepository;
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








    public function doCreate()
    {
        if (isset($_POST['sennd'])) {
            $message = $_POST['msg'];


            $chatRepository = new ChatRepository();
            $chatRepository->create($message);

        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /chat');
    }

    public function delete()
    {
        $chatRepository = new ChatRepository();
        $chatRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}
