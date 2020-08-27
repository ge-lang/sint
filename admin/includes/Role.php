<?php


class Role extends Db_object
{
    /*general variabelen*/
    protected static $db_table = "roles";
    protected static $db_table_fields = array('role');
    /**object variabelen**/
    public $id;
    public $role;

    /*constructor*/

    /*methodes**/
    public static function find_all_roles(){
        return static::find_this_query("SELECT * FROM " . static::$db_table . " ORDER BY role asc");
    }



}
