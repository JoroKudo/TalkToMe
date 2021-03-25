<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\View\View;


/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController

{

    public function index()
    {
        $userRepository = new UserRepository();

        $view = new View('user/index');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->users = $userRepository->readAll();
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
        $username = $_POST["username"];

        $hashedPassword = hash('sha256', $_POST["password"]);



        $userRepository = new UserRepository();
        if ($userRepository->existsUser(htmlspecialchars($username,ENT_QUOTES ,'UTF-8'), $hashedPassword)) {



            header('Location: /');
            $_SESSION["IsLoggedIn"] = true;
            $_SESSION["username"] = $username;
            echo "password";

            exit();

        }

        header('Location: /user/login?login=false');
        exit();
    }



    public function logout(){
        $_SESSION['IsLoggedIn'] = false;
        session_destroy();
        header('Location: /');
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
            $username = htmlspecialchars($_POST['fname'],ENT_QUOTES ,'UTF-8');
            $email = htmlspecialchars($_POST['email'],ENT_QUOTES, 'UTF-8');
            $hashedPassword = hash('sha256', $_POST["password"]);


            $userRepository = new UserRepository();
            $userRepository->create($username, $email, $hashedPassword);
            $_SESSION["IsLoggedIn"] = true;
            $_SESSION["username"] = $username;
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
