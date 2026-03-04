<?php
/**
    * Email management class
    *
    * @author Emile Z.
    */
class Mail{

    /**
        * Send password recovery email
        *
        * @param array user information
        *
        */
    public function MailRecovery($user){
    
        $sujet = "Zimhosting - Recupération de votre compte";
        $entete = "From: service@" . EMAIL_HOST;
        
        $message = "Pour recupérer votre compte, merci de cliquer sur ce lien
        
        http://" . HTTP_HOST . "/index.php?page=user_password_recovery&get1=".urlencode($user['user_key'])."&get2=".urlencode($user['recovery_key'])."
        
        ---------------
        Ce mail est un mail automatique, merci de ne pas répondre";
        
        mail($user['email'], $sujet, $message, $entete);

    }

}

$Mail = new Mail();

?>