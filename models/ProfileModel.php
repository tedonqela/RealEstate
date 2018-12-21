<?php

use realestate\traits\UsersTrait;

class ProfileModel extends Model {

    use UsersTrait;

    public function __construct() {
        parent::__construct();

        if (!( isset( $_SESSION['is_logged_in'] ) && $_SESSION['is_logged_in'] && $_SESSION['user_data']['level'] == 1 ) ){
            die('Nuk lejohet');
        }


    }

    public function profileInfo($old_password = "",$new_password1 = "",$new_password2 = ""){

        $user = $this->UserByID($_SESSION['user_data']['id']);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($user !== NULL){
                if(password_verify($old_password, $user['Usr_Password'])){
                    if(strlen($new_password1) >= 8 && $new_password1 == $new_password2){
                        $new_hash = password_hash($new_password1, PASSWORD_DEFAULT);
                        $sql = "UPDATE users SET Usr_Password = '$new_hash' WHERE Usr_ID = '".$_SESSION['user_data']['id']."' LIMIT 1";
                        $this->query($sql);

                        if($this->execute()){
                            Messages::setMsg("Passwordi nuk u ndryshua !","error");
                        }else{
                            Messages::setMsg("Passwordi u ndryshua me sukses !","successMsg");
                        }
                    }else{
                        Messages::setMsg("Passwordi nuk perputhet !","error");
                    }
                }else{
                    Messages::setMsg("Passwordi gabim !","error");
                }
            }else{
                Messages::setMsg("Nuk ekziston ky User !","error");
            }
        }
    }

    public function post(){

        $id =  $_SESSION['user_data']['id'];

        $this->query("SELECT im.Img_ID,im.Img_Path,p.Pro_ID,p.Pro_Active,p.Pro_Title,p.Pro_Surface, p.Pro_Price, p.Pro_Description,t.Type_Name, s.Sts_Name,ci.City_Name,sa.Sta_Name
                            FROM images im
                            INNER JOIN properties p ON im.Img_Property_ID = p.Pro_ID
                            INNER JOIN statuses s ON p.Pro_Status_ID = s.Sts_ID
                            INNER JOIN types t ON p.Pro_Type_ID = t.Type_ID
                            INNER JOIN cities ci ON p.Pro_City_ID = ci.City_ID
                            INNER JOIN states sa ON ci.City_State_ID = sa.Sta_ID
				WHERE p.Pro_User_ID = '$id' AND p.Pro_Active = 1
				GROUP BY p.Pro_ID
				ORDER BY p.Pro_ID ASC");

        $rows = $this->resultSet();

        if($rows){
            $_SESSION['has_post'] = true;
        }
        return $rows;
    }
}