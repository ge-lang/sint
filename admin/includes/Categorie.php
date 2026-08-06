<?php


class Categorie extends Db_object
{
    protected static $db_table = "categories";
    protected static $db_table_fields = array('id', 'title','sort_order', 'status', 'foto','type', 'size');

    public $id;
    public $title;
    public $sort_order;
    public $status;
    public $foto;
    public $type;
    public $size;

    public $tmp_path;
    public $previous_foto;
    public $upload_directory = 'img'.DS.'categories';
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

    public function set_categorie_file($file)
    {
        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = 'No file uploaded!';
            return false;
        } elseif ($file['error'] != 0) {
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else {
            $upload_error = validate_image_upload($file);
            if ($upload_error) {
                $this->errors[] = $upload_error;
                return false;
            }
            $this->previous_foto = $this->foto;
            $this->foto = preg_replace('/[^A-Za-z0-9._-]/', '_', basename($file['name']));
            $this->tmp_path = $file['tmp_name'];
        }
    }

    public function save_categorie()
    {
        if ($this->id) {
            if (!empty($this->errors)) {
                return false;
            }
            if (!empty($this->tmp_path)) {
                $target_path = SITE_ROOT . DS . "admin" . DS . $this->upload_directory . DS . $this->foto;
                if (!move_uploaded_file($this->tmp_path, $target_path)) {
                    $this->errors[] = "This folder has no write rights!";
                    return false;
                }
                $old_path = SITE_ROOT . DS . "admin" . DS . $this->upload_directory . DS . $this->previous_foto;
                $updated = $this->update();
                if ($updated && $this->previous_foto && $this->previous_foto !== $this->foto && is_file($old_path)) {
                    unlink($old_path);
                }
                return $updated;
            }
            return $this->update();
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











