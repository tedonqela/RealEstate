<?php
namespace realestate\traits;


trait DergoEmail {


    public function dergo($Usr_Email, $Usr_Name, $msg, $content, $subject) {
        // Create the Transport
        $transport = ( new \Swift_SmtpTransport(MAIL_HOST, MAIL_PORT ,"ssl") )
            ->setUsername( EMAIL )
            ->setPassword( PASS );


        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer( $transport );

        // Create a message
        $message = ( new \Swift_Message( $subject ) )
            ->setFrom( [ EMAIL => $content ] )
            ->setTo( [ $Usr_Email => $Usr_Name ] )
            ->setBody( $msg );

        // Send the message
        return $mailer->send( $message );
    }

    public function contact($Usr_Email, $Usr_Name, $msg, $content, $subject) {
        // Create the Transport
        $transport = ( new \Swift_SmtpTransport(MAIL_HOST, MAIL_PORT ,"ssl") )
            ->setUsername( EMAIL )
            ->setPassword( PASS );


        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer( $transport );

        // Create a message
        $message = ( new \Swift_Message( $subject ) )
            ->setFrom( [ $Usr_Email => $Usr_Name ] )
            ->setTo( [ EMAIL => $Usr_Name ] )
            ->setBody( $msg );

        // Send the message
        return $mailer->send( $message );
    }

}