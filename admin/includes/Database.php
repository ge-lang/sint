<?php


require_once("config.php");

class Database
{
    /***VARIABELEN***/
    public $connection; /**object variabele**/

    /**CONSTRUCTOR**/
    /** dit wordt ALTIJD automatisch uitgevoerd bij het aanroepen van deze classe**/
    function __construct(){
        $this->open_db_connection();
    }

    /**METHODES**/
    public function open_db_connection(){
        $this->connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);
        if(mysqli_connect_errno()){
            die("Database connection is mislukt" . mysqli_error());
        }
    }

    /**1**/
    public function query($sql){
        $result = $this->connection->query($sql);
        $this->confirm_query($result);
        return $result;
    }

    /** 2 $result voert de query op de database uit**/
    private function confirm_query($result){
        if(!$result){
            die("database query kon niet worden uitgevoerd" . $this->connection->error);
        }}

     /** 3 BEVEILIGING/SECURITY -> sql injecties vermijden**/
     public function escape_string($string){
         $escaped_string = $this->connection->real_escape_string($string);
         return $escaped_string;
        }

    /***mysqli_insert_id**/
    /** haalt de laatste uitgevoerd id op van een tabel die een primary key met
    autoincrement heeft!*/
    public function the_insert_id(){
        return mysqli_insert_id($this->connection);
    }



}
$database = new Database();