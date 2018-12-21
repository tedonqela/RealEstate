<?php

class Admin extends Controller{

    protected function panel(){
        $viewmodel = new AdminModel();


        $url = explode( "/", $_SERVER['REQUEST_URI'] );

        $date['total_lajme'] = $viewmodel->total_lajme(LIMIT);
        $totali = $date['total_lajme']['sa_faqe'];

        if($url[3] > $totali || $url[3] == 0){
            header('Location: '.ROOT_URL. 'admin/panel/1');
            Messages::setMsg("Nuk ekziton kjo faqe!", "error");
        }else{
            $result = $viewmodel->panel($url[3], LIMIT);
        }

        $this->returnView($result,true);

    }

    // Show Single Post
    protected function show(){
        $viewmodel = new AdminModel();

        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT );

        $result = $viewmodel->show($id);

        if($result){
            $this->returnView($result, true);
        }else{
            Messages::setMsg("Prona nuk ekziston", "error");
            header('Location: '.ROOT_URL);
        }
    }

    protected function active(){
        $viewmodel = new AdminModel();

        $active = filter_var($_POST['active'], FILTER_SANITIZE_NUMBER_INT);
        $pro_id = filter_var($_POST['pro_id'], FILTER_SANITIZE_NUMBER_INT);

        $url = explode( "/", $_SERVER['REQUEST_URI'] );

        $res = $viewmodel->active($active, $pro_id);

        if($res){
            header('Location: panel/'.$url[3]);
            Messages::setMsg("U kry", "successMsg");
        }else{
            header('Location: panel/'.$url[3]);
            Messages::setMsg("Prona nuk ekziston", "error");
        }
    }
}