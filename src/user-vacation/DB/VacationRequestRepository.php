<?php

namespace UserVacation\DB;


use UserVacation\Entity\{
    Entity,
    VacationRequest
};


final class VacationRequestRepository extends Repository
{
    const CONFIG_TABLE_NAME = 'vacation_request';

    /**
     * @param array $row
     * @return mixed
     */
    public static function formatRow(array $row): VacationRequest
    {
        return new VacationRequest(
            $row['id'],
            $row['user_id'],
            $row['status_id'],
            $row['start_day'],
            $row['end_day']
        );
    }

    /**
     * @param Entity $entity
     * @return bool
     */
    protected function updateById(Entity $entity): bool
    {
        $sql = "UPDATE " . self::CONFIG_TABLE_NAME . " SET user_id = :user_id, 
            status_id = :status_id, 
            start_day = :start_day,  
            end_day = :end_day
            WHERE id = :id";

        return $this->getStmt($sql, $entity)->execute();
    }

    /**
     * @param Entity $entity
     * @return bool
     */
    protected function insertEntity(Entity $entity): bool
    {
        $sql = "INSERT INTO " . self::CONFIG_TABLE_NAME . "(user_id,
            status_id,
            start_day,
            end_day) VALUES (
            :user_id, 
            :status_id, 
            :start_day,
            :end_day)";

        return $this->getStmt($sql, $entity)->execute();
    }

    /**
     * @param string $sql
     * @return \PDOStatement
     */
    protected function getStmt(string $sql, Entity $entity): \PDOStatement
    {
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':user_id', $entity->getUserId(), PDO::PARAM_INT);
        $stmt->bindParam(':status_id', $entity->getStatusId(), PDO::PARAM_INT);
        $stmt->bindParam(':start_day', $entity->getStartDay(), PDO::PARAM_STR);
        $stmt->bindParam(':end_day', $entity->getEndDay(), PDO::PARAM_STR);
        $stmt->bindParam(':id', $entity->getId(), PDO::PARAM_INT);
    }
}