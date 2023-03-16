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
        * Directory delete
        *
        * @param string directory link
        */
    public function DirectoryDelete($dir){

        $handle = opendir($dir);
        while($elem = readdir($handle))
        {
            if(is_dir($dir.'/'.$elem) && substr($elem, -2, 2) !== '..' && substr(
            $elem, -1, 1) !== '.')
            {
                $this->DirectoryDelete($dir.'/'.$elem);
            }
            else
            {
                if(substr($elem, -2, 2) !== '..' && substr($elem, -1, 1) !== '.')
                {
                    unlink($dir.'/'.$elem);
                }
            }
        }
        
        $handle = opendir($dir);
        while($elem = readdir($handle))
        {
            if(is_dir($dir.'/'.$elem) && substr($elem, -2, 2) !== '..' && substr(
            $elem, -1, 1) !== '.')
            {
                $this->DirectoryDelete($dir.'/'.$elem);
                rmdir($dir.'/'.$elem);
            }    
        
        }
        rmdir($dir);
        
    }
    
    /**
        * Check background image select a valid format import
        *
        * @param array file information
        *
        * @return int if file can be imported else return error
        */
    public function CheckBackground($files){

        if(!empty($files['background']['name']))
            {

            if(isset($files["background"]) && $files["background"]["error"] == 0){
                $extensions_list = array('.jpg');
                $extension = strrchr($files['background']['name'], '.');

                    if($files['background']['size'] < 2500000){

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

        if(file_exists('uploads/background.jpg')){
            
            unlink('uploads/background.jpg');
        
            move_uploaded_file($files["background"]["tmp_name"], 'uploads/background.jpg');

        }else{

            move_uploaded_file($files["background"]["tmp_name"], 'uploads/background.jpg');

        }
    
    }

    /**
        * Background removal
        */
    public function DeleteBackground(){

        if(file_exists('uploads/background.jpg')){
            unlink('uploads/background.jpg');
        }
    
    }

}

$File = new File();