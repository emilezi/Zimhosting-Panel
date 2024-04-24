<?php
/**
    *
    * Send email for account recovery
    *
    */

if(isset($_POST['submit_recovery'])){

    require 'functions/form.php';
    require 'functions/mail.php';

    if($Form->FormEmailCheck($_POST) == 0){

        $user = $User->getUser($db,$_POST);

        if($user == TRUE){

            $User -> UserRecoveryKey($db,$user);

            $user = $User -> getUser($db,$_POST);

            $Mail -> MailRecovery($user);

            if($Setting->getLanguage() == 'fr'){

                require 'public/page/fr/commit_message/validated_start_user_recovery.php';

            }else{
    
                require 'public/page/en/commit_message/validated_start_user_recovery.php';   
    
            }            

        }else{

            if($Setting->getLanguage() == 'fr'){

                require 'public/page/fr/error_message/error_start_user_recovery.php';

            }else{
    
                require 'public/page/en/error_message/error_start_user_recovery.php';   
    
            }

        }

    }elseif($Form->FormEmailCheck($_POST) == 1){

        if($Setting->getLanguage() == 'fr'){

            require 'public/page/fr/error_message/error_start_form_temper.php';

        }else{

            require 'public/page/en/error_message/error_start_form_temper.php';   

        }
    
    }
    
}