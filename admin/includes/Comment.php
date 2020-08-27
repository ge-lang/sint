<?php


class Comment extends Db_object
{
    protected static $db_table = "comment";
    protected static $db_table_fields = array('product_id', 'author', 'body');
    public $id;
    public $product_id;
    public $author;
    public $body;


    public static function create_comment($product_id, $author = 'Test', $body = ''){
        if(!empty($product_id) && !empty($author) && !empty($body)){
            $comment = new Comment();
            $comment->product_id = (int)$product_id;
            $comment->author = $author;
            $comment->body = $body;

            return$comment;
        }else{
            return false;
        }

    }

    public static function find_the_comment($product_id){
        global $database;
        $sql = "SELECT * FROM " . self::$db_table;
        $sql .= " WHERE product_id = " . $database->escape_string($product_id);
        $sql .= " ORDER BY product_id ASC";

        return self::find_this_query($sql);
    }

    public static function find_by_id($id){
        /*global $database;*/
        $the_result_array = static::find_this_query("SELECT * FROM " . static::$db_table . " WHERE id=$id LIMIT 1");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }
}

?>