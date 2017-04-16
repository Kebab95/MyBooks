<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.14.
 * Time: 13:04
 */
class Users extends Controller
{
    private $pageName = "Felhasználók";
    /**
     * Users constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->view->setPageTitle(PAGE_TITLE." - ".$this->pageName);
    }


    /**
     * Required function
     * The Bootstrap call this when render View page
     * @return mixed
     */
    public function index()
    {
        if ($this->checkUserAuth()){
            $this->view->addJSFile("users/js/tableAjax.js");
            $this->view->pageName = $this->pageName;
            $this->view->tableHead = array("Login név","Teljes név","Email","Jogosultság","Szerkesztés");
            if (Auth::userIsAdmin()){
                array_push($this->view->tableHead,"Törlés");
            }

            $this->view->render("users/index");
        }
        else {
            if (Auth::checkedLogged()){
                header("Location: ".URL);
            }
            else {
                header("Location: login/");
            }
        }

    }

    public function addNewUser()
    {
        $result = $this->model->addNewUser(
            $_POST["user_name"],
            $_POST["full_name"],
            $_POST["email"],
            $_POST["password"],
            $_POST["prim"]
        );
        if ($result){
            $this->ajaxLoadTableBody();
        }
        else {
            echo 'asd';
        }

    }

    public function ajaxDeleteUser()
    {
        $this->model->ajaxDeleteUser($_POST["id"]);
        $this->ajaxLoadTableBody();
    }
    public function ajaxLoadUserModel()
    {
        $this->model->ajaxLoadUserModel();
    }
    public function ajaxLoadTableBody()
    {
        $this->model->ajaxLoadTableBody();
    }
    private function checkUserAuth()
    {
        return  (Auth::userIsAdmin() || Auth::userIsModerator()) && Auth::checkedLogged();
    }

}