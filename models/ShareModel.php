<?php
class ShareModel extends Model
{


	  	    // Get Post By ID
	public function show($id = 0){

		$this->query("SELECT im.Img_ID,im.Img_Path,p.Pro_ID,p.Pro_Title,p.Pro_Surface, p.Pro_Price, p.Pro_Description,p.Pro_Post_Date,c.Con_Email,c.Con_Phone,t.Type_Name, s.Sts_Name,ci.City_Name,sa.Sta_Name
                            FROM images im
                            INNER JOIN properties p ON im.Img_Property_ID = p.Pro_ID
                            INNER JOIN statuses s ON p.Pro_Status_ID = s.Sts_ID
                            INNER JOIN types t ON p.Pro_Type_ID = t.Type_ID
                            INNER JOIN contacts c ON p.Pro_Contact_ID = c.Con_ID
                            INNER JOIN cities ci ON p.Pro_City_ID = ci.City_ID
                            INNER JOIN states sa ON ci.City_State_ID = sa.Sta_ID
					WHERE p.Pro_ID= '$id' AND p.Pro_Active = 1");
		return $this->single();

	}

	public function showImg(){
		$id = $_GET['id'];
		
		$this->query("SELECT im.Img_ID,im.Img_Property_ID,im.Img_Path
					FROM images im
					INNER JOIN properties p ON im.Img_Property_ID = p.Pro_ID
					WHERE p.Pro_ID= '$id'  AND p.Pro_Active = 1");


		return $this->resultSet();
	}
					

	public function add(){
		//Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
 
		if(isset($post['submit'])){

             $title = filter_var($post['title'], FILTER_SANITIZE_STRING );
             $title = trim($title);
             $title = mb_substr($title, 0, 60 );


//            $title = $post['title'];
			$surface = $post['surface'];
			$price = $post['price'];
			$types = $post['types'];
//			$badroom = $post['badroom'];
			$status = $post['status'];
			$description = $post['description'];

			$email = $post['email'];
			$tel = $post['tel'];
			$city = $post['city'];
			$id =  $_SESSION['user_data']['id'];		

	
			$imagesPath = $_FILES['filename']['name'];
			// Loop through each file
			// for($i=0; $i<$imagesPath; $i++) {
			foreach($imagesPath as $i => $name){
				$count = 0;

				//Get the temp file path
				$tmpFilePath = $_FILES['filename']['tmp_name'][$i];

				//Make sure we have a filepath
				if ($tmpFilePath != ""){
					//Generate
					$fileName = $_FILES['filename']['name'][$i];
					//Setup our new file path
					$newFilePath = "assets/uploads/" . $fileName;

					//Upload the file into the temp dir
					if(move_uploaded_file($tmpFilePath, $newFilePath)) {
						$queryPath = "INSERT INTO images(Img_Property_ID,Img_Path)  VALUES (LAST_INSERT_ID(), '$fileName')";
					}
				}
			}

			$query = "INSERT INTO contacts (Con_Email,Con_Phone) VALUES (:email, :tel);
			INSERT INTO properties (Pro_Title,Pro_Description,Pro_Surface, Pro_Price,Pro_City_ID,Pro_Contact_ID, Pro_Status_ID,Pro_Type_ID, Pro_User_ID)
											VALUES (:title,:description,:surface,:price,:city,LAST_INSERT_ID(),:status,:types,'$id');".$queryPath;
			$this->query("$query");


			// $this->bind(':filePath', $fileName);
			$this->bind(':email', $email);
			$this->bind(':tel', $tel );
			$this->bind(':city', $city );

			$this->bind(':title', $title);
			// $this->bind(':is_sold', $_POST['isSold']);
			$this->bind(':surface',$surface);
			$this->bind(':price', $price);
			$this->bind(':description',$description);

			$this->bind(':types', $types );
			$this->bind(':status', $status);

			$this->execute();
			
			var_dump($this->lastInsertId());
			
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL. 'props/1');
			}
		}
			return;
	}
		









		



			// Query for multiple img
			// SELECT im.propertyID,p.title,p.is_sold, p.surface,
			// 								p.pricae, p.description, p.badroom,im.imagePath, p.date, t.type, s.status ,ci.city,sa.state
			// 							FROM images im
			// 							INNER JOIN properties p ON im.propertyID = p.propertyID
			// 							INNER JOIN statuses s ON p.statusID = s.statusID
			// 							INNER JOIN types t ON p.typeID = t.typeID
			// 							INNER JOIN contacts c ON p.contactID = c.contactID
			// 							INNER JOIN cities ci ON c.cityID = ci.cityID
			// 							INNER JOIN states sa ON ci.stateID = sa.stateID
			// 							WHERE p.propertyID = '1' 
			// 							ORDER BY p.propertyID ASC 


			
	public function delete($delete_id = 0){

	    $query = "DELETE FROM images WHERE images.Img_Property_ID = '$delete_id';
		          DELETE FROM properties WHERE properties.Pro_ID = '$delete_id'";
		$this->query($query);
		// $this->bind(':id', $delete_id );
				
        if($this->execute()){
		    return true;
        }else{
		    return false;
        }
	}

	public function edit(){

		if(isset($_POST['submit'])){

			$id = $_GET['id'];

			$title = $_POST['title'];
			$surface = $_POST['surface'];
			$price = $_POST['price'];
			$types = $_POST['types'];
			$description = $_POST['description'];
			$badroom = $_POST['badroom'];
			$status = $_POST['status'];
			$description = $_POST['description'];

			$email = $_POST['email'];
			$tel = $_POST['tel'];
			$city = $_POST['city'];




			//---------------- IMG --------------------------
			
			$imagesPath = $_FILES['filename']['name'];
			// Loop through each file
			// for($i=0; $i<$imagesPath; $i++) {
			foreach($imagesPath as $i => $name){
				$count = 0;
			
				//Get the temp file path
				$tmpFilePath = $_FILES['filename']['tmp_name'][$i];


				//Make sure we have a filepath
				if ($tmpFilePath != ""){
					//Generate
					$fileName = $_FILES['filename']['name'][$i];
					//Setup our new file path
					$newFilePath = "assets/uploads/" . $fileName;

					//Upload the file into the temp dir
					if(move_uploaded_file($tmpFilePath, $newFilePath)) {
					
						//Handle other code here
						$queryPath = "UPDATE images im
													INNER JOIN properties p ON im.propertyID = p.propertyID
													INNER JOIN contacts c ON p.contactID = c.contactID
													SET p.title = :title, p.surface = :surface, p.pricae = :price ,p.description = :description,p.badroom = :badroom,p.typeID = :types,p.statusID = :status,p.cityID = :city,im.imagePath = :imgPath,c.email = :email ,c.tel = :tel
													WHERE im.propertyID = '$id'";
						$this->query("$queryPath");
						$this->bind(':imgPath', $fileName);
						// $this->bind(':filePath', $fileName);
						$this->execute();
					}
				}
			}




			// Properties
			$this->bind(':title', $title);
			$this->bind(':surface',$surface);
			$this->bind(':price', $price);
			$this->bind(':description',$description);
			$this->bind(':badroom', $badroom);
			$this->bind(':types', $types );
			$this->bind(':status', $status);
			$this->bind(':city', $city );

			//Contacts
			$this->bind(':email', $email);
			$this->bind(':tel', $tel );

			// $this->bind(':is_sold', $_POST['isSold']);
			$this->execute();

			echo $this->lastInsertId();
			if($this->lastInsertId()){
				// Redirect
		
				header('Location: '.ROOT_URL. 'shares');
			}
		}
		return;
	}

			public function search(){

				if(isset($_POST['submit'])){

				}
				return;
			}
		
		
				

}