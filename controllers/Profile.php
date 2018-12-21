<?php

class Profile extends Controller{

    protected function profileInfo(){
        $viewmodel = new ProfileModel();

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $old_password  = filter_var( $post['old_password'], FILTER_SANITIZE_STRING );
        $old_password = trim($old_password);

        $new_password1 = filter_var( $post['new_password1'], FILTER_SANITIZE_STRING );
        $new_password1 = trim($new_password1);

        $new_password2 = filter_var( $post['new_password2'], FILTER_SANITIZE_STRING );
        $new_password2 = trim($new_password2);


        $result = $viewmodel->profileInfo($old_password,$new_password1,$new_password2);
        $this->returnView($result, true);

    }

    protected function post(){
        $viewmodel = new ProfileModel();


        $result = $viewmodel->post();

        if($result){
            $this->returnView($result, true);
        }else{
            unset($_SESSION['has_post']);
            $this->returnView($result, true);
        }
    }
}