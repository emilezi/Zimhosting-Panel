<?php
/**
    * User management class
    *
    * @author Emile ZIMMER
    */
class User{

    /**
        * Checking the session information of the active connection
        *
        * @param Object database connection
        *
        * @return int if the login information of the active user is valid, otherwise return the error
        *
        */
    public function UserSession($db){

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
        * @param Object database connection
        *
        * @return int if the login information of the active user is valid, otherwise return the error
        *
        */
    public function UserSessionAdmin($db){

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
        * @param Object database connection
        *
        * @param array form login
        *
        * @return int if the information entered is valid create the session, otherwise return the corresponding error
        *
        */
    public function UserLogin($db,$post){

        $user = $this->getUser($db,$post);

        if($user == TRUE){

            if($user['active'] == 'yes'){

                if(password_verify($post['post_password'], $user['password'])){

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
        * @param Object database connection
        *
        * @param array form register
        *
        * @param string $active
        *
        * @param string $type
        *
        */
    public function UserAdd($db,$post,$active,$type){

        $options = [
        'cost' => 12
        ];
                    
        $q = $db->prepare("INSERT INTO `users`(`id_user`,`identifier`,`full_name`,`email`,`password`,`active`,`user_key`,`type`) VALUES(:id_user,:identifier,:full_name,:email,:password,:active,:user_key,:type)");
        $q->execute([
            'id_user' => md5(microtime(TRUE)*100000),
            'identifier' => $post['post_identifier'],
            'full_name'=> $post['post_full_name'],
            'email' => $post['post_email'],
            'password' => password_hash($post['post_password'], PASSWORD_BCRYPT, $options),
            'active' => $active,
            'user_key' => md5(microtime(TRUE)*100000),
            'type' => $type
            ]);
            
        if(!file_exists("uploads/users/" . $post['post_identifier'])){
                
            mkdir("uploads/users/" . $post['post_identifier']);

            }

            return 0;
        
    }

    /**
        * Delete user
        *
        * @param Object database connection
        *
        * @param array user information
        *
        * @return boolean if the user has not committed an accidental deletion else return the error
        *
        */
    public function UserDelete($db,$user){

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
        * @param Object database connection
        *
        * @param array user information
        *
        * @param array post user information
        *
        */
    public function AdminUserEdit($db,$user,$post){

        $options = [
        'cost' => 12
        ];

        $q = $db->prepare("UPDATE users SET identifier=:identifier, full_name=:full_name, email=:email WHERE id_user=:id_user");
        $q->execute([
        'id_user' => $user['id_user'],
        'identifier' => $post['post_identifier'],
        'full_name'=> $post['post_full_name'],
        'email' => $post['post_email']
        ]);

        return 0;

    }

    /**
        * Editing user information
        *
        * @param Object database connection
        *
        * @param array user information
        *
        * @param array post user information
        *
        */
    public function UserEdit($db,$user,$post){

        $options = [
        'cost' => 12
        ];

        $q = $db->prepare("UPDATE users SET full_name=:full_name WHERE id_user=:id_user");
        $q->execute([
        'id_user' => $user['id_user'],
        'full_name'=> $post['post_full_name']
        ]);

        return 0;

    }

    /**
        * Editing password user information
        *
        * @param Object database connection
        *
        * @param array user information
        *
        * @param array post password user information
        *
        */
    public function UserPasswordEdit($db,$user,$post){

        $options = [
        'cost' => 12
        ];

        $q = $db->prepare("UPDATE users SET password=:password WHERE id_user=:id_user");
    	$q->execute([
        'password' => password_hash($post['post_password'], PASSWORD_BCRYPT, $options),
        'id_user' => $user['id_user']
		]);

    }

    /**
        * Retrieve user information
        *
        * @param Object database connection
        *
        * @param array post user information
        *
        */
    public function getUser($db,$post){

        if(isset($post['id'])){

        $q = $db->prepare("SELECT * FROM users WHERE id_user=:id_user");
        $q->execute([
        'id_user' => $post['id']
        ]);

        }elseif((isset($post['get1'])) && (isset($post['get2']))){

        $q = $db->prepare("SELECT * FROM users WHERE user_key=:user_key AND recovery_date=:recovery_date AND recovery_key=:recovery_key");
        $q->execute([
        'user_key' => $post['get1'],
        'recovery_date' => date('d-m-Y'),
        'recovery_key' => $post['get2']
        ]);
    
        }elseif((isset($post['post_identifier'])) && (isset($post['post_email']))){

        $q = $db->prepare("SELECT * FROM users WHERE identifier=:identifier OR email=:email");
        $q->execute([
        'identifier' => $post['post_identifier'],
        'email' => $post['post_email']
        ]);

        }elseif(isset($post['post_identifier'])){

        $q = $db->prepare("SELECT * FROM users WHERE identifier=:identifier OR email=:email");
        $q->execute([
        'identifier' => $post['post_identifier'],
        'email' => $post['post_identifier']
        ]);

        }elseif(isset($post['post_email'])){

        $q = $db->prepare("SELECT * FROM users WHERE email=:email");
        $q->execute([
        'email' => $post['post_email']
        ]);

        }elseif(isset($_SESSION['id_user'])){

        $q = $db->prepare("SELECT * FROM users WHERE full_name=:full_name");
        $q->execute([
        'full_name' => $post['post_full_name']
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
        * @param Object database connection
        *
        * @param array user information
        *
        */
    public function UserRecoveryKey($db,$user){

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