<?php

class Order extends Db_object
{

    protected static $db_table = "orders";
    protected static $db_table_fields = array('user_id','payment_id','payer_id', 'payment_total', 'created_at');

    public $id;
    public $user_id;
    public $payment_id;
    public $payer_id;
    public $payment_total;
    public $created_at;








}