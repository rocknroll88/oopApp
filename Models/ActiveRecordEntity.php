<?php
namespace Models;
use Services\Db;
abstract class ActiveRecordEntity 
{
    public $id;

    public function getId() :int
    {
        return $this->id;
    }
    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
       $this->$camelCaseName = $value;
    }

    public static function findAll() // Найди все записи
    {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM ' . static::getTableName() . ';', [], static::class);
    }
    /** 
     * @param string $source source name from DB
     * @todo ПОменять функуцию на новую 
    */
    public function underscoreToCamelCase(string $source) :string //Преобразуй имя из базы в кэмелкейс
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    abstract protected static function getTableName(): string; 

    public static function getById(int $id)
    {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM ' . static::getTableName() . ' WHERE id=:id;', 
        [':id' => $id],
        static::class
        );
        return $entities ? $entities[0] : null;
    }

}