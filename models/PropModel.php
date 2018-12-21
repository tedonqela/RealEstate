<?php

class PropModel extends Model{


    public function total_lajme($limit= 5){
        $this->query('SELECT COUNT(p.Pro_ID) as Totali FROM properties p WHERE p.Pro_Active = 1');

        if($rows = $this->single()){
            $totali = $rows['Totali'];
            $sa_faqe = ceil($totali/$limit);

            return [ 'totali' => $rows['Totali'], 'sa_faqe' => $sa_faqe ];
        }else{
            return 0;
        }

    }

    public function index($page = 1, $limit = 5){

        $offset = ($page - 1) * $limit;

        $this->query("SELECT im.Img_ID,im.Img_Path,p.Pro_ID,p.Pro_Active,p.Pro_Title,p.Pro_Surface, p.Pro_Price, p.Pro_Description,t.Type_Name, s.Sts_Name,ci.City_Name,sa.Sta_Name
                            FROM images im
                            INNER JOIN properties p ON im.Img_Property_ID = p.Pro_ID
                            INNER JOIN statuses s ON p.Pro_Status_ID = s.Sts_ID
                            INNER JOIN types t ON p.Pro_Type_ID = t.Type_ID
                            INNER JOIN cities ci ON p.Pro_City_ID = ci.City_ID
                            INNER JOIN states sa ON ci.City_State_ID = sa.Sta_ID
                            WHERE p.Pro_Active = 1
		GROUP BY p.Pro_ID
		ORDER BY p.Pro_ID DESC
		LIMIT $offset,$limit
		");

        $rows = $this->resultSet();

        if($rows){
            return $rows;
        }else{
            return 0;
        }

    }
}