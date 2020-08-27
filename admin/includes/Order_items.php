<?php


class Order_items extends Db_object
{

    protected static $db_table = "order_items";
    protected static $db_table_fields = array('order_id', 'product_id', 'quantity');

    public $id;
    public $order_id;
    public $product_id;
    public $quantity;

}