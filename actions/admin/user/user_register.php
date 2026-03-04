<?php
/**
    *
    * Create new user
    *
    */

if(isset($_POST['submit_register']) && ($User->UserSessionAdmin() == 0)){

    require 'class/Form.php';

    if($Form->FormRegisterCheck() == 0){

        if($User -> getUserIdentifierEmail() == false){

            $User -> UserAdd("yes","user");

            header('Location: index.php?page=admin&action=users');

        }else{

            if($Setting->getLanguage() == 'fr'){

                require 'public/page/fr/error_message/error_user_exists.php';

            }else{
    
                require 'public/page/en/error_message/error_user_exists.php';   
    
            }

        }

    }else{

        if($Setting->getLanguage() == 'fr'){

            require 'public/page/fr/error_message/error_form_temper.php';

        }else{

            require 'public/page/en/error_message/error_form_temper.php';   

        }

    }
    
}