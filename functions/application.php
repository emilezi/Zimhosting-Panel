<?php
/**
    * Application management class.
    *
    * @author Emile Z.
    */
class Application{

    /**
        * Check if the package exists in the repository
        *
        * @param array application information
        *
        * @return boolean if the package exists
        */
    public function CheckPackage($app){

        $zip = new ZipArchive;

        if($zip->open("_package/".$app['name'].".zip") === TRUE) {

            return 0;

        }else{

            return 1;

        }

    }

    /**
        * Retrieve application information
        *
        * @param array application information
        *
        * @return array application information
        */
    public function getApp($db,$app){

        $q = $db->prepare("SELECT * FROM applications WHERE name=:name");
        $q->execute([
        'name' => $app['app_name']
        ]);

        $app = $q->fetch();

        return $app;

    }

    /**
        * Installing the app
        *
        * @param Object database connection
        *
        * @param array application information
        *
        */
    public function AppInstall($db,$app){

        $zip = new ZipArchive;

        $zip->open("_package/" . $app['name'] . ".zip");
        $zip->extractTo('apps/');
        $zip->close();
        
        $q = $db->prepare("UPDATE applications SET installed=:installed WHERE name=:name");
        $q->execute([
        'installed' => 'yes',
        'name' => $app['name']
        ]);

        if($app['db_require'] == 'yes'){

            $q = "CREATE DATABASE zimhosting_" . $app['name'];
            $db->exec($q);

        }

        $q = $db->prepare("INSERT INTO search_data(category,element,link,type) VALUES(:category,:element,:link,:type)");
        $q->execute([
        'category' => "application",
        'element' => $app['name'],
        'link'=> "apps/".$app['name'],
        'type' => "classic"
        ]);

    }

    /**
        * Delete app
        *
        * @param Object database connection
        *
        * @param array application information
        *
        */
    public function AppRemove($db,$app){

        $q = $db->prepare("UPDATE applications SET installed=:installed WHERE name=:name");
        $q->execute([
        'installed' => 'no',
        'name' => $app['name']
        ]);

        if($app['db_require'] == 'yes'){

        $q = "DROP DATABASE zimhosting_" . $app['name'];
        $db->exec($q);

        }

        $q = $db->prepare("DELETE FROM `search_data` WHERE element=:element");
        $q->execute([
        'element' => $app['name']
        ]);

    }

}

$Application = new Application();