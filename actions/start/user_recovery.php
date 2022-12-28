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

            require 'public/page/site_element/commit_message/validated_start_user_recovery.php';

        }else{

         require 'public/page/site_element/error_message/error_start_user_recovery.php';

        }

    }elseif($Form->FormEmailCheck($_POST) == 1){

        require 'public/page/site_element/error_message/error_start_form_temper.php';
    
    }
    
}