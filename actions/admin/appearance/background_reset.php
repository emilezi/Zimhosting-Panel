<?php
/**
    *
    * Background image reset
    *
    */

if(isset($_POST['submit_background_reset']) && ($User->UserSessionAdmin($db) == 0)){

    $File->DeleteBackground();

    $Setting->setBackground($db, 'ressources/img/background.jpg');

    header('Location: index.php?page=admin&action=appearance');
    
}
