<?php


class Brand extends Db_object
{
    protected static $db_table = "brands";
    protected static $db_table_fields = array('title');

    public $id;
    public $title;



}

?>