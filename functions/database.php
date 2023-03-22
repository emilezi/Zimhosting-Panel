<?php
/**
    * Class database management
    *
    * @author Emile ZIMMER
    */
class Database{

    /**
        * Check database server connection
        *
        * @return boolean whether a connection to the database server is possible
        */
    public function CheckConnection(){

        try{

            $db = new PDO("mysql:host=" . DB_HOST . ";", USER, PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return 0;

        }catch(PDOException $e){

            return 1;

        }

    }

    /**
        * Creation of the zimhosting database if it does not exist
        */
    public function CreateDatabases(){

        $db = new PDO("mysql:host=" . DB_HOST . ";", USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $q = "CREATE DATABASE IF NOT EXISTS `zimhosting`";
        $db->exec($q);

    }

    /**
        *
        * @param Object database connection
        *
        * Creation of the tables in the zimhosting database
        */
    public function addTables($db){

        $q = $db->prepare("
            CREATE TABLE `users` (
            `id` int(11) NOT NULL,
            `id_user` varchar(255) NOT NULL,
            `identifier` varchar(255) NOT NULL,
            `full_name` varchar(255) NOT NULL,
            `email` varchar(255) NOT NULL,
            `password` varchar(255) NOT NULL,
            `active` varchar(255) NOT NULL,
            `user_key` varchar(255) NOT NULL,
            `type` varchar(255) NOT NULL,
            `date` timestamp NOT NULL DEFAULT current_timestamp(),
            `picture` varchar(255) NULL,
            `recovery_key` varchar(255) NULL,
            `recovery_date` varchar(255) NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
            
            CREATE TABLE `applications` (
            `id` int(11) NOT NULL,
            `category` varchar(255) NOT NULL,
            `version` varchar(255) NOT NULL,
            `name` varchar(255) NOT NULL,
            `qualified_name` varchar(255) NOT NULL,
            `installed` varchar(255) NOT NULL,
            `db_require` varchar(255) NOT NULL,
            `source` varchar(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

            CREATE TABLE `setting` (
            `id` int(11) NOT NULL,
            `setting_name` varchar(255) NOT NULL,
            `setting_set` varchar(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

            CREATE TABLE `search_data` (
            `id` int(11) NOT NULL,
            `category` varchar(255) NOT NULL,
            `element` varchar(255) NOT NULL,
            `link` varchar(255) NOT NULL,
            `type` varchar(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

            CREATE TABLE `connections` (
            `id` int(11) NOT NULL,
            `ip` varchar(255) NOT NULL,
            `appareil` varchar(255) NOT NULL,
            `navigateur` varchar(255) NOT NULL,
            `date` timestamp NOT NULL DEFAULT current_timestamp()
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
            
            ALTER TABLE `users`
            ADD PRIMARY KEY (`id`),
            ADD UNIQUE KEY (`email`),
            ADD UNIQUE KEY (`identifier`);
            
            ALTER TABLE `applications`
            ADD PRIMARY KEY (`id`);

            ALTER TABLE `setting`
            ADD PRIMARY KEY (`id`);

            ALTER TABLE `search_data`
            ADD PRIMARY KEY (`id`);

            ALTER TABLE `connections`
            ADD PRIMARY KEY (`id`);
            
            ALTER TABLE `users`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
            
            ALTER TABLE `applications`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

            ALTER TABLE `setting`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

            ALTER TABLE `search_data`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

            ALTER TABLE `connections`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

            INSERT INTO `applications` (`id`, `category`, `version`, `name`,`qualified_name`, `installed`, `db_require`, `source`) VALUES(1, 'game', '1', '2048_master', '2048 master', 'no', 'no', 'https://github.com/gabrielecirulli/2048');
            INSERT INTO `applications` (`id`, `category`, `version`, `name`,`qualified_name`, `installed`, `db_require`, `source`) VALUES(2, 'game', '1', 'clumsy_bird_master', 'Clumsy bird master', 'no', 'no', 'https://github.com/ellisonleao/clumsy-bird');
            INSERT INTO `applications` (`id`, `category`, `version`, `name`,`qualified_name`, `installed`, `db_require`, `source`) VALUES(3, 'office', '10.0.5', 'glpi', 'Glpi', 'no', 'yes', 'https://glpi-project.org/');
            INSERT INTO `applications` (`id`, `category`, `version`, `name`,`qualified_name`, `installed`, `db_require`, `source`) VALUES(4, 'game', '1', 'hextris', 'Hextris', 'no', 'no', 'https://github.com/Hextris/hextris');
            INSERT INTO `applications` (`id`, `category`, `version`, `name`,`qualified_name`, `installed`, `db_require`, `source`) VALUES(5, 'social', '1.12.2', 'humhub', 'Humhub', 'no', 'yes', 'https://www.humhub.com/');
            INSERT INTO `applications` (`id`, `category`, `version`, `name`,`qualified_name`, `installed`, `db_require`, `source`) VALUES(6, 'cloud', '25.0.1', 'nextcloud', 'Nextcloud', 'no', 'yes', 'https://nextcloud.com/');
            INSERT INTO `applications` (`id`, `category`, `version`, `name`,`qualified_name`, `installed`, `db_require`, `source`) VALUES(7, 'cloud', '10.11', 'owncloud', 'Owncloud', 'no', 'yes', 'https://owncloud.com/');
            INSERT INTO `applications` (`id`, `category`, `version`, `name`,`qualified_name`, `installed`, `db_require`, `source`) VALUES(8, 'game', '1', 'pacman_canvas_master', 'Pacman canvas master', 'no', 'no', 'https://github.com/platzhersh/pacman-canvas');
            INSERT INTO `applications` (`id`, `category`, `version`, `name`,`qualified_name`, `installed`, `db_require`, `source`) VALUES(9, 'tool', '5.2.0', 'phpmyadmin', 'Phpmyadmin', 'no', 'no', 'https://www.phpmyadmin.net/');
            INSERT INTO `applications` (`id`, `category`, `version`, `name`,`qualified_name`, `installed`, `db_require`, `source`) VALUES(10, 'game', '1', 'radius_raid_master', 'Radius raid master', 'no', 'no', 'https://github.com/jackrugile/radius-raid-js13k');
            INSERT INTO `applications` (`id`, `category`, `version`, `name`,`qualified_name`, `installed`, `db_require`, `source`) VALUES(11, 'mail', '1.17.0', 'rainloop', 'Rainloop', 'no', 'yes', 'https://www.rainloop.net/');
            INSERT INTO `applications` (`id`, `category`, `version`, `name`,`qualified_name`, `installed`, `db_require`, `source`) VALUES(12, 'game', '1', 'tower_game_master', 'Tower game master', 'no', 'no', 'https://github.com/iamkun/tower_game');
            INSERT INTO `applications` (`id`, `category`, `version`, `name`,`qualified_name`, `installed`, `db_require`, `source`) VALUES(13, 'blog', '6.1.1', 'wordpress', 'Wordpress', 'no', 'yes', 'https://wordpress.org/');

            INSERT INTO `setting` (`id`, `setting_name`, `setting_set`) VALUES(1, 'interface_name', 'Zimhosting Panel');
            INSERT INTO `setting` (`id`, `setting_name`, `setting_set`) VALUES(2, 'background', 'ressources/img/background.jpg');
            INSERT INTO `setting` (`id`, `setting_name`, `setting_set`) VALUES(3, 'p_display', 'default');

            INSERT INTO `search_data` (`id`, `category`, `element`, `link`, `type`) VALUES(1, 'site', 'Site', 'index.php', 'classic');
            INSERT INTO `search_data` (`id`, `category`, `element`, `link`, `type`) VALUES(2, 'application', 'Applications', 'index.php', 'classic');
            INSERT INTO `search_data` (`id`, `category`, `element`, `link`, `type`) VALUES(3, 'user', 'Compte', 'index.php?page=account', 'classic');
            INSERT INTO `search_data` (`id`, `category`, `element`, `link`, `type`) VALUES(4, 'user', 'Modifier mon mot de passe', 'index.php?page=account&action=password_edit', 'classic');
            INSERT INTO `search_data` (`id`, `category`, `element`, `link`, `type`) VALUES(5, 'user', 'Modifier mon compte', 'index.php?page=account&action=account_edit', 'classic');
            INSERT INTO `search_data` (`id`, `category`, `element`, `link`, `type`) VALUES(6, 'admin', 'Administration', 'index.php?page=admin', 'admin');
            INSERT INTO `search_data` (`id`, `category`, `element`, `link`, `type`) VALUES(7, 'admin', 'A propos de l\'application', 'index.php?page=admin', 'admin');
            INSERT INTO `search_data` (`id`, `category`, `element`, `link`, `type`) VALUES(8, 'admin', 'Applications installées', 'index.php?page=admin&action=apps', 'admin');
            INSERT INTO `search_data` (`id`, `category`, `element`, `link`, `type`) VALUES(9, 'admin', 'Store d\'applications', 'index.php?page=admin&action=store', 'admin');
            INSERT INTO `search_data` (`id`, `category`, `element`, `link`, `type`) VALUES(10, 'admin', 'Utilisateurs', 'index.php?page=admin&action=users', 'admin');
            INSERT INTO `search_data` (`id`, `category`, `element`, `link`, `type`) VALUES(11, 'admin', 'Statistiques', 'index.php?page=admin&action=statistics', 'admin');
            INSERT INTO `search_data` (`id`, `category`, `element`, `link`, `type`) VALUES(12, 'admin', 'Apparence', 'index.php?page=admin&action=appearance', 'admin');
            INSERT INTO `search_data` (`id`, `category`, `element`, `link`, `type`) VALUES(13, 'admin', 'Interface', 'index.php?page=admin&action=interface', 'admin');

            COMMIT;
            ");

        $q->execute();


    }

    /**
        * Check if the zimhosting database exists
        *
        * @return boolean if the database exists
        */
    public function DatabaseCheck(){

        try{

            $db = new PDO("mysql:host=" . DB_HOST . ";dbname=zimhosting", USER, PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return 0;

        }catch(PDOException $e){

            return 1;

        }

    }

    /**
        * Check if tables exist inside a database
        *
        * @param Object database connection
        *
        * @return boolean if the tables exists
        */
    public function CheckTables($db){

        $q = $db->prepare("SHOW TABLES");
   	    $q->execute();
   	    $tables = $q->rowCount();

        if($tables != 0)
        {
            return 0;
        }else{
            return 1;
        }

    }

}

$Database = new Database();