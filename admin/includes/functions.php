<?php


function classAutoLoader($class){
    $class = strtolower($class);
    $the_path = "includes/{$class}.php";

    if(is_file($the_path)){
        if(file_exists($the_path) && !class_exists($class)){
            include($the_path);
        }
        else{
            die("This file name {$class}.php was not found");
        }
    }


}
spl_autoload_register('classAutoLoader');

function redirect($location){
    header("Location:{$location}");
    exit;
}

function require_admin(){
    if (empty($_SESSION['user_id']) || (int) ($_SESSION['role'] ?? 0) !== 1) {
        redirect('../login.php');
    }
}

function validate_image_upload($file){
    if (!is_array($file) || ($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        return 'No valid file uploaded.';
    }
    if (($file['size'] ?? 0) > 5 * 1024 * 1024) {
        return 'Image must be smaller than 5 MB.';
    }
    $mime = (new finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']);
    $allowed = array('image/jpeg', 'image/png', 'image/gif', 'image/webp');
    if (!in_array($mime, $allowed, true) || @getimagesize($file['tmp_name']) === false) {
        return 'Only valid JPG, PNG, GIF or WEBP images are allowed.';
    }
    return null;
}


?>
