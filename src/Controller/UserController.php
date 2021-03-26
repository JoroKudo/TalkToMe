<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\View\View;



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
        $username = htmlspecialchars( $_POST['username'],ENT_QUOTES ,'UTF-8');

        $hashedPassword = hash('sha256', $_POST["password"]);



        $userRepository = new UserRepository();
        if ($userRepository->existsUser($username, $hashedPassword)) {

            $user = $userRepository->readByUserName($username);


            header('Location: /');
            $_SESSION["IsLoggedIn"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $user->email;
            $_SESSION["userId"] = $user->id;
            echo "password";

            exit();


        }

        header('Location: /user/login?login=false');
        exit();
    }



    public function logout(){
        $_SESSION['IsLoggedIn'] = false;
        session_destroy();
        $_SESSION['IsLoggedIn'] = false;
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
            $_SESSION["email"] = $email;

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
