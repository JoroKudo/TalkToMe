<?php

namespace App\View;


   use App\Repository\UserRepository;

class View

{
    private $viewfile;

    private $properties = array();

    public function __construct($viewfile)
    {
        $this->viewfile = "./../templates/$viewfile.php";
    }

    public function __set($key, $value)
    {
        if (!isset($this->$key)) {
            $this->properties[$key] = $value;
        }
    }

    public function __get($key)
    {
        if (isset($this->properties[$key])) {
            return $this->properties[$key];
        }
    }

    public function display()
    {
        extract($this->properties);

        require './../templates/header.php';
        require $this->viewfile;
        require './../templates/footer.php';
    }


}
    $wantedId = $_GET['id'];

   $model = new UserRepository();
   $user = $model->readById($wantedId);
