<?php

namespace app\core;

use PDO;
use R;

class DB
{
    protected PDO $pdo;
    protected static $instance;
    protected $queryCount = 0;
    protected $queryes = [];

    protected function __construct(){
        $db = require ROOT.'app/config/db.php';
        $options = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC];
        require(ROOT.'app/lib/rb-mysql.php');
        $db = require('app/config/db.php');
        R::setup($db['dsn'],$db['name'], $db['pass'],$options);
        R::freeze(true);
        //R::fancyDebug( TRUE );
        $this->pdo = new PDO($db['dsn'],$db['name'],$db['pass'], $options);
    }

    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }


    public function execute($sql){
        $this->queryCount++;
        $this->queryes[]=$sql;
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

    public function query($sql){
        $this->queryCount++;
        $this->queryes[]=$sql;
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute();
        if($result!==false){
            return $stmt->fetchAll();
        }
        return [];
    }

}