<?php
class Messages{
	public static function setMsg($text, $type){
		if($type == 'error'){
			$_SESSION['errorMsg'] = $text;
		}else {
			$_SESSION['successMsg'] = $text;
		}
	}

	public static function display(){
		if(isset($_SESSION['errorMsg'])){
			echo '<div style="position: absolute; width: 50%; margin-left: 25%; text-align: center;" class="alert alert-danger">'.$_SESSION['errorMsg'].'</div>';
			unset($_SESSION['errorMsg']);
		}

		if(isset($_SESSION['successMsg'])){
			echo '<div style="position: absolute; width: 50%; margin-left: 25%; text-align: center;" class="alert alert-success">'.$_SESSION['successMsg'].'</div>';
			unset($_SESSION['successMsg']);
		}
	}
}