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
    public $tmp_path;
    public $type;
    public $size;
    public $errors = array();
    public $upload_errors_array = array(
        UPLOAD_ERR_OK => 'There is no error',
        UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the server limit',
        UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the form limit',
        UPLOAD_ERR_NO_FILE => 'No file uploaded',
        UPLOAD_ERR_PARTIAL => 'The file was partially uploaded',
        UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder',
        UPLOAD_ERR_CANT_WRITE => 'Failed to write to disk',
        UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the upload'
    );



    public static function verify_user($username, $password){
        global $database;
        $stmt = $database->connection->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        if (!$row) {
            return false;
        }

        $valid = password_verify($password, $row['password']);
        if (!$valid && hash_equals((string) $row['password'], (string) $password)) {
            $valid = true;
            $new_hash = password_hash($password, PASSWORD_DEFAULT);
            $upgrade = $database->connection->prepare("UPDATE users SET password = ? WHERE id = ?");
            $upgrade->bind_param('si', $new_hash, $row['id']);
            $upgrade->execute();
            $upgrade->close();
        }

        return $valid ? self::instantie($row) : false;
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
            $upload_error = validate_image_upload($file);
            if ($upload_error) {
                $this->errors[] = $upload_error;
                return false;
            }
            $this->user_image = preg_replace('/[^A-Za-z0-9._-]/', '_', basename($file['name']));
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
