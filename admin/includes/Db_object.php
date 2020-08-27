<?php


class Db_object
{

    public static function find_this_query($sql){
        global $database;
        $result = $database->query($sql);
        $the_object_array = array();//declartie van een lege array
        while($row = mysqli_fetch_array($result)){
            $the_object_array[] = static::instantie($row);
        }
        return $the_object_array;
    }

    public static function find_all(){
        return static::find_this_query("SELECT * FROM " . static::$db_table . " ORDER BY id ASC");
    }


    public static function find_by_id($id){
        /*global $database;*/
        $the_result_array = static::find_this_query("SELECT * FROM " . static::$db_table . " WHERE id=$id LIMIT 1");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    /** OPLOSSING: STATIC LATE BINDING**/
    public static function instantie($found_user){
        $calling_class = get_called_class(); //late static binding

        $the_object = new $calling_class;
        foreach($found_user as $the_attribute => $value){
            if($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute = $value;
            }
        }

        return $the_object;
    }

    private function has_the_attribute($the_attribute){
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }

    public function create(){
        global $database;
        $properties = $this->clean_properties();

        $sql = "INSERT INTO " . static::$db_table . " (" . implode(",",array_keys($properties)) . ") ";
        $sql .= "VALUES ('" . implode("','",array_values($properties)) . "')";


        if($database->query($sql)){
            $this->id = $database->the_insert_id();
            return true;
        }else{
            return false;
        }

        $database->query($sql);

    }

    public function update(){
        global $database;
        $properties = $this->clean_properties();
        $properties_assoc = array();

        foreach($properties as $key => $value){
            $properties_assoc[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode(", ", $properties_assoc);
        $sql .= " WHERE id = " .$database->escape_string($this->id);

        $database->query($sql);
        return (mysqli_affected_rows($database->connection)== 1) ? true : false;
    }

    public function delete(){
        global $database;

        $sql = "DELETE FROM " . static::$db_table . " ";
        $sql .= "WHERE id= " . $database->escape_string($this->id);
        $sql .= " LIMIT 1";

        $database->query($sql);
        return (mysqli_affected_rows($database->connection)== 1) ? true : false;
    }

    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function properties(){
        $properties = array();
        foreach(static::$db_table_fields as $db_field){
            if(property_exists($this, $db_field)){
                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;


    }

    public function clean_properties(){
        global $database;
        $clean_properties = array();

        foreach($this->properties() as $key => $value){
            $clean_properties[$key] = $database->escape_string($value);
        }
        return $clean_properties;
    }

    public static function count_all(){
        global $database;
        $sql = "SELECT COUNT(*) FROM " . static::$db_table;
        $result = $database->query($sql);
        $row = mysqli_fetch_array($result);

        return array_shift($row);
    }
}