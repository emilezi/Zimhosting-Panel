<?php
/**
    *
    * Background image reset
    *
    */

if(isset($_POST['submit_background_reset']) && ($User->UserSessionAdmin() == 0)){

    $File->DeleteBackground();

    $Setting->setBackground('ressources/img/background.jpg');

    header('Location: index.php?page=admin&action=appearance');
    
}
