<?php
/**
    *
    * Creation of the first user for the first connection
    *
    */

if(isset($_POST['submit_register'])){

    require 'functions/form.php';

    if($Form->FormRegisterCheck($_POST) == 0){

        if($Form->FormPasswordCheck($_POST) == 0){

        $Database -> addTables($db);

        $User -> UserAdd($db,$_POST,"yes","admin");

        $User -> UserLogin($db,$_POST);

        header('Location: index.php');

        }else{

            if($Setting->getLanguage() == 'fr'){

                require 'public/page/fr/error_message/error_start_form_password_check.php';

            }else{
    
                require 'public/page/en/error_message/error_start_form_password_check.php';   
    
            }

        }

    }elseif($Form->FormRegisterCheck($_POST) == 1){

        if($Setting->getLanguage() == 'fr'){

            require 'public/page/fr/error_message/error_start_form_temper.php';

        }else{

            require 'public/page/en/error_message/error_start_form_temper.php';   

        }

    }
    
}