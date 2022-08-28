<?php

namespace app\lib;

use app\core\traits\validation;

class File
{
    use validation;

    //
    public function createDir(){
        mkdir('');
    }

    public function deleteDir(){
        unlink('');
    }

    //upload image
    public function upload($image_name, $tmp, $dir){
        $name = time().'_'.$image_name;
        $image_name = basename($name);
        $res = $this->isImage($tmp);
        if($res!=true){
            return false;
        }else{
            $image_path = FILES.$dir.$image_name;
            if(!file_exists($image_path)){
                if(move_uploaded_file($tmp, $image_path)){
                    return $image_path;
                }else{
                    return false;
                }
            }
        }
    }

    //delete image
    public function delete($name,$dir){
        $path = FILES.$dir.$name;
        if(file_exists($path) && $name!='' && $name!='default.jpg'){
            if(unlink($path)){
                return true;
            }
        }
    }
}