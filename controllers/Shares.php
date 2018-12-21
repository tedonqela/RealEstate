<?php
class Shares extends Controller{



	protected function add(){
		//Can share only if it's logged in
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: '.ROOT_URL. 'pages/1');
		}
		$viewmodel = new ShareModel();

		$this->returnView($viewmodel->add(), true);
	}



	// Show Single Post
	protected function show(){
		$viewmodel = new ShareModel();



		$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT );

		$result = $viewmodel->show($id);
        if($result){
            $this->returnView($result, true);
        }else{
            Messages::setMsg("Prona nuk ekziston", "error");
            header('Location: '.ROOT_URL);
        }


	}

	protected function edit(){

	}
	
	protected function delete(){
        $viewmodel = new ShareModel();

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			//Egzekuto
            $delete_id = filter_var($_POST['delete_id'], FILTER_SANITIZE_NUMBER_INT );
            $delete_id = trim($delete_id);

            $result = $viewmodel->delete($delete_id);

			if($result === false){
				header('Location: '.ROOT_URL.'profile/post');
                Messages::setMsg('Prona eshte fshire me Sukses !', 'successMsg');

			}else{
				header('Location: '.ROOT_URL.'profile/post');
                Messages::setMsg('Prona nuk eshte fshire !', 'error');
			}
		}else{
			Messages::setMsg('Fatal error !', 'error');
			header('Location: '.ROOT_URL.'shares/post');
		}
	}



}