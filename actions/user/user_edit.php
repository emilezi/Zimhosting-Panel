<?php
/**
    *
    * Editing profil information
    *
    */

if(isset($_POST['submit_user_edit']) && ($User->UserSession($db) == 0)){

require 'functions/form.php';

if($Form->FormUserEditCheck($_POST) == 0){

    $User -> UserEdit($db,$_SESSION,$_POST);

    header('Location: index.php?page=account');

    require 'public/page/site_element/error_message/error_user_exists.php';

}else{

    require 'public/page/site_element/error_message/error_form_temper.php';

}

}