<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class ChatController
{
    public function index()
    {
        $userRepository = new UserRepository();

        $view = new View('chat/index');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->otherUser = $userRepository->readAll();
        $view->display();
    }

    public function login()
    {
        $view = new View('user/login');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Log dich ein';
        $view->display();
    }

    public function doLogin(){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $userRepository = new UserRepository();
        if ($userRepository->existsUser($email, $password)) {
            header('Location: /');
            $_SESSION["IsLoggedIn"] = true;
            echo "password";
            exit();
        }

        header('Location: /user/login?login=false');
        exit();
    }

    public function logout()
    {
        header('Location: /');
        session_destroy();
    }



    public function create()
    {
        $view = new View('user/create');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Benutzer erstellen';
        $view->display();
    }

    public function doCreate()
    {
        if (isset($_POST['send'])) {
            $firstName = $_POST['fname'];
            $lastName = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userRepository = new UserRepository();
            $userRepository->create($firstName, $lastName, $email, $password);
            $_SESSION["IsLoggedIn"] = true;
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }

    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}
