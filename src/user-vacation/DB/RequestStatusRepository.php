<?php

namespace UserVacation\DB;


use UserVacation\Entity\{
    Entity,
    VacationRequestStatus
};


final class RequestStatusRepository extends Repository
{
    const CONFIG_TABLE_NAME = 'request_status';

    const VACATION_REQUEST_PENDING = 1;

    const VACATION_REQUEST_APPROVED = 2;

    const VACATION_REQUEST_REJECTED = 3;

    /**
     * @param array $row
     * @return VacationRequestStatus
     * @internal param array $data
     *
     */
    public static function formatRow(array $row): VacationRequestStatus
    {
        return new VacationRequestStatus(
            $row['id'],
            $row['slug'],
            $row['name']
        );
    }

    /**
     * @param Entity $entity
     * @return bool
     */
    protected function updateById(Entity $entity): bool
    {
        $sql = "UPDATE " . self::CONFIG_TABLE_NAME . " SET slug = :slug, 
            name = :name
            WHERE id = :id";

        return $this->getStmt($sql, $entity)->execute();
    }

    /**
     * @param Entity $entity
     * @return bool
     */
    protected function insertEntity(Entity $entity): bool
    {
        $sql = "INSERT INTO " . self::CONFIG_TABLE_NAME . "(slug,
            name) VALUES (
            :slug, 
            :name)";

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

        $stmt->bindParam(':slug', $entity->getSlug(), PDO::PARAM_STR);
        $stmt->bindParam(':name', $entity->getName(), PDO::PARAM_STR);
        $stmt->bindParam(':id', $entity->getId(), PDO::PARAM_INT);
    }
}