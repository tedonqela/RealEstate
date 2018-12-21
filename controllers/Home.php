<?php


class Home extends Controller
{

	protected function Index(){
		$viewmodel = new HomeModel();
		$this->returnView($viewmodel->Index(), true);

	}

//	protected function result(){
//	    $viewmodel = new HomeModel();
//
//	    $search = $viewmodel->result();
//
//
//        var_dump($_GET);
//
//
//	    $this->returnView($search, true);
//    }

	protected function sales(){
		$viewmodel = new HomeModel();
		$this->returnView($viewmodel->sales(), true);
	}

	protected function rents(){
		$viewmodel = new HomeModel();
		$this->returnView($viewmodel->rents(), true);
	}

	protected function sentMail(){

        $viewmodel = new HomeModel();
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $name = trim($name);

            $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
            $subject = trim($subject);

            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $email = trim($email);

            $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);

            $result = $viewmodel->sentMail($name,$comment,$email,$subject);
			//Egzekuto

			if($result){
				header('Location: '.ROOT_URL.'home/index');
				Messages::setMsg('Email është dërguar suskes!', 'successMsg');
			}else{
				header('Location: '.ROOT_URL.'home/index');
				Messages::setMsg('Email nuk është dërguar !', 'error');
			}
		}else{
			Messages::setMsg('ERROR !', 'error');
			header('Location: '.ROOT_URL.'home/index');
		}
	}

}