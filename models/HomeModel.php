<?php

use realestate\traits\DergoEmail;

class HomeModel extends Model
{
    use DergoEmail;

	public function Index(){
                     //Selecting all images fields
		$this->query('SELECT *FROM images im
                            -- Join all tables with images table
                            INNER JOIN properties p ON im.Img_Property_ID = p.Pro_ID
                            INNER JOIN statuses s ON p.Pro_Status_ID = s.Sts_ID
                            INNER JOIN types t ON p.Pro_Type_ID = t.Type_ID
                            INNER JOIN cities ci ON p.Pro_City_ID = ci.City_ID
                            INNER JOIN states sa ON ci.City_State_ID = sa.Sta_ID
                            --  Select only approval post.
                            WHERE p.Pro_Active = 1
                            -- Group by property table
                            GROUP BY p.Pro_ID
                            -- Order by property ID
                            ORDER BY p.Pro_ID DESC
                            -- Select only 3 property
                            Limit 3;');
                            // Work with result
                            $rows = $this->resultSet();
                            return $rows;
	}


//	public function result(){
//
//
//        $city = filter_var($_GET, FILTER_SANITIZE_STRING);
////        $status = filter_var($_GET['status'], FILTER_SANITIZE_STRING);
////        $type = filter_var($_GET['type'], FILTER_SANITIZE_STRING);
////        $price = filter_var($_GET['price'], FILTER_SANITIZE_STRING);
//
//
//
//        //p.Pro_Price LIKE %123435.00% AND p.Type_Name LIKE '%$type%' AND s.Sts_Name LIKE '%$status%' AND
//
//        if(isset($_POST['submit'])){
//            $this->query("SELECT im.Img_ID,im.Img_Path,p.Pro_Active,p.Pro_Title,p.Pro_Surface, p.Pro_Price, p.Pro_Description,t.Type_Name, s.Sts_Name,ci.City_Name,sa.Sta_Name
//                            FROM images im
//                            INNER JOIN properties p ON im.Img_Property_ID = p.Pro_ID
//                            INNER JOIN statuses s ON p.Pro_Status_ID = s.Sts_ID
//                            INNER JOIN types t ON p.Pro_Type_ID = t.Type_ID
//                            INNER JOIN cities ci ON p.Pro_City_ID = ci.City_ID
//                            INNER JOIN states sa ON ci.City_State_ID = sa.Sta_ID
//                            WHERE p.Pro_Active = '1' AND ci.City_Name LIKE '%$city%'");
//
//            $rows = $this->resultSet();
//
//
//            return $rows;
//
//
//
//        }
//
//
//    }



	public function sales(){
		$this->query("SELECT im.Img_ID,im.Img_Path,p.Pro_Title,p.Pro_Surface, p.Pro_Price, p.Pro_Description,t.Type_Name, s.Sts_Name,ci.City_Name,sa.Sta_Name
                            FROM images im
                            INNER JOIN properties p ON im.Img_Property_ID = p.Pro_ID
                            INNER JOIN statuses s ON p.Pro_Status_ID = s.Sts_ID
                            INNER JOIN types t ON p.Pro_Type_ID = t.Type_ID
                            INNER JOIN cities ci ON p.Pro_City_ID = ci.City_ID
                            INNER JOIN states sa ON ci.City_State_ID = sa.Sta_ID
		WHERE s.Sts_Name = 'shitet' AND p.Pro_Active = 1
        GROUP BY p.Pro_ID
        ORDER BY p.Pro_ID DESC
        LIMIT 3");
		$rows = $this->resultSet();

		return $rows;
	}


	public function rents(){
		$this->query("SELECT im.Img_ID,im.Img_Path,p.Pro_Title,p.Pro_Surface, p.Pro_Price, p.Pro_Description,t.Type_Name, s.Sts_Name,ci.City_Name,sa.Sta_Name
                            FROM images im
                            INNER JOIN properties p ON im.Img_Property_ID = p.Pro_ID
                            INNER JOIN statuses s ON p.Pro_Status_ID = s.Sts_ID
                            INNER JOIN types t ON p.Pro_Type_ID = t.Type_ID
                            INNER JOIN cities ci ON p.Pro_City_ID = ci.City_ID
                            INNER JOIN states sa ON ci.City_State_ID = sa.Sta_ID
		WHERE s.Sts_Name = 'Qera' AND p.Pro_Active = 1
    GROUP BY p.Pro_ID
    ORDER BY p.Pro_ID DESC
    Limit 3");
		$rows = $this->resultSet();
		return $rows;
	}

	
	public function sentMail($name = "", $subject = "", $email = "", $comment = ""){

		if(isset($_POST['submit'])){
			return $this->contact($email, $name, $subject,'Real Estate KS',$comment);
		}
	}
}