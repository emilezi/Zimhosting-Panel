<?php
/**
    * Form verification class
    *
    * @author Emile ZIMMER
    */
class Form{
    
    /**
        * Verification of fields entered for the registration of a new user
        *
        * @param array form post register information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function FormRegisterCheck($post){

        if(
        !empty($post['post_identifier'])
        &&
        !empty($post['post_full_name'])
        &&
        !empty($post['post_email'])
        &&
        !empty($post['post_password'])
        &&
        !empty($post['post_rpassword'])
        )
        {
            if(
            preg_match("#^[a-z0-9]+$#i", $post['post_identifier'])
            &&
            preg_match("#^[^<>]+$#i", $post['post_full_name'])
            &&
            preg_match("#^[a-z0-9.]+@[a-z0-9.]+$#i", $post['post_email'])
            )
            {
                return 0;
            }else{
                return 1;
            }
        }else{
            return 2;

        }

    }

    /**
        * Verification of fields entered for the login of user
        *
        * @param array form post login information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function FormLoginCheck($post){

        if(
            !empty($post['post_identifier'])
            &&
            !empty($post['post_password'])
            )
        {
            if(preg_match("#^[^<>]+$#i", $post['post_identifier']))
            {
                return 0;
            }else{
                return 1;
            }
        }else{
            return 2;
        }


    }

    /**
        * Verification of fields entered for the edit of user
        *
        * @param array form post edit user information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function FormUserEditCheck($post){

        if(!empty($post['post_full_name']))
        {
        if(preg_match("#^[^<>]+$#i", $post['post_full_name']))
            {
                return 0;
            }else{
                return 1;
            }
        }else{
            return 2;

        }

    }

    /**
        * Verification of fields entered for the edit of user
        *
        * @param array form post edit user information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function FormAdminUserEditCheck($post){

        if(
        !empty($post['post_identifier'])
        &&
        !empty($post['post_full_name'])
        &&
        !empty($post['post_email'])
        )
        {
            if(
            preg_match("#^[a-z0-9]+$#i", $post['post_identifier'])
            &&
            preg_match("#^[^<>]+$#i", $post['post_full_name'])
            &&
            preg_match("#^[a-z0-9.]+@[a-z0-9.]+$#i", $post['post_email'])
            )
            {
                return 0;
            }else{
                return 1;
            }
        }else{
            return 2;

        }

    }

    /**
        * Verification of fields entered for the email address
        *
        * @param array form post email information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function FormEmailCheck($post){

        if(!empty($post['post_email']))
        {
            if(preg_match("#^[a-z0-9.]+@[a-z0-9.]+$#i", $post['post_email']))
            {
                return 0;
            }else{
                return 1;
            }
        }else{
            return 2;

        }

    }

    /**
        * Verification of fields entered for password verification
        *
        * @param array form post password information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function FormPasswordCheck($post){

        if(
            !empty($post['post_password'])
            &&
            !empty($post['post_rpassword'])
            ){

        if($post['post_password'] == $post['post_rpassword']){

            return 0;

        }else{

            return 1;

        }

    }else{

        return 2;

    }
    
    }

    /**
        * Verification of fields entered for the interface name
        *
        * @param array form post interface name information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function FormInterfaceNameCheck($post){

        if(!empty($post['post_interface_name']))
        {
            if(preg_match("#^[^<>]+$#i", $post['post_interface_name']))
            {
                return 0;
            }else{
                return 1;
            }
        }else{
            return 2;

        }

    }

}

$Form = new Form();

?>