<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.16.
 * Time: 21:02
 */
class GroupView_Model extends Model
{

    /**
     * GroupView_Model constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function ajaxLoadTableData($user_id,$group_id)
    {
        $result = $this->db->SQLSelect("user_catalogs",
            array("*"),
            "user_id = ".$user_id." AND 
            group_id=".$group_id." AND 
            active=true",
            "JOIN authors ON 
            user_catalogs.author_id = authors.id 
            JOIN publisher ON 
            user_catalogs.publisher_id = publishers.id");
        return $result;
    }

    /**
     * @param $userID
     * @return array
     */
    public function loadSelectData($userID)
    {
        $result = $this->db->SQLSelect("groups",array("id","name"),"user_id=".$userID." AND active=true 
        ORDER BY last_update");
        if (is_array($result)){
            return $result;
        }
        else {
            return array(0=>array("id"=>"","name"=>"Nincsenek még csoportok"));
        }
    }
}