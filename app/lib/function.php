<?php

function redirect($http = false){
    if($http){
        $redirect = $http;
    }else{
        $redirect = $_SERVER['HTTP_REFERER'] ?? '/';
    }
    header("Location: ".$redirect);
    exit();
}

function codeHTML($str){
    return htmlspecialchars($str, ENT_QUOTES);
}