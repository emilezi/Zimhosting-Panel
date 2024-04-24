<?php
/**
    *
    * Editing password information
    *
    */

if(isset($_POST['submit_user_password_edit']) && ($User->UserSession($db) == 0)){

require 'functions/form.php';

if($Form->FormPasswordCheck($_POST) == 0){

    $User -> UserPasswordEdit($db,$_SESSION,$_POST);

    header('Location: index.php?page=account');

}else{

    if($Setting->getLanguage() == 'fr'){

        require 'public/page/fr/error_message/error_form_password_check.php';

    }else{

        require 'public/page/en/error_message/error_form_password_check.php';   

    }

}

}