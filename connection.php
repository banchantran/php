<?php

class DB
{
    private static $instance = null;
    public static function getinstance()
    {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host=localhost;dbname=base_php', 'root', '');
                self::$instance->exec("SET NAMES 'utf8'");
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }
        return self::$instance;
    }
}
