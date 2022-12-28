<?php
/**
    *
    * Create new user
    *
    */

if(isset($_POST['submit_register']) && ($User->UserSessionAdmin($db) == 0)){

    require 'functions/form.php';

    if($Form->FormRegisterCheck($_POST) == 0){

        if($User -> getUser($db,$_POST) == false){

            $User -> UserAdd($db,$_POST,"yes","user");

            header('Location: index.php?page=admin');

        }else{

            require 'public/page/site_element/error_message/error_user_exists.php';

        }

    }else{

        require 'public/page/site_element/error_message/error_form_temper.php';

    }
    
}