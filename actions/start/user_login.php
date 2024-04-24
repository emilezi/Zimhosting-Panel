<?php
/**
    *
    * User authentication
    *
    */

if(isset($_POST['submit_login'])){

    require 'functions/form.php';

    if($Form->FormLoginCheck($_POST) == 0){

        if($User -> UserLogin($db,$_POST) == 0){

            $User -> UserLogin($db,$_POST);

            header('Location: index.php');

        }elseif($User -> UserLogin($db,$_POST) == 1){

            if($Setting->getLanguage() == 'fr'){

                require 'public/page/fr/error_message/error_start_user_password_check.php';

            }else{
    
                require 'public/page/en/error_message/error_start_user_password_check.php';   
    
            }

        }else{

            if($Setting->getLanguage() == 'fr'){

                require 'public/page/fr/error_message/error_start_user.php';

            }else{
    
                require 'public/page/en/error_message/error_start_user.php';   
    
            }

        }

    }elseif($Form->FormLoginCheck($_POST) == 1){

        if($Setting->getLanguage() == 'fr'){

            require 'public/page/fr/error_message/error_start_form_temper.php';

        }else{

            require 'public/page/en/error_message/error_start_form_temper.php';   

        }
    
    }
    
}