<?php
namespace app\lib;

class Cache
{

    public function __construct(){

    }

    public function setCache($key, $data, $time = 3600){
        $content['data']=$data;
        $content['end_time']=time()+$time;
        if(file_put_contents(CACHE.'/'.md5($key).'.txt', serialize($content))){
            return $content['data'];
        }
        return false;
    }

    public function getCache($key){
        $cachePath = CACHE.'/'.md5($key).'.txt';
        //debug($cachePath);
        if(file_exists($cachePath)){
            $content = unserialize(file_get_contents($cachePath));
            if(time()<=$content['end_time']){
                //debug($content);
                return $content['data'];
            }
            unlink($cachePath);
        }
        return false;
    }

    public function deleteCache($key){
        $cachePath = CACHE.'/'.md5($key).'.txt';;
        if(file_exists($cachePath)){
            unlink($cachePath);
        }
    }

}