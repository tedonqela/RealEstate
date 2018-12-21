<?php


class Users extends Controller
{

	protected function register(){
        $viewmodel = new UsersModel();

        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $username = filter_var($post['username'], FILTER_SANITIZE_STRING);
        $email = filter_var($post['email'], FILTER_SANITIZE_EMAIL);
        $password = password_hash($post['password'], PASSWORD_DEFAULT);

        $result = $viewmodel->register($username, $email, $password);

        if($result){
            Messages::setMsg('Email u dergua me sukses !', 'successMsg');
            header('Location: ' . ROOT_URL . 'users/login');
        }

        if(isset($_SESSION['is_logged_in'])){
            header('Location: '.ROOT_URL.'home/index');
        }else{
            $this->returnView($result, true);
        }

    }

	protected function login(){


        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $email = filter_var($post['username'], FILTER_SANITIZE_STRING);
        $email = trim($email);
        $password = filter_var($post['password'], FILTER_SANITIZE_STRING);
        $password = trim($password);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($email == '' || $password == ''){
                Messages::setMsg('Mbush fushat e nevojshme', 'error');
            }
        }
        $viewmodel = new UsersModel();

        $result = $viewmodel->login($email,$password);

        if($result !== NULL){
            if(password_verify($password, $result['Usr_Password'])){
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "id"	=> $result['Usr_ID'],
                    "username"	=> $result['Usr_Name'],
                    "email"	=> $result['Usr_Email'],
                    "level" => $result['Usr_Level']
                );
                header('Location: '.ROOT_URL.'home/index');
            }else{
                Messages::setMsg('Incorrect Email or Password', 'error');
            }
        }

        if(isset($_SESSION['is_logged_in'])){
            header('Location: '.ROOT_URL.'home/index');
        }else{
            $this->returnView($result, true);
        }
	}

	protected function logout(){
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_data']);
		session_destroy();
		// Redirect
		header('Location: '.ROOT_URL);
	}

    protected function activate(){
        $viewmodel = new UsersModel();

        $url = explode( "/", $_SERVER['REQUEST_URI'] );
        if($url[3] == true){
            $viewmodel->activate($url[3]);
        }else{
            header('Location: '.ROOT_URL.'home/index');
        }

    }

    protected function forgot(){
        $viewmodel = new UsersModel();

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $email = filter_var($post['email'], FILTER_VALIDATE_EMAIL);

        $result = $viewmodel->forgot($email);

        if(isset($_SESSION['is_logged_in'])){
            header('Location: '.ROOT_URL.'home/index');
        }else{
            $this->returnView($result, true);
        }
    }

    protected function forgotpass(){
	    $viewmodel = new UsersModel();


        $url = explode( "/", $_SERVER['REQUEST_URI'] );
        if($url[3] == true){
            $viewmodel->forgotconfirm($url[3]);
        }else{
            header('Location: '.ROOT_URL.'home/index');
        }

    }

    public static function randomSalt() {
        $string = "QAZWSXEDCRFVTGBYHNUJMIKOLPplmkoijnbhuzgvcftrdxysewaq0192837456!#$%^&*()_+";
        $length = rand( 5, 10 );
        $ss     = "";
        for ( $i = 1; $i <= $length; $i ++ ) {
            $position = rand( 0, strlen( $string ) - 1 );
            $ss       .= substr( $string, $position, 1 );
        }

        return $ss;
    }

}
