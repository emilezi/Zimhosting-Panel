<?php
/**
    * Form verification class
    *
    * @author Emile Z.
    */
class Form{

    protected $post;

    public function __construct(){
        $this->post = $_POST;
    }
    
    /**
        * Verification of fields entered for the registration of a new user
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function FormRegisterCheck(){

        if(
        !empty($this->post['post_identifier'])
        &&
        !empty($this->post['post_full_name'])
        &&
        !empty($this->post['post_email'])
        &&
        !empty($this->post['post_password'])
        &&
        !empty($this->post['post_rpassword'])
        )
        {
            if(
            preg_match("#^[a-z0-9]+$#i", $this->post['post_identifier'])
            &&
            preg_match("#^[^<>]+$#i", $this->post['post_full_name'])
            &&
            preg_match("#^[a-z0-9.]+@[a-z0-9.]+$#i", $this->post['post_email'])
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
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function FormLoginCheck(){

        if(
            !empty($this->post['post_identifier'])
            &&
            !empty($this->post['post_password'])
            )
        {
            if(preg_match("#^[^<>]+$#i", $this->post['post_identifier']))
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
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function FormUserEditCheck(){

        if(!empty($this->post['post_full_name']))
        {
        if(preg_match("#^[^<>]+$#i", $this->post['post_full_name']))
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
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function FormAdminUserEditCheck(){

        if(
        !empty($this->post['post_identifier'])
        &&
        !empty($this->post['post_full_name'])
        &&
        !empty($this->post['post_email'])
        )
        {
            if(
            preg_match("#^[a-z0-9]+$#i", $this->post['post_identifier'])
            &&
            preg_match("#^[^<>]+$#i", $this->post['post_full_name'])
            &&
            preg_match("#^[a-z0-9.]+@[a-z0-9.]+$#i", $this->post['post_email'])
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
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function FormEmailCheck(){

        if(!empty($this->post['post_email']))
        {
            if(preg_match("#^[a-z0-9.]+@[a-z0-9.]+$#i", $this->post['post_email']))
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
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function FormPasswordCheck(){

        if(
            !empty($this->post['post_password'])
            &&
            !empty($this->post['post_rpassword'])
            ){

        if($this->post['post_password'] == $this->post['post_rpassword']){

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
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    public function FormInterfaceNameCheck(){

        if(!empty($this->post['post_interface_name']))
        {
            if(preg_match("#^[^<>]+$#i", $this->post['post_interface_name']))
            {
                return 0;
            }else{
            }
        }else{
            return 2;

        }

    }

}

$Form = new Form();

?>