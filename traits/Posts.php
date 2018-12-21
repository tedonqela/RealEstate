<?php
/**
 * Created by PhpStorm.
 * User: Ted's-PC
 * Date: 8/10/2018
 * Time: 6:10 PM
 */

namespace realestate\traits;


trait Posts{

    public function kerkoModel( $search = "" ) {

        $sql = "SELECT im.Img_ID,im.Img_Path,p.Pro_ID,p.Pro_Title,p.Pro_Surface, p.Pro_Price, p.Pro_Description,t.Type_Name, s.Sts_Name,ci.City_Name,sa.Sta_Name
                            FROM images im
                            INNER JOIN properties p ON im.Img_Property_ID = p.Pro_ID
                            INNER JOIN statuses s ON p.Pro_Status_ID = s.Sts_ID
                            INNER JOIN types t ON p.Pro_Type_ID = t.Type_ID
                            INNER JOIN cities ci ON p.Pro_City_ID = ci.City_ID
                            INNER JOIN states sa ON ci.City_State_ID = sa.Sta_ID
                            WHERE p.Pro_Active = 1 AND (p.Pro_Title LIKE '$search' OR p.Pro_Description LIKE '$search')
                            ORDER BY p.Pro_ID DESC";

        $rezultate = $this->query( $sql );
        if ( $rezultate->num_rows > 0 ) {
            $kerkimet = [];
            while ( $rreshti = $rezultate->fetch_assoc() ) {
                $kerkimet[] = [
                    'Ljm_ID'      => $rreshti['Ljm_ID'],
                    'Ljm_Titulli' => $rreshti['Ljm_Titulli'],
                    'Ljm_DataPostimit' => $rreshti['Ljm_DataPostimit'],
                    'Ljm_Teksti' => mb_substr(strip_tags($rreshti['Ljm_Teksti']), 0, 30),
                ];
            }

            return $kerkimet;
        } else {
            return NULL;
        }
    }



}