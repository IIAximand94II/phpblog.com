<?php


namespace app\core\traits;


trait validation
{



    public function check_len( $min, $max, $value = ""){
        if(mb_strlen($value) >= $min || mb_strlen($value) <= $max){
            return true;
        } else{
            return false;
        }
    }

    // image upload(avatar)
    /*
    public function addImage($image, $tmp){
        $res = $this->isImage($tmp);
        if(!$res){
            return '';
        }else{
            $file_name = time().'_'.$image;
            $file_path = USER_AVATAR.$file_name;
            move_uploaded_file($tmp, $file_path);
            return $file_path;
        }
    }
    */

    public function isImage($tmp){
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $detectedType = exif_imagetype($tmp);
        if(!$file_type_result = in_array($detectedType, $allowedTypes)){
            return false;
        }else{
            return true;
        }
    }


}