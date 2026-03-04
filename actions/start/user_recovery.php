<?php
/**
    *
    * Send email for account recovery
    *
    */

if(isset($_POST['submit_recovery'])){

    require 'class/Form.php';
    require 'class/Mail.php';

    if($Form->FormEmailCheck() == 0){

        $user = $User->getUserEmail();

        if($user == TRUE){

            $User -> UserRecoveryKey($user);

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

    }elseif($Form->FormEmailCheck() == 1){

        if($Setting->getLanguage() == 'fr'){

            require 'public/page/fr/error_message/error_start_form_temper.php';

        }else{

            require 'public/page/en/error_message/error_start_form_temper.php';   

        }
    
    }
    
}