<?php

namespace UserVacation\DB;


use UserVacation\Entity\{
    Entity,
    User
};


class UserRepository extends Repository
{
    const CONFIG_TABLE_NAME = 'user';

    /**
     * @param array $row
     *
     * @return mixed
     */
    public static function formatRow(array $row)
    {
        return new User(
            $row['id'],
            $row['email'],
            $row['first_name'],
            $row['second_name']
        );
    }

    /**
     * @param Entity $entity
     * @return bool
     */
    protected function updateById(Entity $entity): bool
    {
        $sql = "UPDATE " . self::CONFIG_TABLE_NAME . " SET email = :email, 
            first_name = :first_name, 
            second_name = :second_name
            WHERE id = :id";

        return $this->getStmt($sql, $entity)->execute();
    }

    /**
     * @param Entity $entity
     * @return bool
     */
    protected function insertEntity(Entity $entity): bool
    {
        $sql = "INSERT INTO " . self::CONFIG_TABLE_NAME . "(email,
            first_name,
            second_name) VALUES (
            :email, 
            :first_name, 
            :second_name)";

        return $this->getStmt($sql, $entity)->execute();
    }

    /**
     * @param string $sql
     * @param Entity $entity
     * @return \PDOStatement
     */
    protected function getStmt(string $sql, Entity $entity): \PDOStatement
    {
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':email', $entity->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':first_name', $entity->getFirstName(), PDO::PARAM_STR);
        $stmt->bindParam(':second_name', $entity->getSecondName(), PDO::PARAM_STR);
        $stmt->bindParam(':id', $entity->getId(), PDO::PARAM_INT);
    }
}