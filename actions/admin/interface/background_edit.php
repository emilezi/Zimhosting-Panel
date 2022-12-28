<?php
/**
    *
    * Background image editor
    *
    */

if(isset($_POST['submit_background_edit']) && ($User->UserSessionAdmin($db) == 0)){

    if($File->CheckBackground($_FILES) == 0){

        if($File->CheckWriteability() == 0){

            $File->ImportBackground($_FILES);

            $Setting->setBackground($db, 'uploads/background.jpg');
    
            require 'public/page/site_element/commit_message/validated_interface_background_edit.php';

        }else{

            require 'public/page/site_element/error_message/error_writeability.php';

        }

    }elseif($File->CheckBackground($_FILES) == 1){

        require 'public/page/site_element/error_message/error_file_extension.php';

    }elseif($File->CheckBackground($_FILES) == 2){

        require 'public/page/site_element/error_message/error_file_size.php';

    }elseif($File->CheckBackground($_FILES) == 3){

        require 'public/page/site_element/error_message/error_file_empty.php';

    }elseif($File->CheckBackground($_FILES) == 4){

        require 'public/page/site_element/error_message/error_file.php';

    }
    
}