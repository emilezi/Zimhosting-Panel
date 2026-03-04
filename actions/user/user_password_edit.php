<?php
/**
    *
    * Editing password information
    *
    */

if(isset($_POST['submit_user_password_edit']) && ($User->UserSession() == 0)){

require 'class/Form.php';

if($Form->FormPasswordCheck() == 0){

    $User -> UserPasswordEdit($_SESSION);

    header('Location: index.php?page=account');

}else{

    if($Setting->getLanguage() == 'fr'){

        require 'public/page/fr/error_message/error_form_password_check.php';

    }else{

        require 'public/page/en/error_message/error_form_password_check.php';   

    }

}

}