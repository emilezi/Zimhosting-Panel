<?php
/**
    * Class of parameters
    *
    * @author Emile Z.
    */
class Setting extends Database{

    /**
        * Get interface name information
        *
        * @return string interface name set
        *
        */
    public function getInterfaceName(){

        $db = self::getDatabase();

        $q = $db->prepare("SELECT * FROM setting WHERE setting_name=:setting_name");
        $q->execute([
        'setting_name' => "interface_name"
        ]);

        $setting = $q->fetch();

        return $setting['setting_set'];

    }

    /**
        * Set interface name
        *
        * @param string interface name set
        *
        */
    public function setInterfaceName($set){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
        'setting_set' => htmlspecialchars($set),
        'setting_name' => 'interface_name'
        ]);
    
    }

    /**
        * Get background information
        *
        * @return string setting set
        *
        */
    public function getBackground(){

        $db = self::getDatabase();

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
        * @param string background set
        *
        */
    public function setBackground($set){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
        'setting_set' => $set,
        'setting_name' => 'background'
        ]);
    
    }

    /**
        * Set display
        *
        * @return string setting set
        *
        */
    public function getDisplay(){

        $db = self::getDatabase();

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
        * @param string set
        *
        */
    public function setDisplay($set){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE `setting` SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
        'setting_set' => $set,
        'setting_name' => 'p_display'
        ]);
    
    }

    /**
        * Get language settings
        */
    public function getLanguage(){

        if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "fr"){
    
            return "fr";
        
        }else{
        
            return "en";
        
        }
    
    }

}

$Setting = new Setting();

?>