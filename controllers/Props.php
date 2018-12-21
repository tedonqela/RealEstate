<?php

class Props extends Controller{

    protected function Index(){
        $viewmodel = new PropModel();

//        $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

        $url = explode( "/", $_SERVER['REQUEST_URI'] );

        $date['total_lajme'] = $viewmodel->total_lajme(LIMIT);
        $totali = $date['total_lajme']['sa_faqe'];

        if($url[2] > $totali || $url[2] == 0){
            header('Location: '.ROOT_URL. 'props/1');
            Messages::setMsg("Nuk ekziton kjo faqe!", "error");
        }else{
            $result = $viewmodel->Index($url[2], LIMIT);
        }


        $this->returnView($result, true);

    }
}