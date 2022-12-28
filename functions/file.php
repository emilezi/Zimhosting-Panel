<?php
/**
    * File management class.
    *
    * @author Emile ZIMMER
    */
class File{

    /**
        * Checks if a location is writable
        *
        * @return boolean if a location is writable
        */
    public function CheckWriteability(){
        if(file_put_contents("test.txt",'test') == TRUE){

            unlink('test.txt');

            return 0;

        }else{

            return 1;

        }
    }
    
    /**
        * Check background image select a valid format import
        *
        * @param array file information
        *
        * @return int if file can be imported else return error
        */
    public function CheckBackground($files){

        if(isset($files["background"]) && $files["background"]["error"] == 0){
            $extensions_list = array('.png');
            $extension = strrchr($files['background']['name'], '.');

            if(!empty($files['background']['name']))
            {

                if($files['background']['size'] < 10485760){

                    if(in_array($extension, $extensions_list)){
    
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

            }else{

                return 4;

            }
    
    }

    /**
        * Background import
        *
        * @param array file information
        */
    public function ImportBackground($files){

        if(file_exists('uploads/background.png')){
            
            unlink('uploads/background.png');
        
            move_uploaded_file($files["background"]["tmp_name"], 'uploads/background.png');

        }else{

            move_uploaded_file($files["background"]["tmp_name"], 'uploads/background.png');

        }
    
    }

    /**
        * Background removal
        */
    public function DeleteBackground(){

        if(file_exists('uploads/background.png')){
            unlink('uploads/background.png');
        }
    
    }

}

$File = new File();