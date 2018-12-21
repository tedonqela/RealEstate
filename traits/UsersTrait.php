<?php
namespace realestate\traits;

trait UsersTrait{


    public function ByEmail($email ) {
        $this->query("SELECT * FROM users WHERE Usr_Email = '$email' AND Usr_Active = 1 LIMIT 1" );
        $row = $this->single();
        if ( $row) {
            return $row;
        } else {
            return null;
        }
    }

    public function UserByID($id ) {
        $this->query("SELECT * FROM users WHERE Usr_ID = '$id' AND Usr_Active = 1 LIMIT 1" );
        $row = $this->single();
        if ( $row) {
            return $row;
        } else {
            return null;
        }
    }
}