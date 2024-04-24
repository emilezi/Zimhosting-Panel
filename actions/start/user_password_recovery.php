<?php
/**
    *
    * Creating a new user password
    *
    */

if(isset($_POST['submit_user_password_recovery'])){

require 'functions/form.php';

if($Form->FormPasswordCheck($_POST) == 0){

    $user = $User->getUser($db,$_GET);

    $User -> UserPasswordEdit($db,$user,$_POST);

    $User -> UserRecoveryKey($db,$user);

    if($Setting->getLanguage() == 'fr'){

        require 'public/page/fr/commit_message/validated_start_user_edit_password.php';

    }else{

        require 'public/page/en/commit_message/validated_start_user_edit_password.php';   

    }

    header('Location: index.php');

}else{

    if($Setting->getLanguage() == 'fr'){

        require 'public/page/fr/error_message/error_start_form_password_check.php';

    }else{

        require 'public/page/en/error_message/error_start_form_password_check.php';   

    }

}

}