<?php

namespace UserVacation\Entity;


class VacationRequest extends Entity
{
    /**
     * @var int
     */
    private $user_id;

    /**
     * @var int
     */
    private $status_id;

    /**
     * @var \DateTime
     */
    private $start_day;

    /**
     * @var \DateTime
     */
    private $end_day;

    public function __construct(
        int $id,
        int $user_id,
        int $status_id,
        string $start_day,
        string $end_day
    ) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->status_id = $status_id;
        $this->start_day = new \DateTime($start_day);
        $this->end_day = new \DateTime($end_day);
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     * @return Entity
     */
    public function setUserId(int $user_id): Entity
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatusId(): int
    {
        return $this->status_id;
    }

    /**
     * @param int $status_id
     * @return Entity
     */
    public function setStatusId(int $status_id): Entity
    {
        $this->status_id = $status_id;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartDay(): \DateTime
    {
        return $this->start_day;
    }

    /**
     * @param string $start_day
     * @return Entity
     */
    public function setStartDay(string $start_day): Entity
    {
        $this->start_day = new \DateTime($start_day);

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDay(): \DateTime
    {
        return $this->end_day;
    }

    /**
     * @param string $end_day
     * @return Entity
     */
    public function setEndDay(string $end_day): Entity
    {
        $this->end_day = new \DateTime($end_day);

        return $this;
    }
}