<?php

namespace UserVacation\DB;


use UserVacation\Entity\Entity;

abstract class Repository
{
    /**
     * @var null|\PDO
     */
    protected $db;

    /**
     * @var string
     */
    private $tableName;

    public function __construct()
    {
        $this->db = DB::get();
        $this->tableName = static::CONFIG_TABLE_NAME;
    }

    /**
     * @return Repository
     */
    public static function create(): Repository
    {
        return new static();
    }

    /**
     * @param array $row
     * @return mixed
     */
    abstract public static function formatRow(array $row);

    /**
     * @param string $field
     * @param $val
     * @return array
     */
    public function find(string $field, $val): array
    {
        $sql = 'SELECT * FROM ' . $this->tableName . ' WHERE ' . $field . ' = :val';
        $stmt = $this->db->prepare($sql);

        $stmt->execute(['val' => $val]);

        $rows = [];

        foreach ($stmt as $row) {
            $rows[] = static::formatRow($row);
        }

        return $rows;
    }

    /**
     * @param Entity $entity
     * @return bool
     */
    public function save(Entity $entity): bool
    {
        if ($entity->getId()) {
            return $this->updateById($entity);
        } else {
            return $this->insertEntity($entity);
        }
    }

    /**
     * @param Entity $entity
     * @return bool
     */
    abstract protected function updateById(Entity $entity): bool;

    /**
     * @param Entity $entity
     * @return bool
     */
    abstract protected function insertEntity(Entity $entity): bool;

    /**
     * @param string $sql
     * @param Entity $entity
     * @return \PDOStatement
     */
    abstract protected function getStmt(string $sql, Entity $entity): \PDOStatement;

    /**
     * @param Entity $entity
     * @return bool
     */
    public function delete(Entity $entity): bool
    {
        $sql = "DELETE FROM " . $this->tableName . " WHERE id =  :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $entity->getId(), PDO::PARAM_INT);

        return $stmt->execute();
    }
}