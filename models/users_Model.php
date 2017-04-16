<?php

/**
 * Created by PhpStorm.
 * User: Kebab
 * Date: 2017.04.14.
 * Time: 13:39
 */
class Users_Model extends Model
{
    /**
     * Users_Model constructor.
     */
    public function __construct()
    {
        parent::__construct();

    }

    public function addNewUser($username, $fullname, $email, $pass, $prim)
    {
        return $this->db->SQLInsertOneRow("users",array(
            "user_name"=>"'".$username."'",
            "full_name"=>"'".$fullname."'",
            "email"=>"'".$email."'",
            "pass"=>"'".Hash::createMD5($pass)."'",
            "prim" => "'".$prim."'"
        ));
    }

    public function ajaxDeleteUser($id)
    {
        $this->db->SQLUpdate("users",array(
                "active" => "false",
                "last_update" => "NOW()"
        ),"id=".$id);
    }

    /**
     * Load with ajax new user model on th User page
     */
    public function ajaxLoadUserModel()
    {
        $primArray = array();
        if (Auth::userIsAdmin()){
            $primArray["moderator"] = "Moderator";
        }
        $primArray["default"] = "Default";
        ?>
        <form action="<?php echo URL?>users/addNewUser/" id="newUserForm" method="post" style="display: none">
            <div class="row form-group">
                <div class="col-md-6 text-right"><strong><label>Felhasználó név:</label></strong></div>
                <div class="col-md-6">
                    <input type="text" required class="form-control" name="user_name">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 text-right"><strong><label>Teljes név:</label></strong></div>
                <div class="col-md-6">
                    <input type="text" required class="form-control" name="full_name">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 text-right"><strong><label>Email cím:</label></strong></div>
                <div class="col-md-6">
                    <input type="email" required class="form-control" name="email">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 text-right"><strong><label>Jelszó:</label></strong></div>
                <div class="col-md-6">
                    <input type="password" required class="form-control" name="password">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 text-right"><strong><label>Jogosultság:</label></strong></div>
                <div class="col-md-6">
                    <select class="form-control" required name="prim">
                        <?php
                            foreach ($primArray as $key =>$value){
                                echo "<option value='".$key."'>".$value."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 "><input type="submit" class="btn btn-success btn-block" value="Hozzáadás"></div>
                <div class="col-md-6"><button type="button" class="btn btn-danger btn-block" id="newUserModelClose" >Bezárás</button> </div>
            </div>
        </form>
        <?php
    }

    /**
     * Load with ajax table body on de Users page
     */
    public function ajaxLoadTableBody()
    {
        $result = $this->db->SQLSelect("users",array("*"),"active=true");
        foreach ($result as $value) {
            echo  "<tr>";
                echo "<td>".$value["user_name"]."</td>";
                echo "<td>".$value["full_name"]."</td>";
                echo "<td>".$value["email"]."</td>";
                echo "<td>".$value["prim"]."</td>";
                echo "<td><button class='btn btn-default btn-block' id='editUser'>Szerkeztés</button>  </td>";
                echo "<td><button class='btn btn-danger btn-block' id='deleteUser' rel='".$value["id"]."'>Törlés</button></td>";
            echo  "</tr>";
        }
    }
}