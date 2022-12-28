<?php
/**
    * Class of parameters
    *
    * @author Emile ZIMMER
    */
class Setting{

    /**
        * Get background information
        *
        * @param Object database connection
        *
        * @return string setting set
        *
        */
    public function getBackground($db){

        $q = $db->prepare("SELECT * FROM setting WHERE setting_name=:setting_name");
        $q->execute([
        'setting_name' => "background"
        ]);

        $setting = $q->fetch();

        return $setting['setting_set'];

    }

    /**
        * Set background
        *
        * @param Object database connection
        *
        * @param string background set
        *
        */
    public function setBackground($db,$set){

        $q = $db->prepare("UPDATE setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
        'setting_set' => $set,
        'setting_name' => 'background'
        ]);
    
    }

    /**
        * Set display
        *
        * @param Object database connection
        *
        * @return string setting set
        *
        */
    public function getDisplay($db){

        $q = $db->prepare("SELECT * FROM setting WHERE setting_name=:setting_name");
        $q->execute([
        'setting_name' => "p_display"
        ]);

        $setting = $q->fetch();

        return $setting['setting_set'];
    
    }

    /**
        * Get background information
        *
        * @param Object database connection
        *
        * @param string set
        *
        */
    public function setDisplay($db,$set){

        $q = $db->prepare("UPDATE `setting` SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
        'setting_set' => $set,
        'setting_name' => 'p_display'
        ]);
    
    }

    /**
        * Get language settings
        */
    public function Language(){

        if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "es"){
    
            $set_language = "es";
        
        }elseif(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "de"){
        
            $set_language = "de";
        
        }elseif(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "fr"){
        
            $set_language = "fr";
        
        }else{
        
            $set_language = "en";
        
        }
    
    }

}

$Setting = new Setting();

?>