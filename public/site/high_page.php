<!-- Page header element -->

<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width"/>
        <?php
        $ip = $IP->getMachine();
        if(($ip == 'iphone') || ($ip == 'iPod') || ($ip == 'iPad')  || ($ip == 'Android')){
            echo "<link rel='stylesheet' href='ressources/style/zimhosting_css/m.style.css'/>";
        }else{
            echo "<link rel='stylesheet' href='ressources/style/zimhosting_css/style.css'/>";
        }
        if($Database->CheckConnection() == 0){

            if($Database->DatabaseCheck() == 0) {
    
                $db = new PDO("mysql:host=" . DB_HOST . ";dbname=zimhosting", USER, PASS);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                if($Database->CheckTables($db) == 0)
                {
    
                    $title = $Setting->getInterfaceName($db);
    
                }else{
    
                    $title = "Zimhosting";
    
                }
        
                
    
            }else{
    
                $title = "Zimhosting";
    
            }
    
        }else{
    
            $title = "Zimhosting";
    
        }
        echo "<title>".$title."</title>";
    ?>
    </head>

    <?php

    if($Database->CheckConnection() == 0){

        if($Database->DatabaseCheck() == 0) {

            $db = new PDO("mysql:host=" . DB_HOST . ";dbname=zimhosting", USER, PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if($Database->CheckTables($db) == 0)
            {

                $background = $Setting->getBackground($db);

            }else{

                $background = 'ressources/img/background.jpg';

            }
    
            

        }else{

            $background = 'ressources/img/background.jpg';

        }

    }else{

        $background = 'ressources/img/background.jpg';

    }

    echo "<body style='background-image: url(".$background.");'>";

    echo "<div id='popup_form_container'></div>";

    ?>