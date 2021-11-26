<?php

namespace Services;

use PDO;

class Db 
{
    private $db;
    private static $instancesCount = 0;
    private static $instance;
    private function __construct()
    {
        $dbOptions = (require __DIR__ . '../../src/settings.php')['db'];
        $this->db = new PDO('mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'], $dbOptions['user'], $dbOptions['password'] );
        $this->db->exec('SET NAMES UTF8');
        self::$instancesCount++;
    }

    public function query(string $sql, $params= [], string $className = 'stdClass'): ?array
    {
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute($params);

        if($result === false)
        {
            return Null;
        }

        return $stmt->fetchAll(PDO::FETCH_CLASS, $className);
    }
    public static function getInstance() :self
    {
        if(self::$instance === null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function getInstancesCount(): int
    {
        return self::$instancesCount;
    }
}