<?php


class Teamlead extends Db_object
{
    protected static $db_table = "teamleaders";
    protected static $db_table_fields = array('id', 'naam','achternaam', 'positie', 'foto','type', 'size');

    public $id;
    public $naam;
    public $achternaam;
    public $positie;
    public $foto;
    public $type;
    public $size;

    public $tmp_path;
    public $upload_directory = 'img'.DS.'teamleaders';
    public $errors = array();
    public $upload_errors_array = array(
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload max_filesize from php.ini",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds MAX_FILE_SIZE in php.ini for html form",
        UPLOAD_ERR_NO_FILE => "No file uploaded",
        UPLOAD_ERR_PARTIAL => "The file was partially uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write to disk",
        UPLOAD_ERR_EXTENSION => "A php extension stopped your upload"
    );

    public function set_team_file($file)
    {
        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = 'No file uploaded!';
            return false;
        } elseif ($file['error'] != 0) {
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else {
            $this->foto = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
        }
    }

    public function save_team()
    {
        if ($this->id) {
            $this->update();
        } else {
            if (!empty($this->errors)) {
                return false;
            }
            if (empty($this->foto) || empty($this->tmp_path)) {
                $this->errors[] = "File not available";
                return false;
            }

            $target_path = SITE_ROOT . DS . "admin" . DS . $this->upload_directory . DS . $this->foto;

            if (file_exists($target_path)) {
                $this->errors[] = "File {$this->foto} exists!";
                return false;
            }
            if (move_uploaded_file($this->tmp_path, $target_path)) {
                if ($this->create()) {
                    unset($this->tmp_path);
                    return true;
                }
            } else {
                $this->errors[] = "This folder has no write rights!";
                return false;
            }
        }
    }

    public function picture_path()
    {
        return $this->upload_directory . DS . $this->foto;
    }

    public function delete_foto()
    {
        if ($this->delete()) {
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->picture_path();
            return unlink($target_path) ? true : false;
        }
    }


}











