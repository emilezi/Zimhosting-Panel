<?php
/**
    * User management class
    *
    * @author Emile Z.
    */
class User extends Database{

    protected $user;

    public function __construct(){
        $this->user = $_POST;
    }

    /**
        * Checking the session information of the active connection
        *
        * @return int if the login information of the active user is valid, otherwise return the error
        *
        */
    public function UserSession(){

    $db = self::getDatabase();

    if
    (
        isset($_SESSION['id_user'])
        &&
        isset($_SESSION['full_name'])
        &&
        isset($_SESSION['identifier'])
        &&
        isset($_SESSION['email'])
        &&
        isset($_SESSION['type'])
    )
    {

        $q = $db->prepare("SELECT * FROM users WHERE id_user=:id_user AND type=:type");
        $q->execute([
        'id_user' => $_SESSION['id_user'],
        'type' => $_SESSION['type']
        ]);

        $user = $q->fetch();

        if($user == TRUE){

            return 0;

        }else{

            return 3;

        }
    
    
    }
    elseif
    (
    isset($_SESSION['id_user'])
    ||
    isset($_SESSION['full_name'])
    ||
    isset($_SESSION['identifier'])
    ||
    isset($_SESSION['email'])
    ||
    isset($_SESSION['type'])
    )
    {

        return 2;

    }else{

        return 1;

    }

    }

    /**
        * Checking the session information of the active connection
        *
        * @return int if the login information of the active user is valid, otherwise return the error
        *
        */
    public function UserSessionAdmin(){

        $db = self::getDatabase();

        if
        (
            isset($_SESSION['id_user'])
            &&
            isset($_SESSION['full_name'])
            &&
            isset($_SESSION['identifier'])
            &&
            isset($_SESSION['email'])
            &&
            isset($_SESSION['type'])
        )
        {
    
            $q = $db->prepare("SELECT * FROM users WHERE id_user=:id_user AND type=:type");
            $q->execute([
            'id_user' => $_SESSION['id_user'],
            'type' => 'admin'
            ]);
    
            $user = $q->fetch();
    
            if($user == TRUE){
    
                return 0;
    
            }else{
    
                return 3;
    
            }
    
    
        }
        elseif
        (
        isset($_SESSION['id_user'])
        ||
        isset($_SESSION['full_name'])
        ||
        isset($_SESSION['identifier'])
        ||
        isset($_SESSION['email'])
        ||
        isset($_SESSION['type'])
        )
        {
    
            return 2;
    
        }else{
    
            return 1;
    
        }
    
    }

    /**
        * User session creation
        *
        * @return int if the information entered is valid create the session, otherwise return the corresponding error
        *
        */
    public function UserLogin(){

        $db = self::getDatabase();

        $user = $this->getUserIdentifier();

        if($user == TRUE){

            if($user['active'] == 'yes'){

                if(password_verify($this->user['post_password'], $user['password'])){

                    $_SESSION['id_user'] = $user['id_user'];
                    $_SESSION['full_name'] = $user['full_name'];
                    $_SESSION['identifier'] = $user['identifier'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['type'] = $user['type'];
    
                    return 0;
            
                }else{
                    return 1;
                }
            
    
            }else{
    
                return 2;
    
            }

        }else{

            return 3;

        }
    
    }

    /**
        * Adding a new user
        *
        * @param string $active
        *
        * @param string $type
        *
        */
    public function UserAdd($active,$type){

        $db = self::getDatabase();

        $options = [
        'cost' => 12
        ];
                    
        $q = $db->prepare("INSERT INTO `users`(`id_user`,`identifier`,`full_name`,`email`,`password`,`active`,`user_key`,`type`) VALUES(:id_user,:identifier,:full_name,:email,:password,:active,:user_key,:type)");
        $q->execute([
            'id_user' => md5(microtime(TRUE)*100000),
            'identifier' => $this->user['post_identifier'],
            'full_name'=> $this->user['post_full_name'],
            'email' => $this->user['post_email'],
            'password' => password_hash($this->user['post_password'], PASSWORD_BCRYPT, $options),
            'active' => $active,
            'user_key' => md5(microtime(TRUE)*100000),
            'type' => $type
            ]);
            
        if(!file_exists("uploads/users/" . $this->user['post_identifier'])){
                
            mkdir("uploads/users/" . $this->user['post_identifier']);

            }

        return 0;
        
    }

    /**
        * Delete user
        *
        * @param array user information
        *
        * @return boolean if the user has not committed an accidental deletion else return the error
        *
        */
    public function UserDelete($user){

        $db = self::getDatabase();

        if($_SESSION['type'] <> 'admin')
        {

            $q = $db->prepare("DELETE FROM `users` WHERE id_user=:id_user");
            $q->execute([
            'id_user' => $user['id_user']
            ]);
        
            return 0;

        }else{

            return 1;

        }

    }

    /**
        * Delete user
        *
        * @param array user information
        *
        * @return boolean if the user has not committed an accidental deletion else return the error
        *
        */
        public function AdminUserDelete($user){

            $db = self::getDatabase();

            if($user['id_user'] != $_SESSION['id_user'])
            {
    
                $q = $db->prepare("DELETE FROM `users` WHERE id_user=:id_user");
                $q->execute([
                'id_user' => $user['id_user']
                ]);
            
                return 0;
    
            }else{
    
                return 1;
    
            }
    
        }

    /**
        * Editing user information
        *
        * @param array user information
        *
        */
    public function AdminUserEdit($user){

        $db = self::getDatabase();

        $options = [
        'cost' => 12
        ];

        $q = $db->prepare("UPDATE users SET identifier=:identifier, full_name=:full_name, email=:email WHERE id_user=:id_user");
        $q->execute([
        'id_user' => $user['id_user'],
        'identifier' => $this->user['post_identifier'],
        'full_name'=> $this->user['post_full_name'],
        'email' => $this->user['post_email']
        ]);

        return 0;

    }

    /**
        * Editing user information
        *
        * @param array user information
        *
        */
    public function UserEdit($user){

        $db = self::getDatabase();

        $options = [
        'cost' => 12
        ];

        $q = $db->prepare("UPDATE users SET full_name=:full_name WHERE id_user=:id_user");
        $q->execute([
        'id_user' => $user['id_user'],
        'full_name'=> $this->user['post_full_name']
        ]);

        return 0;

    }

    /**
        * Editing password user information
        *
        * @param array user information
        *
        */
    public function UserPasswordEdit($user){

        $db = self::getDatabase();

        $options = [
        'cost' => 12
        ];

        $q = $db->prepare("UPDATE users SET password=:password WHERE id_user=:id_user");
    	$q->execute([
        'password' => password_hash($this->user['post_password'], PASSWORD_BCRYPT, $options),
        'id_user' => $user['id_user']
		]);

    }

    /**
        * Retrieve user information
        *
        */
    public function getUserId(){

        $db = self::getDatabase();

        if(isset($_GET['id'])){

        $q = $db->prepare("SELECT * FROM users WHERE id_user=:id_user");
        $q->execute([
        'id_user' => $_GET['id']
        ]);

        }

   	    $user = $q->fetch();

        if($user == TRUE){

        return $user;

        }

    }

    /**
        * Retrieve user information
        *
        */
    public function getUserNandIdentifierEmail(){

        $db = self::getDatabase();

        if((isset($this->user['post_identifier'])) && (isset($this->user['post_email']))){

        $q = $db->prepare("SELECT * FROM users WHERE id_user<>:id_user AND identifier=:identifier OR id_user<>:id_user AND email=:email");
        $q->execute([
        'identifier' => $this->user['post_identifier'],
        'email' => $this->user['post_email'],
        'id_user' => $_GET['id']
        ]);

        }

   	    $user = $q->fetch();

        if($user == TRUE){

        return $user;

        }

    }

    /**
        * Retrieve user information
        *
        */
    public function getUserIdentifierEmail(){

        $db = self::getDatabase();

        if((isset($this->user['post_identifier'])) && (isset($this->user['post_email']))){

        $q = $db->prepare("SELECT * FROM users WHERE identifier=:identifier OR email=:email");
        $q->execute([
        'identifier' => $this->user['post_identifier'],
        'email' => $this->user['post_email']
        ]);

        }

   	    $user = $q->fetch();

        if($user == TRUE){

        return $user;

        }

    }

    /**
        * Retrieve user information
        *
        */
    public function getUserIdentifier(){

        $db = self::getDatabase();

        if(isset($this->user['post_identifier'])){

        $q = $db->prepare("SELECT * FROM users WHERE identifier=:identifier OR email=:email");
        $q->execute([
        'identifier' => $this->user['post_identifier'],
        'email' => $this->user['post_identifier']
        ]);

        }

   	    $user = $q->fetch();

        if($user == TRUE){

        return $user;

        }

    }

    /**
        * Retrieve user information
        *
        */
    public function getUserEmail(){

        $db = self::getDatabase();

        if(isset($this->user['post_email'])){

        $q = $db->prepare("SELECT * FROM users WHERE email=:email");
        $q->execute([
        'email' => $this->user['post_email']
        ]);

        }

   	    $user = $q->fetch();

        if($user == TRUE){

        return $user;

        }

    }

    /**
        * Retrieve user information
        *
        */
    public function getUserRecovery(){

        $db = self::getDatabase();

        if((isset($_GET['get1'])) && (isset($_GET['get2']))){

        $q = $db->prepare("SELECT * FROM users WHERE user_key=:user_key AND recovery_date=:recovery_date AND recovery_key=:recovery_key");
        $q->execute([
        'user_key' => $_GET['get1'],
        'recovery_date' => date('d-m-Y'),
        'recovery_key' => $_GET['get2']
        ]);
    
        }

   	    $user = $q->fetch();

        if($user == TRUE){

        return $user;

        }

    }



    /**
        * Edit user account recovery information
        *
        * @param array user information
        *
        */
    public function UserRecoveryKey($user){

        $db = self::getDatabase();

        $q1 = $db->prepare("UPDATE users SET recovery_key=:recovery_key WHERE id_user=:id_user");
    	$q1->execute([
        'recovery_key' => md5(microtime(TRUE)*100000),
        'id_user' => $user['id_user']
        ]);

        $q2 = $db->prepare("UPDATE users SET recovery_date=:recovery_date WHERE id_user=:id_user");
    	$q2->execute([
        'recovery_date' => date('d-m-Y'),
        'id_user' => $user['id_user']
        ]);

    }
        

}

$User = new User();



?>