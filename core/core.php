<?php

//Autoloading classes
function __autoload($className) {
    $filename = strtolower($className) . '.php';
    $expArr = explode('_', $className);
    if (empty($expArr[1]) OR $expArr[1] == 'Base') {
        $folder = 'classes';
    } else {
        switch (strtolower($expArr[0])) {
            case 'controller':
                $folder = 'controllers';
                break;
            case 'model':
                $folder = 'models';
                break;
            default:
                $folder = 'classes';
                break;
        }
    }
    $file = SITE_PATH . $folder . DS . $filename; //The path to class
    if (file_exists($file) == false) { //Checking availability a file
        return false;
    }
    include ($file); //include class file
}
