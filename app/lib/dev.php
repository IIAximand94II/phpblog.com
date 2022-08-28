<?php

/**
 * debug function
*/
function debug($debugStr){
    echo "<pre>";
    print_r($debugStr);
    echo "</pre>";
    exit();
}