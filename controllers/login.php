<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.13.
 * Time: 17:33
 */
class Login extends Controller
{

    /**
     * Login constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->view->loginTitle ="Bejelentkezés";
    }


    /**
     * Required function
     * The Bootstrap call this when render View page
     * @return mixed
     */
    public function index()
    {
        $this->view->render("login/index");
    }

    public function logout()
    {
        $this->model->logout();
        header("Location: ".URL."index/");
    }
    public function loggingIn()
    {
        $loginName = $_POST["loginName"];
        $password = $_POST["password"];
        if (strlen($loginName)>0 && strlen($password)>0){
            if ($this->model->loggingIn($loginName,$password)){
                header("Location: ".URL."index/");
            }
            else {
                $this->view->error = "Nem megfelelő felhasználónév és jelszó páros!";
                $this->index();
            }
        }
        else {
            $this->view->error = "Nem töltött ki minden mezőt!";
            $this->index();
        }


    }
}