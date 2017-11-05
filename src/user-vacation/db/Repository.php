<?php

namespace UserVacation\DB;


abstract class Repository
{
    /**
     * @var null|\PDO
     */
    private $db;

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
}