<?php
/**
    *
    * admin page redirect setting
    *
    */

if($Setting->getLanguage() == 'fr'){

    require 'public/page/fr/admin/aside.php';

    if(isset($_GET['action']) && !empty($_GET['action'])){

        if($_GET['action'] == "apps"){
                
            require 'public/page/fr/admin/apps.php';
                
        }elseif($_GET['action'] == "store"){
                
            require 'public/page/fr/admin/store.php';
                    
        }elseif(($_GET['action'] == "app_information") && (isset($_GET['app_name'])) && (!empty($_GET['app_name']))){
                
            require 'public/page/fr/admin/app_information.php';
                    
        }elseif($_GET['action'] == "users"){
                
            require 'public/page/fr/admin/user/users.php';
                    
        }elseif($_GET['action'] == "new_user"){
    
            require 'actions/admin/user/user_register.php';
                
            require 'public/page/fr/admin/user/user_register.php';
                    
        }elseif(($_GET['action'] == "user_edit") && (isset($_GET['id'])) && (!empty($_GET['id']))){
                
            require 'public/page/fr/admin/user/user_edit.php';
                
        }elseif(($_GET['action'] == "user_password_edit") && (isset($_GET['id'])) && (!empty($_GET['id']))){
                
            require 'public/page/fr/admin/user/user_password_edit.php';
                
        }elseif($_GET['action'] == "statistics"){
                
            require 'public/page/fr/admin/statistics.php';
                
        }elseif($_GET['action'] == "appearance"){
                
            require 'public/page/fr/admin/appearance.php';
                
        }elseif($_GET['action'] == "interface"){
                
            require 'public/page/fr/admin/interface.php';
                
        }else{
                
            require 'public/page/fr/admin/about.php';
                
        }
    
        }else{
    
        require 'public/page/fr/admin/about.php';
    
    }           

}else{

    require 'public/page/en/admin/aside.php';

    if(isset($_GET['action']) && !empty($_GET['action'])){

        if($_GET['action'] == "apps"){
                
            require 'public/page/en/admin/apps.php';
                
        }elseif($_GET['action'] == "store"){
                
            require 'public/page/en/admin/store.php';
                    
        }elseif(($_GET['action'] == "app_information") && (isset($_GET['app_name'])) && (!empty($_GET['app_name']))){
                
            require 'public/page/en/admin/app_information.php';
                    
        }elseif($_GET['action'] == "users"){
                
            require 'public/page/en/admin/user/users.php';
                    
        }elseif($_GET['action'] == "new_user"){
    
            require 'actions/admin/user/user_register.php';
                
            require 'public/page/en/admin/user/user_register.php';
                    
        }elseif(($_GET['action'] == "user_edit") && (isset($_GET['id'])) && (!empty($_GET['id']))){
                
            require 'public/page/en/admin/user/user_edit.php';
                
        }elseif(($_GET['action'] == "user_password_edit") && (isset($_GET['id'])) && (!empty($_GET['id']))){
                
            require 'public/page/en/admin/user/user_password_edit.php';
                
        }elseif($_GET['action'] == "statistics"){
                
            require 'public/page/en/admin/statistics.php';
                
        }elseif($_GET['action'] == "appearance"){
                
            require 'public/page/en/admin/appearance.php';
                
        }elseif($_GET['action'] == "interface"){
                
            require 'public/page/en/admin/interface.php';
                
        }else{
                
            require 'public/page/en/admin/about.php';
                
        }
    
        }else{
    
        require 'public/page/en/admin/about.php';
    
    }

}