<?php

class Database
{
    public $db;

    public function __construct()
    {
        try {
            $this->db = new PDO(
                'mysql:host=localhost;dbname=EisenDo',
                'admin',
                'welcome'

            );
        }

        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}