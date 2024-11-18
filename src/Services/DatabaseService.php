<?php

class DatabaseService {
    // You can call a static method without instantiating an object
    // Static methods cannot use $this
    public static function connect(): PDO {
        $db = new PDO('mysql:host=db; dbname=businesses', 'root', 'password');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    }
}