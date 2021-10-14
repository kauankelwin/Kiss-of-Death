<?php
/**
 * Created by PhpStorm.
 * User: anderson
 * Date: 18/12/18
 * Time: 15:07
 */
//namespace Classes;
class Sql
{
    protected $conn;

    public function __construct()
    {
       
        $this->conn = new \PDO("mysql:host=localhost;dbname=systemofdeath", "root", "");
    }
}