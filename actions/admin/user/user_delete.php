<?php
/**
    *
    * User deletion
    *
    */

$q1 = $db->prepare("SELECT * FROM users WHERE 1");
$q1->execute();
    
while($users_list_delete = $q1->fetch(PDO::FETCH_ASSOC)){
    
    if((isset($_POST['submit_user_delete_'.$users_list_delete['id_user']])) && ($User->UserSessionAdmin($db) == 0)){

        if($User -> AdminUserDelete($db,$users_list_delete) == 0){

            $User->AdminUserDelete($db, $users_list_delete);

        }elseif($User -> UserDelete($db,$users_list_delete) == 1){

            if($Setting->getLanguage() == 'fr'){

                require 'public/page/fr/error_message/error_admin_user_delete.php';

            }else{
    
                require 'public/page/en/error_message/error_admin_user_delete.php';   
    
            }
    
        }

    }
    
}