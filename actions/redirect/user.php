<?php
/**
    *
    * user page redirect setting
    *
    */

if($Setting->getLanguage() == 'fr'){

    require 'public/page/fr/user/aside.php';

    if(isset($_GET['action']) && !empty($_GET['action'])){

        if($_GET['action'] == "account_edit"){
                    
            require 'public/page/fr/user/user_edit.php';
                        
        }elseif($_GET['action'] == "account_password_edit"){
                    
            require 'public/page/fr/user/user_password_edit.php';
                        
        }else{
            
            require 'public/page/fr/user/user.php';
            
        }
        
        }else{
        
            require 'public/page/fr/user/user.php';
        
    }   

}else{

    require 'public/page/en/user/aside.php';

    if(isset($_GET['action']) && !empty($_GET['action'])){

        if($_GET['action'] == "account_edit"){
                    
            require 'public/page/en/user/user_edit.php';
                        
        }elseif($_GET['action'] == "account_password_edit"){
                    
            require 'public/page/en/user/user_password_edit.php';
                        
        }else{
            
            require 'public/page/en/user/user.php';
            
        }
        
        }else{
        
            require 'public/page/en/user/user.php';
        
    }   

}