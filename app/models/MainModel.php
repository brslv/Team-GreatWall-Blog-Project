<?php


class MainModel extends Db {
   
    /**
     *
     * @var PDO
     */
    protected $db;

    public function __construct() {
        $this->db = new Db();
    }
    
}
