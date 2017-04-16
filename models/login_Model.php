<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.13.
 * Time: 18:50
 */
class Login_Model extends Model
{
    static $UserID = "UserID";
    static $UserPrim = "UserPrim";
    /**
     * Login_Model constructor.
     */
    public function __construct()
    {

        parent::__construct();

    }

    /**
     * @param string $loginName
     * @param string $password
     * @return bool
     */
    public function loggingIn($loginName, $password)
    {
        $pass = Hash::createMD5($password);
        $result =$this->db->SQLSelect(
            "users",
                array("id","prim"),
            "user_name='".$loginName."' AND 
            pass='".$pass."' AND
            active = true"
        );
        if ($result!=null && count($result) ==1){
            Session::set(Auth::$UserLogged,true);
            Session::set(self::$UserID,$result[0]["id"]);
            Session::set(self::$UserPrim,$result[0]["prim"]);
            return true;
        }
        else {
            return false;
        }
    }


    public function logout()
    {
        Session::set(Auth::$UserLogged,false);
        Session::unsetVal(self::$UserID);
        Session::unsetVal(self::$UserPrim);
    }
}