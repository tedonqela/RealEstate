<?php

use realestate\traits\DergoEmail;
use realestate\traits\UsersTrait;

class UsersModel extends Model{
    use DergoEmail;
    use UsersTrait;



	public function register($username = "",$email = "", $password = ""){
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $randomSalt = Users::randomSalt();

            if($post['submit']) {
                // Insert into MySQL
                $this->query('INSERT INTO users (Usr_Name, Usr_Email, Usr_Password, Usr_Salt) VALUES (:username, :email, :password, :salt)');
                $this->bind(':username', $username);
                $this->bind(':email', $email);
                $this->bind(':password', $password);
                $this->bind(':salt', $randomSalt);
                $this->execute();

                if ($this->lastInsertId() > 0) {
                    $user_insert_id = $this->lastInsertId();

                    $activation_link1 = "<a href='" . ROOT_URL . "users/activate/"
                        . sha1($randomSalt . $user_insert_id) . "'>Kliko ketu</a>";

                    $activation_link2 = ROOT_URL . "users/activate/"
                        . sha1($randomSalt . $user_insert_id);

                    $msg = $username . ", ju jeni regjistruar ne faqen www.realestate.test. Duhet ta aktivizoni llogarine tuaj, duke klikuar ne: ";
                    $msg .= $activation_link1 . ". Nese nuk klikohet, provoni me kete link: " . $activation_link2;
                    $msg .= ". Nese ky link nuk eshte i klikueshem, beni copy/paste ne browser dhe shtypni Enter";


                    if ($this->dergo($email, $username, $msg,'Real Estate KS',"Aktivizimi i llogarise suaj")) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    Messages::setMsg('Email egziston!', 'error');
                }
            }
	}
	public function login($email = "", $password = ""){

			$this->query('SELECT * FROM users WHERE Usr_Email = :email AND Usr_Active = 1 LIMIT 1');
			$this->bind(':email', $email);

			$row = $this->single();

			if($row['Usr_Email'] != "" && $password != ""){
			    return $row;
			}else{
                return NULL;
            }
    }

    public function activate($hash = "") {

        $this->query( "SELECT * FROM users WHERE 	SHA1(CONCAT(Usr_Salt,Usr_ID)) = :hash LIMIT 1" );
        $this->bind(':hash', $hash);
        $row = $this->single();

        if ($row) {
            $id      = $row['Usr_ID'];
            if ( $row['Usr_Active'] == 0 ) {

                $this->query("UPDATE users SET Usr_Active = 1 WHERE Usr_ID = :id LIMIT 1");
                $this->bind(':id', $id);


                if ( $this->execute()) {
                    header('Location: ' . ROOT_URL . 'users/register');
                    Messages::setMsg('Aktivizim deshtoi!', 'error');
                } else {
                    header('Location: ' . ROOT_URL . 'users/login');
                    Messages::setMsg('Aktivizim i suksesshem!', 'successMsg');
                }
            } else {
                header('Location: ' . ROOT_URL . 'users/login');
                Messages::setMsg('Llogaria juaj eshte e aktivizuar!', 'successMsg');
            }
        } else {
            echo "nuk e gjeta";
        }
    }

    public function forgot($email = ""){

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $user = $this->byEmail($email);
                if ($user == null) {
                    Messages::setMsg('Nuk ekziston kjo llogari!', 'error');
                } else {
                    $activation_link = ROOT_URL . "users/forgotpass/" . sha1($user['Usr_Salt'] . $user['Usr_Email']);
                    $mesazhi = " Ju keni kerkuar ndryshimin e passwordit tuaj. ";
                    $mesazhi .= " Ju lutem konfirmoni duke klikuar ne kete link ";
                    $mesazhi .= $activation_link;

                    if ($this->dergo($user['Usr_Email'], $user['Usr_Name'], $mesazhi, "Real Estate KS", "Rikthimi i passwordit")) {

//                        header('Location: ' . ROOT_URL . 'users/login');
                        Messages::setMsg('Linku për rikthim të passwordit u dergua!', 'successMsg');
                    } else {
//                        header('Location: ' . ROOT_URL . 'users/forgot');
                        Messages::setMsg('Linku për rikthim të passwordit nuk u dergua!', 'error');
                    }
                }
            } else {
                Messages::setMsg('Nuk ekziston kjo llogari!', 'error');
//                header('Location: ' . ROOT_URL . 'users/forgot');

            }
        }
    }

    public function forgotconfirm($hash = ""){
	    $this->query("SELECT * FROM users WHERE SHA1(CONCAT(Usr_Salt, Usr_Email)) = '$hash' LIMIT 1");
	    $row = $this->single();
	    if($row){
            $newpass = Users::randomSalt();
            $passhash = password_hash($newpass, PASSWORD_DEFAULT);

            $this->query("UPDATE users SET Usr_Password = '$passhash' WHERE Usr_ID = '".$row['Usr_ID']."' LIMIT 1");

            if($this->execute()){
                echo "Done!";
            }else{
                $mesazhi = "Passwordi juaj i ri eshte: ".$newpass;

                if ($this->dergo($row['Usr_Email'], $row['Usr_Name'], $mesazhi,"Real Estate KS","Passwordi")) {
                    Messages::setMsg('Passwordi u dergua!', 'successMsg');
                    header('Location: ' . ROOT_URL . 'users/forgot');
                } else {
                    Messages::setMsg('Passwordi nuk dergua!', 'error');
                    header('Location: ' . ROOT_URL . 'users/forgot');
                }
            }
        }else{
	        echo "Nuk u gjete perdoruesi";
        }
    }

}