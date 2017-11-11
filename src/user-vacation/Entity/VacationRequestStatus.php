<?php

namespace UserVacation\Entity;


class VacationRequestStatus extends Entity
{
    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $name;

    public function __construct(
        int $id,
        string $slug,
        string $name
    ) {
        $this->id = $id;
        $this->slug = $slug;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return Entity
     */
    public function setSlug(string $slug): Entity
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Entity
     */
    public function setName(string $name): Entity
    {
        $this->name = $name;

        return $this;
    }
}