<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.16.
 * Time: 19:09
 */
class GroupView extends Controller
{
    /**
     * GroupView constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Required function
     * The Bootstrap call this when render View page
     * @return mixed
     */
    public function index()
    {
        if (Auth::checkedLogged()){
            $this->view->addCSSFile("groupview/css/tableScroll.css");
            $this->view->addJSFile("groupview/js/bodyHeight.js");
            $this->view->addJSFile("groupview/js/tableLoad.js");

            $this->view->selectArray = $this->loadSelectData();
            $this->view->render("groupview/index");
        }
        else {
            header("Location:  ".URL."login");
        }

    }

    public function ajaxLoadTableData()
    {
        echo $this->model->ajaxLoadTableData(Session::get("UserID"),($_GET["grpid"]==null?0:$_GET["grpid"]));
    }

    public function loadSelectData()
    {
        return $this->model->loadSelectData(Session::get("UserID"));
    }
}