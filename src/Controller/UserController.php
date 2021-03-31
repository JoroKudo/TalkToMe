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
        $username =  $_POST['username'];
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

    public function logout()
    {
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
        $username = $_POST['fname'];
        $hashedPassword = hash('sha256', $_POST["password"]);
        $userRepository = new UserRepository();
        if ($userRepository->existsUser($username,$hashedPassword)) {
            /// yes
            header('Location: /user/create?invalid=userAlreadyExits');
            exit();
        }
        $username = $_POST['fname'];
        $email = $_POST['email'];
        $hashedPassword = hash('sha256', $_POST["password"]);
        $userRepository = new UserRepository();
        $userRepository->create($username, $email, $hashedPassword);
        $_SESSION["IsLoggedIn"] = true;
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        $user = $userRepository->readByUserName($username);
        $_SESSION["userId"] = $user->id;
        header('Location: /user?valid=userCreated');
    }

    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_SESSION['userId']);
        header('Location: /');
        $this->logout();
    }
}
