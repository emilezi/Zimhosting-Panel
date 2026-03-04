<?php
/**
    *
    * Background image editor
    *
    */

if(isset($_POST['submit_background_edit']) && ($User->UserSessionAdmin() == 0)){

    if($File->CheckBackground() == 0){

        if($File->CheckWriteability() == 0){

            $File->ImportBackground();

            $Setting->setBackground('uploads/background.jpg');
    
            header('Location: index.php?page=admin&action=appearance');

        }else{

            if($Setting->getLanguage() == 'fr'){

                require 'public/page/fr/error_message/error_writeability.php';

            }else{
    
                require 'public/page/en/error_message/error_writeability.php';   
    
            }

        }

    }elseif($File->CheckBackground() == 1){

        if($Setting->getLanguage() == 'fr'){

            require 'public/page/fr/error_message/error_file_extension.php';

        }else{

            require 'public/page/en/error_message/error_file_extension.php';   

        }

    }elseif($File->CheckBackground() == 2){

        if($Setting->getLanguage() == 'fr'){

            require 'public/page/fr/error_message/error_file_size.php';

        }else{

            require 'public/page/en/error_message/error_file_size.php';   

        }

    }elseif($File->CheckBackground() == 3){

        if($Setting->getLanguage() == 'fr'){

            require 'public/page/fr/error_message/error_file.php';

        }else{

            require 'public/page/en/error_message/error_file.php';   

        }

    }elseif($File->CheckBackground() == 4){

        if($Setting->getLanguage() == 'fr'){

            require 'public/page/fr/error_message/error_file_empty.php';

        }else{

            require 'public/page/en/error_message/error_file_empty.php';   

        }

    }
    
}