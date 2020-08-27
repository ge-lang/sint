<?php

class User extends Db_object
{

    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'email', 'password', 'first_name', 'last_name','user_image','role');

    public $id;
    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $role;
    public $user_image;
    public $upload_directory = 'img'.DS.'users';
    public $image_placeholder = 'http://place-hold.it/400x400&text=image';



    public static function verify_user($username, $password){
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";
        $the_result_array = self::find_this_query($sql);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
    public static function find_all_users(){
        return static::find_this_query("SELECT * FROM " . static::$db_table . " ORDER BY id DESC");
    }

    public function image_path_and_placeholder(){
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;
    }


    public function delete_user(){
        if($this->delete()){
            $target_path = SITE_ROOT.DS.'admin'.DS.$this->image_path_and_placeholder();
            return unlink($target_path) ? true : false;
        }else{
            return false;
        }
    }

    public function set_file($file){
        if(empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "No file uploaded";
            return false;
        }
        elseif($file['error'] != 0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        }else{
            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size=$file['size'];
        }
    }

    public function save_user_and_image(){
        $target_path = SITE_ROOT . DS . "admin" . DS . $this->upload_directory . DS . $this->user_image;
        if($this->id){
            move_uploaded_file($this->tmp_path, $target_path);
            $this->update();
            unset($this->tmp_path);
            return true;
        }else{
            if(!empty($this->errors)){
                return false;
            }
            if(empty($this->user_image) || empty($this->tmp_path)){
                $this->errors[]= "File not available";
                return false;
            }

            if (file_exists($target_path)){
                $this->errors[] = "File {$this->user_image} exists!";
                return false;
            }
            if(move_uploaded_file($this->tmp_path, $target_path)){
                if($this->create()){
                    unset($this->tmp_path);
                    return true;
                }
            }
            else{
                $this->errors[]= "This folder has no write rights!";
                return false;
            }
        }
    }


}