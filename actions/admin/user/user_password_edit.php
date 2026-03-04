<?php
/**
    *
    * Editing password user information
    *
    */

if(isset($_POST['submit_user_password_edit']) && ($User->UserSessionAdmin() == 0)){

require 'class/Form.php';

if($Form->FormPasswordCheck() == 0){

    $user = $User->getUserId();

    $User -> UserPasswordEdit($user);

    header('Location: index.php?page=admin&action=users');

}else{

    if($Setting->getLanguage() == 'fr'){

        require 'public/page/fr/error_message/error_form_password_check.php';

    }else{

        require 'public/page/en/error_message/error_form_password_check.php';   

    }

}

}