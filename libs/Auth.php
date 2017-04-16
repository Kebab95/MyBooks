<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.12.
 * Time: 18:58
 */
class Auth
{
    private static $UserPrim ="UserPrim";
    static $UserLogged = "UserLogged";

    /**
     * @return bool
     */
    public static function checkedLogged()
    {
        if (Session::issetVal(self::$UserLogged) && Session::get(self::$UserLogged) == true) {
            return true;
        } else {
            return false;
        }
    }

    public static function userIsAdmin()
    {
        return Session::issetVal(self::$UserPrim) && Session::get(self::$UserPrim) == "admin";
    }

    public static function userIsModerator()
    {
        return Session::issetVal(self::$UserPrim) && Session::get(self::$UserPrim) == "moderator";
    }
}